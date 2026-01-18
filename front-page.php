<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastest_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



   <div class="checkout-wrapper">
      <div class="checkout-product-selector">
         <label>
            <input type="radio" name="checkout_product" value="64" checked>
            <span><?php echo wc_get_product(64)->get_name() ?> <br> <?php echo wc_product_price_html_by_id(64) ?></span>
            <!-- 64 is my product id please bring the image -->
            <div>
               <?php wc_product_image_by_id(64); ?>
            </div>
         </label>

         <label>
            <input type="radio" name="checkout_product" value="62">
            <span><?php echo wc_get_product(62)->get_name() ?> <br> <?php echo wc_product_price_html_by_id(62) ?></span>
            <div>
               <?php wc_product_image_by_id(62); ?>
            </div>
         </label>
      </div>
      <?php
      $default_product_id = 64; // ← CHANGE THIS

      if (wc_get_product($default_product_id)) {
         WC()->cart->add_to_cart($default_product_id, 1);
      }
      ?>
      <?php echo do_shortcode('[woocommerce_checkout]'); ?>
   </div>

   <?php get_footer(); ?>
   <script>
      jQuery(function($) {

         if (typeof wc_checkout_params === 'undefined') {
            console.error('wc_checkout_params missing');
            return;
         }

         function switchProduct(productId) {
            $.post(wc_checkout_params.ajax_url, {
               action: 'switch_checkout_product',
               product_id: productId
            }).done(function() {
               $('body').trigger('update_checkout');
            });
         }

         // Load default product
         let defaultProduct = $('input[name="checkout_product"]:checked').val();
         if (defaultProduct) {
            switchProduct(defaultProduct);
         }

         // Change product
         $('input[name="checkout_product"]').on('change', function() {
            switchProduct($(this).val());
         });

      });
   </script>
   <style>
      .checkout-product-selector label {
         display: flex;
         align-items: center;
         justify-content: space-between;
         padding: 12px;
         border: 1px solid #ddd;
         margin-bottom: 10px;
         cursor: pointer;
         border-radius: 6px;
      }

      .checkout-product-selector label img {
         border-radius: 10px;
         height: 100px;
         width: 100px;
      }

      .checkout-product-selector input {
         margin-right: 8px;
      }

      .checkout-product-selector input:checked+span {
         font-weight: 600;
         color: #000;
      }
   </style>