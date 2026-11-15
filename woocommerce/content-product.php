<?php
/**
 * Product card used inside product loops ([products] shortcode, shop, related, etc.).
 *
 * Override of woocommerce/templates/content-product.php.
 * All core hooks are kept so plugins keep working; only the wrapping markup changes.
 * The default loop link open/close and title callbacks are swapped in inc/woocommerce.php
 * so the image and the title each get their own link (no block elements inside <a>).
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package fastest_theme
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}

// Image + title link to the same place as the buy-now button (checkout), not the single product page.
$fastest_permalink = fastest_woocommerce_loop_card_link( $product );
?>
<li <?php wc_product_class( 'fastest-card', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 * (Default link-open callback removed in inc/woocommerce.php.)
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>

	<div class="fastest-card__media">
		<a href="<?php echo esc_url( $fastest_permalink ); ?>" class="fastest-card__image-link" rel="nofollow" tabindex="-1" aria-hidden="true">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</a>
	</div>

	<div class="fastest-card__body">
		<?php
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked fastest_woocommerce_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<div class="fastest-card__actions">
			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	</div>
</li>
