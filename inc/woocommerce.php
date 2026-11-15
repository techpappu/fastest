<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package fastest_theme
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function fastest_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			// Product-card image width (2x a ~300px card for retina). WooCommerce
			// regenerates thumbnails in the background after this changes.
			'thumbnail_image_width' => 600,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'fastest_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function fastest_woocommerce_scripts() {
	wp_enqueue_style( 'fastest-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'fastest-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'fastest_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function fastest_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'fastest_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function fastest_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'fastest_woocommerce_related_products_args' );

/**
 * ------------------------------------------------------------------
 * Product grid / card (see woocommerce/content-product.php)
 * ------------------------------------------------------------------
 */

/**
 * The card template links the image and the title separately, so drop the
 * core link that wraps the whole card and the plain (unlinked) title.
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'fastest_woocommerce_loop_product_title', 10 );

if ( ! function_exists( 'fastest_woocommerce_loop_product_title' ) ) {
	/**
	 * Linked product title for loop cards.
	 *
	 * @return void
	 */
	function fastest_woocommerce_loop_product_title() {
		global $product;

		$classes = apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' );

		printf(
			'<h2 class="%1$s"><a href="%2$s" rel="nofollow">%3$s</a></h2>',
			esc_attr( $classes ),
			esc_url( fastest_woocommerce_loop_card_link( $product ) ),
			esc_html( get_the_title() )
		);
	}
}

if ( ! function_exists( 'fastest_woocommerce_loop_card_link' ) ) {
	/**
	 * URL for the card image and title: same target as the card's button.
	 *
	 * Buy-now products go straight to checkout (see the buy-now section below);
	 * variable / out-of-stock products fall back to WooCommerce's own button URL
	 * (the product page), so the card never links somewhere the button doesn't.
	 *
	 * @param WC_Product $product Product.
	 * @return string
	 */
	function fastest_woocommerce_loop_card_link( $product ) {
		return $product instanceof WC_Product ? $product->add_to_cart_url() : get_the_permalink();
	}
}

if ( ! function_exists( 'fastest_woocommerce_discount_percent' ) ) {
	/**
	 * Discount percentage for a product on sale (largest discount for variable products).
	 *
	 * @param WC_Product $product Product.
	 * @return int Rounded percentage, 0 when it can't be calculated.
	 */
	function fastest_woocommerce_discount_percent( $product ) {
		$percent = 0;

		if ( $product instanceof WC_Product_Variable ) {
			$prices = $product->get_variation_prices( true );

			foreach ( $prices['regular_price'] as $id => $regular ) {
				$sale = isset( $prices['sale_price'][ $id ] ) ? (float) $prices['sale_price'][ $id ] : 0;
				if ( (float) $regular > 0 && $sale < (float) $regular ) {
					$percent = max( $percent, ( (float) $regular - $sale ) / (float) $regular * 100 );
				}
			}
		} elseif ( ! $product->is_type( 'grouped' ) ) {
			$regular = (float) $product->get_regular_price();
			$sale    = (float) $product->get_sale_price();

			if ( $regular > 0 && $sale > 0 && $sale < $regular ) {
				$percent = ( $regular - $sale ) / $regular * 100;
			}
		}

		return (int) round( $percent );
	}
}

/**
 * ------------------------------------------------------------------
 * "Buy now" loop button: অর্ডার করুন → checkout with only that product.
 *
 * Flow: button links to /checkout/?add-to-cart=ID&buy-now=1
 *   1. WooCommerce's form handler adds the product (validation hook empties the cart first).
 *   2. The redirect filter sends the shopper to the clean checkout URL, so a page
 *      refresh never adds the product a second time.
 * Variable / out-of-stock products keep WooCommerce's default button behaviour.
 * ------------------------------------------------------------------
 */

if ( ! function_exists( 'fastest_woocommerce_is_buy_now_product' ) ) {
	/**
	 * Whether a product can be sent straight to checkout from the loop.
	 *
	 * @param WC_Product $product Product.
	 * @return bool
	 */
	function fastest_woocommerce_is_buy_now_product( $product ) {
		return $product instanceof WC_Product
			&& $product->is_type( 'simple' )
			&& $product->is_purchasable()
			&& $product->is_in_stock();
	}
}

/**
 * Whether the current request is a buy-now add-to-cart.
 *
 * @return bool
 */
function fastest_woocommerce_is_buy_now_request() {
	return isset( $_REQUEST['buy-now'], $_REQUEST['add-to-cart'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
}

/**
 * Button label.
 *
 * @param string     $text    Button text.
 * @param WC_Product $product Product.
 * @return string
 */
function fastest_woocommerce_loop_add_to_cart_text( $text, $product ) {
	return fastest_woocommerce_is_buy_now_product( $product ) ? 'অর্ডার করুন' : $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'fastest_woocommerce_loop_add_to_cart_text', 10, 2 );

/**
 * Button URL → checkout page with the add-to-cart + buy-now flags.
 *
 * @param string     $url     Add to cart URL.
 * @param WC_Product $product Product.
 * @return string
 */
function fastest_woocommerce_loop_add_to_cart_url( $url, $product ) {
	if ( ! fastest_woocommerce_is_buy_now_product( $product ) ) {
		return $url;
	}

	return add_query_arg(
		array(
			'add-to-cart' => $product->get_id(),
			'buy-now'     => 1,
		),
		wc_get_checkout_url()
	);
}
add_filter( 'woocommerce_product_add_to_cart_url', 'fastest_woocommerce_loop_add_to_cart_url', 10, 2 );

/**
 * Make the button a normal link (drop AJAX) so the browser follows it to checkout.
 *
 * @param array      $args    Button args.
 * @param WC_Product $product Product.
 * @return array
 */
function fastest_woocommerce_loop_add_to_cart_args( $args, $product ) {
	if ( fastest_woocommerce_is_buy_now_product( $product ) && ! empty( $args['class'] ) ) {
		$args['class'] = trim( str_replace( 'ajax_add_to_cart', '', $args['class'] ) ) . ' fastest-buy-now';
		unset( $args['attributes']['role'] ); // It's a real link now, not a JS button.
	}
	return $args;
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'fastest_woocommerce_loop_add_to_cart_args', 10, 2 );

/**
 * Buy now = order only this product: empty the cart before it's added.
 *
 * @param bool $passed Validation result.
 * @return bool
 */
function fastest_woocommerce_buy_now_empty_cart( $passed ) {
	if ( $passed && fastest_woocommerce_is_buy_now_request() && WC()->cart ) {
		WC()->cart->empty_cart();
	}
	return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'fastest_woocommerce_buy_now_empty_cart', 1 );

/**
 * After a buy-now add, redirect to the clean checkout URL (prevents re-adding on refresh).
 *
 * @param string $url Redirect URL.
 * @return string
 */
function fastest_woocommerce_buy_now_redirect( $url ) {
	return fastest_woocommerce_is_buy_now_request() ? wc_get_checkout_url() : $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'fastest_woocommerce_buy_now_redirect', 99 );

/**
 * No "… has been added to your cart. View cart" notice for buy-now — the shopper is
 * already on checkout. WooCommerce skips empty notices, so returning '' drops it.
 *
 * @param string $message Notice HTML.
 * @return string
 */
function fastest_woocommerce_buy_now_hide_notice( $message ) {
	return fastest_woocommerce_is_buy_now_request() ? '' : $message;
}
add_filter( 'wc_add_to_cart_message_html', 'fastest_woocommerce_buy_now_hide_notice', 99 );

/**
 * Compact product pagination: 1 … 4 5 6 … 12 with chevron arrows.
 *
 * @param array $args paginate_links() args.
 * @return array
 */
function fastest_woocommerce_pagination_args( $args ) {
	$args['end_size']  = 1;
	$args['mid_size']  = 1;
	$args['prev_text'] = '<span aria-hidden="true">' . ( is_rtl() ? '&rsaquo;' : '&lsaquo;' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Previous', 'woocommerce' ) . '</span>';
	$args['next_text'] = '<span aria-hidden="true">' . ( is_rtl() ? '&lsaquo;' : '&rsaquo;' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Next', 'woocommerce' ) . '</span>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'fastest_woocommerce_pagination_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'fastest_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function fastest_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'fastest_woocommerce_wrapper_before' );

if ( ! function_exists( 'fastest_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function fastest_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'fastest_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'fastest_woocommerce_header_cart' ) ) {
			fastest_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'fastest_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function fastest_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		fastest_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'fastest_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'fastest_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function fastest_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'fastest' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'fastest' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'fastest_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function fastest_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php fastest_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
