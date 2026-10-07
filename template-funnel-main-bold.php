<?php

/**
 * Template name: Funnel Main bold
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
        <style>
            .hero-first-view {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 10px;
            }

            img.hero-poster {
                display: block;
                width: auto;
                max-width: 100%;
                height: 250px;
                margin: 0 auto;
                border: 3px solid #E44708;
                border-radius: 5px;
            }

            .hero-first-view__cta {
                background: #e44708;
                color: #fff;
                margin-top: 12px;
            }
        </style>
        <div class="hero-first-view">
            <img class="hero-poster"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/bold-low/Poster_Oct_13.webp"
                alt="Natural Mixed Honey" width="auto" height="250" fetchpriority="high">
            <a href="#dp-order-now" class="cta-btn hero-first-view__cta">অর্ডার করতে চাই</a>
        </div>

        <a class="call-notice call-notice--order" href="tel:8809648110184" aria-label="অর্ডার করতে কল করুন">
            <span class="call-notice__icon" aria-hidden="true">☎</span>
            <div>
                <strong>অর্ডার করতে সরাসরি কল করুন</strong>
                <p>মিনিট দিয়েই কল করুন। সাধারণ কল চার্জ প্রযোজ্য।</p>
                <span class="call-notice__phone">01811546841</span>
            </div>
        </a>
        <a href="#dp-order-now" class="cta-btn" style="background: #e44708;color: white;">অর্ডার করতে চাই</a><br><br>
        <div class="product-badge">NATURAL MIXED HONEY</div>
        <?php //include('video.php'); 
        ?>
    </div>

</section>
<?php
// Outputs nothing unless this page has Facebook review images selected.
//require get_template_directory() . '/facebook-review-slider.php';
; ?>



<!-- Trust Section -->

<section class="trust-section">

    <h2 class="trust-title">সম্পূর্ণ ক্যাশ অন ডেলিভারি</h2>

    <p class="trust-text">
        বিশেষ সময়ের জন্য কি খুঁজছেন একটু বাড়তি শক্তি? তাহলে শুনে নিন এক মিনিটে natural Mixd honey এর রাজকীয় কথা!"
        natural Mixd honey শুধু রাজাদের জন্য না বরং আপনার ভেতরের রাজাকে জাগিয়ে তোলার জন্য!
    </p>


</section>



<!-- Features Section -->
<style>
    .features-section .features-mobile-cta {
        display: none;
    }

    /* Mobile: product image + order button come before the feature list */
    @media (max-width: 767px) {
        .features-section .product-image-container {
            order: -1;
            padding-bottom: 0;
        }

        .features-section .features-mobile-cta {
            display: inline-block;
            margin-top: 15px;
        }

        .features-section .features-desktop-cta {
            display: none;
        }
    }
</style>

<section class="features-section">

    <div class="container">

        <h2 class="features-title">এটা কোনো সাধারণ হানি না</h2>

        <div class="features-grid">

            <div>

                <div class="feature-item">

                    <span>Natural Mixd Honey – থাইল্যান্ডের এর proven formulay তৈরী একটা শক্তির বোমা।</span>

                </div>

                <div class="feature-item">

                    <span>পারফর্মেন্স বেজড, কোনো সাইড এফেক্ট ছাড়াই</span>

                </div>

                <div class="feature-item">

                    <span>রাতে ঘুমানোর অথবা কাজের যাওয়ার ১ ঘন্টা আগে - গরম দুধ অথবা গরম পানি দিয়ে সে-ব-ন করুন।</span>

                </div>

                <div class="feature-item">

                    <span>যেটা একবার খেলে এর এনার্জি থাকে আপনার শরীরে মিনিমাম ৩ দিন!</span>

                </div>

                <div class="feature-item">

                    <span>সম্পূর্ণ অরগানিক প্রোডাক্ট</span>

                </div>
                <a href="#dp-order-now" class="cta-btn features-desktop-cta">অর্ডার করতে চাই</a>

            </div>

            <div class="product-image-container">

                <div class="product-image"
                    style="background: #D4AF37; padding: 5px; border-radius: 10px;max-width:350px;">

                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bold-low/Poster_Sep_06.webp"
                        width="100%" height="auto" alt="" loading="lazy" decoding="async">

                </div>

                <a href="#dp-order-now" class="cta-btn features-mobile-cta">অর্ডার করতে চাই</a>

            </div>

        </div>

        <div class="text-center">

            <a href="#dp-order-now" class="cta-btn">অর্ডার করতে চাই</a>

        </div>

    </div>

</section>



<!-- Gallery Section -->
<?php
// Add more posters here; the grid/slider adapts automatically.
$bold_gallery_images = array(
    'Poster-02.webp',
    'Poster-22.webp',
    'Poster-06.webp',
    'Poster-14.webp',
    'Poster-09.webp',
    'Poster-20.webp',
);
?>
<style>
    .bold-gallery .bold-gallery__track {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        align-items: start;
    }

    .bold-gallery .bold-gallery__item {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .bold-gallery .bold-gallery__item img {
        display: block;
        width: 100%;
        height: auto;
    }

    .bold-gallery .bold-gallery__cta {
        text-align: center;
        margin-top: 25px;
    }

    .bold-gallery .bold-gallery__cta .cta-btn {
        background: #e44708;
        color: #fff;
    }

    /* Mobile: one image at a time, swipeable, auto-advancing */
    @media (max-width: 767px) {
        .bold-gallery .bold-gallery__track {
            position: relative;
            display: flex;
            gap: 12px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            overscroll-behavior-x: contain;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .bold-gallery .bold-gallery__track::-webkit-scrollbar {
            display: none;
        }

        .bold-gallery .bold-gallery__item {
            flex: 0 0 100%;
            scroll-snap-align: center;
            scroll-snap-stop: always;
            box-shadow: none;
        }
    }
</style>

<section class="gallery bold-gallery">

    <div class="container" style="width:100%">

        <div class="bold-gallery__track" data-autoplay="2000">
            <?php foreach ($bold_gallery_images as $bold_gallery_image): ?>
                <div class="bold-gallery__item">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bold-low/' . rawurlencode($bold_gallery_image)); ?>"
                        alt="" loading="lazy" decoding="async">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="bold-gallery__cta">
            <a href="#dp-order-now" class="cta-btn">অর্ডার করতে চাই</a>
        </div>

    </div>

</section>

<script>
    (function () {
        var track = document.querySelector('.bold-gallery__track');
        if (!track) return;

        var mobile = window.matchMedia('(max-width: 767px)');
        var delay = parseInt(track.getAttribute('data-autoplay'), 10) || 2000;
        var timer = null;
        var resumeTimer = null;

        function currentIndex() {
            var slides = track.children, best = 0, bestDist = Infinity;
            for (var i = 0; i < slides.length; i++) {
                var dist = Math.abs(slides[i].offsetLeft - track.scrollLeft);
                if (dist < bestDist) { bestDist = dist; best = i; }
            }
            return best;
        }

        function next() {
            var slides = track.children;
            var target = slides[(currentIndex() + 1) % slides.length];
            track.scrollTo({ left: target.offsetLeft, behavior: 'smooth' });
        }

        function start() {
            if (timer || !mobile.matches || track.children.length < 2) return;
            timer = setInterval(next, delay);
        }

        function stop() {
            clearInterval(timer);
            timer = null;
            clearTimeout(resumeTimer);
        }

        // Pause while the user is swiping, resume shortly after.
        function resume() {
            clearTimeout(resumeTimer);
            resumeTimer = setTimeout(start, delay);
        }

        track.addEventListener('touchstart', stop, { passive: true });
        track.addEventListener('touchend', resume, { passive: true });
        track.addEventListener('touchcancel', resume, { passive: true });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) { stop(); } else { start(); }
        });

        function onBreakpoint() {
            stop();
            if (mobile.matches) {
                start();
            } else {
                track.scrollLeft = 0;
            }
        }

        if (mobile.addEventListener) {
            mobile.addEventListener('change', onBreakpoint);
        } else {
            mobile.addListener(onBreakpoint);
        }

        start();
    })();
</script>



<!-- Benefits Banner -->

<?php // get_template_part('template-parts/benefits-video-section'); // Uncomment this line to show the section. ?>





<!-- Additional Info -->

<section class="info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <h3>এই বিশেষ মধু ১০পিস হয়। ফুল কোর্স এটি।</h3>
                <ul class="info-list">
                    <li>100% হারবাল উপাদানে তৈরি</li>
                    <li>ল্যাব টেস্ট পরীক্ষিত</li>
                    <li>কোন প্রকার সাইড এফেক্ট নাই</li>
                    <li>৩ দিন সে-ব-নে রেজাল্ট পাবেন</li>
                    <li>বিফলে মূল্য ফেরত</li>
                </ul>
                <a href="#dp-order-now" class="cta-btn">অর্ডার করতে চাই</a>
            </div>
            <div class="info-card"
                style="background: linear-gradient(135deg, #2d5016 0%, #5a8f3a 100%); color: white;padding:10px;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bold-low/Poster_Sep_11.webp" alt="" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>



<!-- FAQ Section -->

<section class="info-section" style="background: #f9f9f9;">
    <div class="container">
        <h2 class="text-center mb-20" style="color: #C41E3A; font-size: clamp(20px, 4vw, 28px);">সাধারণ প্রশ্ন উত্তর
        </h2>
        <div class="info-card">
            <ul class="info-list">
                <li>বিস্তারিত বলুন</li>
                <p>Natural Mixed Honey হলো প্রাকৃতিক মধুর সাথে বাছাই করা ভেষজ ও পুষ্টিকর উপাদানের সমন্বয়ে তৈরি একটি
                    বিশেষ ফর্মুলা। এটি শরীরের প্রাকৃতিক শক্তি, সহনশীলতা ও দৈনন্দিন এনার্জি সাপোর্ট করতে সাহায্য করে।</p>
                <li>মিক্সড হানি কি?</li>
                <p>এই মধু শরীরের ভেতর থেকে শক্তি জাগিয়ে তোলে, ক্লান্তি কমাতে সহায়তা করে এবং দৈনন্দিন জীবনে ফ্রেশ ও
                    অ্যাকটিভ থাকতে সাহায্য করে।</p>
                <li>অগ্রিম টাকা দিতে হবে</li>
                <p>না, অগ্রিম কোন টাকা দিতে হবে না</p>
                <li>কোন প্রকার সাইড এফেক্ট হবে</li>
                <p>না, সম্পূর্ণ অরগানিক প্রডাক্ট, কোন প্রকার প্রব্লেম হবে না।</p>
                <li>কত দিনের কোর্স</li>
                <p>ফুল কোর্স ১০ পিসের - ১ মাস সেবন করলে স্থায়ী সমাধান।</p>
            </ul>
        </div>
    </div>
</section>



<!-- Stats Section -->

<section class="stats-section">
    <div class="container">
        <section class="countdown">
            <div class="offer-badge">সীমিত সময়ের অফার</div>
            <div class="delivery-text">হোম ডেলিভারি - সারাদেশে</div>
            <div class="timer">
                <div class="time-box">
                    <div class="number">7</div>
                    <div class="label">hours</div>
                </div>
                <div class="time-box">
                    <div class="number">23</div>
                    <div class="label">minutes</div>
                </div>
                <div class="time-box">
                    <div class="number">8</div>
                    <div class="label">seconds</div>
                </div>
            </div>
        </section>
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









<?php get_footer(); ?>

<script>
    (function () {

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