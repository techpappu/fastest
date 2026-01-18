<?php

/**
 * fastest theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fastest_theme
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fastest_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fastest theme, use a find and replace
		* to change 'fastest' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('fastest', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'fastest'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fastest_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'fastest_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fastest_content_width()
{
	$GLOBALS['content_width'] = apply_filters('fastest_content_width', 640);
}
add_action('after_setup_theme', 'fastest_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fastest_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'fastest'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'fastest'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'fastest_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fastest_scripts()
{
	wp_enqueue_style('fastest-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('fastest-style', 'rtl', 'replace');

	wp_enqueue_script('fastest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'fastest_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}
//unset all woo checkout field but only fisrt name, address 1 and phone need.
add_filter('woocommerce_checkout_fields', function ($fields) {

	// ===== Billing Fields =====
	// Keep only required ones
	$allowed = array(
		'billing_first_name',
		'billing_address_1',
		'billing_phone',
	);

	foreach ($fields['billing'] as $key => $field) {
		if (!in_array($key, $allowed)) {
			unset($fields['billing'][$key]);
		}
	}

	// ===== Remove all shipping fields =====
	unset($fields['shipping']);

	// ===== Remove order notes =====
	unset($fields['order']['order_comments']);

	// ===== Make sure required =====
	$fields['billing']['billing_first_name']['required'] = true;
	$fields['billing']['billing_address_1']['required'] = true;
	$fields['billing']['billing_phone']['required'] = true;

	return $fields;
});
add_action('wp_enqueue_scripts', function () {

	if (is_front_page()) {

		// Core Woo scripts
		wp_enqueue_script('wc-checkout');
		wp_enqueue_script('wc-cart');
		wp_enqueue_script('wc-cart-fragments');

		// Ensure params are available
		wp_localize_script(
			'wc-checkout',
			'wc_checkout_params',
			array(
				'ajax_url' => admin_url('admin-ajax.php')
			)
		);
	}
}, 20);


add_action('wp_ajax_switch_checkout_product', 'switch_checkout_product');
add_action('wp_ajax_nopriv_switch_checkout_product', 'switch_checkout_product');

function switch_checkout_product()
{

	if (empty($_POST['product_id'])) {
		wp_send_json_error();
	}

	$product_id = absint($_POST['product_id']);

	if (! wc_get_product($product_id)) {
		wp_send_json_error();
	}

	WC()->cart->empty_cart();
	WC()->cart->add_to_cart($product_id, 1);

	wp_send_json_success();
}


function wc_product_image_by_id($product_id, $size = 'woocommerce_thumbnail', $class = '')
{

	$product = wc_get_product($product_id);
	if (!$product) {
		return;
	}

	$image_id = $product->get_image_id();

	if ($image_id) {
		echo wp_get_attachment_image(
			$image_id,
			$size,
			false,
			array(
				'class'    => trim('wc-product-image ' . $class),
				'loading'  => 'lazy',
				'decoding' => 'async',
				'alt'      => esc_attr($product->get_name()),
			)
		);
	} else {
		echo wc_placeholder_img($size);
	}
}


function wc_product_price_html_by_id($product_id)
{
	$product = wc_get_product($product_id);
	if (!$product) return '';

	$regular = $product->get_regular_price();
	$sale    = $product->get_sale_price();
	$current = $product->get_price();

	// Format prices with WooCommerce
	$regular_formatted = $regular ? wc_price($regular) : '';
	$sale_formatted    = $sale ? wc_price($sale) : '';
	$current_formatted = $current ? wc_price($current) : '';

	// Build HTML
	if ($sale && $sale != $regular) {
		$html = '<span class="price"><del class="regular-price">' . $regular_formatted . '</del> <ins class="sale-price">' . $sale_formatted . '</ins></span>';
	} else {
		$html = '<span class="price">' . $current_formatted . '</span>';
	}

	return $html;
}
