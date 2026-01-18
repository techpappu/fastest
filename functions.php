<?php
/**
 * fastest theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fastest_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fastest_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fastest theme, use a find and replace
		* to change 'fastest' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fastest', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'fastest' ),
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
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'fastest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fastest_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fastest_content_width', 640 );
}
add_action( 'after_setup_theme', 'fastest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fastest_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fastest' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fastest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fastest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fastest_scripts() {
	wp_enqueue_style( 'fastest-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fastest-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fastest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fastest_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Checkout Handler for NMH Fresh Homepage
 */
function fastest_handle_nmh_checkout() {
    if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'fastest_nmh_checkout_submit' ) {
        return;
    }

    if ( ! isset( $_POST['fastest_nmh_nonce'] ) || ! wp_verify_nonce( $_POST['fastest_nmh_nonce'], 'fastest_nmh_checkout' ) ) {
        wp_die( 'Security check failed' );
    }

    $billing_first_name = sanitize_text_field( $_POST['billing_first_name'] );
    $billing_phone = sanitize_text_field( $_POST['billing_phone'] );
    $billing_address_1 = sanitize_text_field( $_POST['billing_address_1'] );
    
    // Determine product ID from variations check box
    // The simplified form uses checkboxes with name='variations[]' and values 7, 8, 9
    $product_id = 0;
    if ( isset( $_POST['variations'] ) && is_array( $_POST['variations'] ) ) {
         $product_id = intval( reset( $_POST['variations'] ) );
    } elseif ( isset( $_POST['variations'] ) ) {
         $product_id = intval( $_POST['variations'] );
    }

    if ( ! $product_id ) {
        wp_die( 'Please select a product package.' );
    }
    
    // Basic validation
    if ( empty( $billing_first_name ) || empty( $billing_phone ) || empty( $billing_address_1 ) ) {
        wp_die( 'Please fill in all required fields (Name, Phone, Address).' );
    }

    $address = array(
        'first_name' => $billing_first_name,
        'last_name'  => '', 
        'email'      => 'guest_' . uniqid() . '@example.com', // Dummy email if not provided
        'phone'      => $billing_phone,
        'address_1'  => $billing_address_1,
        'country'    => 'BD', 
    );
    
    // Create Order
    $order = wc_create_order();
    $product = wc_get_product( $product_id );
    
    if ( ! $product ) {
        wp_die( 'Invalid product selected. Please contact support.' );
    }
    
    $order->add_product( $product, 1 );
    $order->set_address( $address, 'billing' );
    $order->set_address( $address, 'shipping' );
    $order->set_payment_method('cod'); // Default to Cash on Delivery as per demo "Cash on Delivery" text
    $order->calculate_totals();
    $order->update_status( 'processing', 'Order created via Custom Homepage Form' );
    
    // Redirect to Thank You Page
    wp_redirect( $order->get_checkout_order_received_url() );
    exit;
}
add_action( 'admin_post_fastest_nmh_checkout_submit', 'fastest_handle_nmh_checkout' );
add_action( 'admin_post_nopriv_fastest_nmh_checkout_submit', 'fastest_handle_nmh_checkout' );

/**
 * Customize WooCommerce Checkout Fields Globally
 * Retains only First Name, Address 1, and Phone.
 */
add_filter( 'woocommerce_checkout_fields' , 'fastest_custom_checkout_fields' );
function fastest_custom_checkout_fields( $fields ) {
    $allowed_fields = array('billing_first_name', 'billing_address_1', 'billing_phone');
    
    // Iterate through billing/shipping fields
    // Usually fields are in ['billing'], ['shipping'], ['account'], ['order']
    
    // Process Billing
    if ( isset( $fields['billing'] ) ) {
        foreach ( $fields['billing'] as $key => $field ) {
            if ( ! in_array( $key, $allowed_fields ) ) {
                unset( $fields['billing'][$key] );
            } else {
                $fields['billing'][$key]['required'] = true;
                $fields['billing'][$key]['class'] = array('form-row-wide');
                // Adjust labels if needed
                if ($key == 'billing_first_name') $fields['billing'][$key]['label'] = 'Name';
            }
        }
    }

    // Disable Shipping Fields completely? Or mirror billing?
    // User said "disable all field of checkout but only need first name as full width address 1 and phone number"
    // Usually means disable shipping address form and just use billing.
    add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false' );
    
    return $fields;
}
