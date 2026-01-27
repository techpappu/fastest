<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastest_theme
 */

?>

<footer>
	<div class="container">
		<p>&copy; ২০২৪ Royal Natural Mixed Honey. সর্বস্বত্ব সংরক্ষিত।</p>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	jQuery(function($) {

		if (typeof wc_checkout_params === 'undefined') return;

		function switchProduct(productId) {
			$.post(wc_checkout_params.ajax_url, {
				action: 'switch_checkout_product',
				product_id: productId
			}).done(function() {
				$('body').trigger('update_checkout');
			});
		}

		// load default product
		let defaultProduct = $('.order-form').data('default');
		if (defaultProduct) {
			switchProduct(defaultProduct);
		}

		// switch on change
		$('input[name="checkout_product"]').on('change', function() {
			switchProduct($(this).val());
		});

	});
</script>
</body>

</html>