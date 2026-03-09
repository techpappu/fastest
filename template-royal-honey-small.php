<?php

/**
 * Template name: Royal Honey Small
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastest_theme
 */
get_header('custom');
?>

<style>
    .logo {
        color: wheat;
    }

    .hero {
        background: linear-gradient(135deg, #283252 0%, #4d5d8e 100%);
    }

    .cta-btn {
        background: #c41e3a;
        color: #ffffff;
    }

    .features-section,
    .benefits-section,
    .order-section {
        background: #2a375f;
    }

    .gallery-item img {
        height: auto;
    }
</style>

<!-- Hero Section -->

<!-- Order Form Section -->
<section class="order-section" id="order">
    <div class="container">
        <?php the_content(); ?>
        <div class="logo" style="text-align:center;">অর্ডার করতে সরাসরি কল করুন <br> <a href="tel:01811546874">01811546874</a></div>
    </div>
</section>
<!-- Footer -->

<?php get_footer('royal-honey'); ?>