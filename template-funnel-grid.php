<?php

/**
 * Template name: Royal Honey Small grid
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

    /* Product select banner (matches .call-notice: black + gold + red) */
    .grid-select-banner {
        max-width: 620px;
        margin: 24px auto 0;
        border: 2px solid #FFD700;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.3), 0 0 0 4px rgba(255, 215, 0, 0.12);
        text-align: center;
    }

    .gridtemplatetitle {
        position: relative;
        margin: 0;
        padding: 14px 16px 12px;
        background: linear-gradient(135deg, #1f1f1f 0%, #000 100%);
        color: #FFD700;
        font-size: clamp(14px, 4.8vw, 26px);
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: 0.3px;
        white-space: nowrap;
        text-shadow: 0 2px 6px rgba(255, 215, 0, 0.25);
    }

    .gridtemplatetitle::after {
        content: "";
        display: block;
        width: 70px;
        height: 3px;
        margin: 8px auto 0;
        border-radius: 3px;
        background: linear-gradient(90deg, transparent, #FFD700, transparent);
    }

    .customsimplediscout {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 0;
        padding: 10px 14px;
        background: linear-gradient(135deg, #C41E3A 0%, #8e1428 100%);
        color: #fff;
        font-size: clamp(11px, 3.6vw, 18px);
        font-weight: 700;
        line-height: 1.4;
        overflow: hidden;
        white-space: nowrap;
    }

    .customsimplediscout strong {
        color: #FFD700;
    }

    .customsimplediscout__badge {
        flex: 0 0 auto;
        padding: 2px 10px;
        background: #FFD700;
        color: #000;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 800;
        animation: gridBadgePulse 1.4s ease-in-out infinite;
    }

    /* shine sweep */
    .customsimplediscout::before {
        content: "";
        position: absolute;
        top: 0;
        left: -60%;
        width: 40%;
        height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.35), transparent);
        transform: skewX(-20deg);
        animation: gridShine 3s ease-in-out infinite;
    }

    @keyframes gridShine {

        0%,
        60% {
            left: -60%;
        }

        100% {
            left: 130%;
        }
    }

    @keyframes gridBadgePulse {

        0%,
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.7);
        }

        50% {
            transform: scale(1.08);
            box-shadow: 0 0 0 6px rgba(255, 215, 0, 0);
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .customsimplediscout::before,
        .customsimplediscout__badge {
            animation: none;
        }
    }

    @media (max-width: 480px) {
        .grid-select-banner {
            margin-top: 18px;
        }

        .gridtemplatetitle {
            padding: 12px 8px 10px;
            letter-spacing: 0;
        }

        .customsimplediscout {
            flex-wrap: nowrap;
            gap: 5px;
            padding: 9px 6px;
        }

        .customsimplediscout__badge {
            padding: 2px 7px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero">

    <div class="hero-content">
        <a style="margin-top: 0px;" class="call-notice call-notice--order" href="tel:8809648110184"
            aria-label="অর্ডার করতে কল করুন">
            <span class="call-notice__icon" aria-hidden="true">☎</span>
            <div>
                <strong>অর্ডার করতে সরাসরি কল করুন</strong>
                <p>মিনিট দিয়েই কল করুন। সাধারণ কল চার্জ প্রযোজ্য।</p>
                <span class="call-notice__phone">01811546841</span>
            </div>
        </a>
        <div class="grid-select-banner">
            <div class="gridtemplatetitle">👇 আপনার পণ্যটি সিলেক্ট করুন 👇</div>
            <div class="customsimplediscout">
                <span class="customsimplediscout__badge">🔥 অফার</span>
                <span>শুধুমাত্র <strong>আজকের জন্য</strong> এই ডিসকাউন্ট</span>
            </div>
        </div>
    </div>
</section>

<!-- Order Form Section -->
<section class="order-section" id="dp-order-now" style="padding-top:5px;">
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