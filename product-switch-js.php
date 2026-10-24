<?php

/**
 * Checkout product switcher JS (shared by all funnel footers/templates)
 *
 * @package fastest_theme
 */

?>
<script>
	jQuery(function ($) {

		// Make sure WooCommerce checkout JS is loaded
		if (typeof wc_checkout_params === 'undefined') return;

		// Set after a product switch, so the next checkout refresh picks free delivery
		let selectFreeShipping = false;

		// Function to switch product via AJAX
		function switchProduct(productId) {
			if (!productId) return;

			$.post(wc_checkout_params.ajax_url, {
				action: 'switch_checkout_product',
				product_id: productId
			}).done(function () {
				selectFreeShipping = true;
				// Trigger WooCommerce to refresh the checkout form
				$('body').trigger('update_checkout');
			});
		}

		// Find the free delivery option (free_shipping method or a rate with no price)
		function findFreeShippingInput() {
			let $inputs = $('input[name^="shipping_method"]');
			let $free = $inputs.filter(function () {
				return this.value.indexOf('free_shipping') === 0;
			});

			if (!$free.length) {
				$free = $inputs.filter(function () {
					let $label = $('label[for="' + this.id + '"]');
					return $label.length && !$label.find('.woocommerce-Price-amount').length;
				});
			}

			return $free.first();
		}

		// After checkout refresh, auto select free delivery if the product has it
		$(document.body).on('updated_checkout', function () {
			if (!selectFreeShipping) return;
			selectFreeShipping = false;

			let $free = findFreeShippingInput();
			if ($free.length && !$free.is(':checked')) {
				// WooCommerce refreshes the checkout on shipping method change
				$free.prop('checked', true).trigger('change');
			}
		});

		// Load default product after page load
		$(document).ready(function () {
			let defaultProduct = $('.order-form').data('default');
			if (defaultProduct) {
				switchProduct(defaultProduct);
			}
		});

		// Switch product on radio change
		$(document).on('change', 'input[name="checkout_product"]', function () {
			let selectedProduct = $(this).val();
			switchProduct(selectedProduct);
		});

	});
</script>
