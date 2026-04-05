<?php

/**
 * Template name: Funnel google
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
        <div class="logo">অর্ডার করতে সরাসরি কল করুন <br> <a href="tel:01811546874">01811546874</a></div>
        <div class="product-badge">NATURAL MIXED HONEY</div>
        <h1 class="hero-title">ন্যাচারাল মিক্সড মধু</h1>
        <div class="product-image" style="background: #e44708; padding: 5px; border-radius: 10px; max-width:350px;">

            <?php if (has_post_thumbnail()) : ?>
                <?php
                the_post_thumbnail('full', [
                    'style' => 'width:100%; height:auto; border-radius:5px;',
                    'alt'   => get_the_title()
                ]);
                ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/imgi_8_poster-9-y.webp"
                    style="width:100%; height:auto; border-radius:5px;"
                    alt="Royal Honey">
            <?php endif; ?>

        </div>
        <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
    </div>
</section>




<!-- Order Form Section -->

<section class="order-section" id="order">
    <style>
        .product-decription {
            background: #eee;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
    </style>
    <div class="container">
        <?php the_content(); ?>
        <?php
        $content = get_post_meta(get_the_ID(), '_funnel_editor', true);

        if (!empty(trim($content))) {
            echo '<div class="product-decription">';
            echo wpautop(wp_kses_post($content));
            echo '</div>';
        }
        ?>
        <div class="logo" style="text-align:center;">অর্ডার করতে সরাসরি কল করুন <br> <a href="tel:01811546874">01811546874</a></div>
    </div>

</section>



<!-- Footer -->









<?php get_footer(); ?>

<script>
    (function() {

        const countdown = document.querySelector('.countdown');
        if (!countdown) return;

        const numbers = countdown.querySelectorAll('.number');

        // Read initial printed values
        let hours = parseInt(numbers[0].textContent, 10) || 0;
        let minutes = parseInt(numbers[1].textContent, 10) || 0;
        let seconds = parseInt(numbers[2].textContent, 10) || 0;

        function updateUI() {
            numbers[0].textContent = hours;
            numbers[1].textContent = minutes.toString().padStart(2, '0');
            numbers[2].textContent = seconds.toString().padStart(2, '0');
        }

        function countdownTick() {

            if (hours === 0 && minutes === 0 && seconds === 0) {
                clearInterval(timer);
                return;
            }

            if (seconds > 0) {
                seconds--;
            } else {
                seconds = 59;

                if (minutes > 0) {
                    minutes--;
                } else {
                    minutes = 59;

                    if (hours > 0) {
                        hours--;
                    }
                }
            }

            updateUI();
        }

        updateUI(); // initial render
        const timer = setInterval(countdownTick, 1000);

    })();
</script>