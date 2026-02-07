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
         <div class="product-badge">NATURAL MIXED HONEY</div>
         <h1 class="hero-title">ন্যাচারাল মিক্সড মধু</h1>
         <p class="hero-subtitle">সেরা মধুগুলোর সবচেয়ে শক্তিশালী কম্বিনেশন</p>
      </div>

   </section>


  <!-- Order Form Section -->

   <section class="order-section" id="order">

      <div class="container">

        <?php the_content()?>

      </div>

   </section>



   <!-- Footer -->
<?php get_footer();?>