<?php

/**
 * Template name: Funnel One
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastest_theme
 */
get_header('custom');
?>

 <!-- Hero Section -->



   <section class="hero">

      <div class="hero-content">

         <div class="logo">ROYAL</div>

         <div class="product-badge">NATURAL MIXED HONEY</div>

         <h1 class="hero-title"> রয়েল ন্যাচারাল Wellness</h1>

         <p class="hero-subtitle">সেরা মধুগুলোর সবচেয়ে শক্তিশালী কম্বিনেশন</p>

         <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>

      </div>

   </section>


  <!-- Order Form Section -->

   <section class="order-section" id="order">

      <div class="container">

         <?php echo do_shortcode('[cartflow-custom default-product="13" ids="13,15,17"]'); ?>

      </div>

   </section>



   <!-- Footer -->
<?php get_footer();?>