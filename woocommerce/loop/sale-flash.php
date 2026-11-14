<?php
/**
 * Product loop sale flash — shows the discount as a percentage (e.g. -39%).
 *
 * Override of woocommerce/templates/loop/sale-flash.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package fastest_theme
 * @version 1.6.4
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

if ( ! $product || ! $product->is_on_sale() ) {
	return;
}

$fastest_percent = fastest_woocommerce_discount_percent( $product );
$fastest_label   = $fastest_percent > 0 ? '-' . $fastest_percent . '%' : esc_html__( 'Sale!', 'woocommerce' );

echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html( $fastest_label ) . '</span>', $post, $product ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
