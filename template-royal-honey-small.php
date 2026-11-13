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
<section class="hero">

    <div class="hero-content">
        <a class="call-notice call-notice--order" href="tel:8809648110184" aria-label="অর্ডার করতে কল করুন">
            <span class="call-notice__icon" aria-hidden="true">☎</span>
            <div>
                <strong>অর্ডার করতে সরাসরি কল করুন</strong>
                <p>মিনিট দিয়েই কল করুন। সাধারণ কল চার্জ প্রযোজ্য।</p>
                <span class="call-notice__phone">01811546841</span>
            </div>
        </a>
        <a href="#dp-order-now" class="cta-btn" style="background: #e44708;color: white;">অর্ডার করতে চাই</a><br><br>
        <?php //include('video.php'); 
        ?>
    </div>
</section>

<!-- Order Form Section -->
<section class="order-section" id="dp-order-now">
    <div class="container">
        <?php the_content(); ?>
        <a class="call-notice call-notice--order" href="tel:8809648110184" aria-label="অর্ডার করতে কল করুন">
            <span class="call-notice__icon" aria-hidden="true">☎</span>
            <div>
                <strong>অর্ডার করতে সরাসরি কল করুন</strong>
                <p>মিনিট দিয়েই কল করুন। সাধারণ কল চার্জ প্রযোজ্য।</p>
                <span class="call-notice__phone">01811546841</span>
            </div>
        </a>
    </div>
</section>
<!-- Footer -->

<?php get_footer('royal-honey'); ?>