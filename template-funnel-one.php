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

<!-- Offer Banner Styles -->
<style>
   .offer-banner {
      margin-top: 20px;
      padding: 0 15px;
   }

   .offer-banner__inner {
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      border: 2px solid #FFD700;
      border-radius: 16px;
      padding: 20px 24px;
      max-width: 520px;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(255, 215, 0, 0.3), inset 0 0 20px rgba(255, 215, 0, 0.05);
      animation: bannerGlow 2s ease-in-out infinite alternate;
   }

   @keyframes bannerGlow {
      0% {
         box-shadow: 0 0 15px rgba(255, 215, 0, 0.2), inset 0 0 15px rgba(255, 215, 0, 0.03);
      }

      100% {
         box-shadow: 0 0 30px rgba(255, 215, 0, 0.5), inset 0 0 30px rgba(255, 215, 0, 0.08);
      }
   }

   .offer-banner__inner::before {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(45deg, #FFD700, transparent, #FFD700, transparent);
      border-radius: 16px;
      z-index: -1;
      animation: borderRotate 3s linear infinite;
      opacity: 0.5;
   }

   @keyframes borderRotate {
      0% {
         transform: rotate(0deg);
      }

      100% {
         transform: rotate(360deg);
      }
   }

   .offer-banner__line1 {
      font-size: clamp(16px, 3.5vw, 20px);
      color: #fff;
      margin: 0 0 8px 0;
      line-height: 1.6;
   }

   .offer-banner__old-price {
      text-decoration: line-through;
      color: #ff6b6b;
      font-weight: bold;
      font-size: clamp(18px, 4vw, 24px);
   }

   .offer-banner__line2 {
      font-size: clamp(17px, 3.5vw, 22px);
      color: #fff;
      margin: 0 0 10px 0;
      line-height: 1.6;
   }

   .offer-banner__free {
      background: linear-gradient(135deg, #00c853, #76ff03);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 900;
      font-size: clamp(22px, 5vw, 32px);
      text-transform: uppercase;
      animation: freePulse 1.5s ease-in-out infinite;
      display: inline-block;
   }

   @keyframes freePulse {

      0%,
      100% {
         transform: scale(1);
      }

      50% {
         transform: scale(1.08);
      }
   }

   .offer-banner__line3 {
      font-size: clamp(13px, 2.8vw, 16px);
      color: #FFD700;
      margin: 0;
      line-height: 1.6;
      font-weight: 500;
      padding-top: 8px;
      border-top: 1px solid rgba(255, 215, 0, 0.2);
   }
   .offer-banner__price {
      display: inline-block;
      background: #FFD700;
      color: #1a1a2e;
      font-weight: 900;
      font-size: clamp(16px, 3.5vw, 20px);
      padding: 2px 10px;
      border-radius: 6px;
      margin: 0 3px;
   }

   .big-pack-note {
      display: none !important;
   }
</style>

<!-- Hero Section -->


<section class="hero">

   <div class="hero-content">
      <div class="product-badge">NATURAL MIXED HONEY</div>
      <h1 class="hero-title">ন্যাচারাল মিক্সড মধু</h1>

      <!-- Offer Banner -->
      <div class="offer-banner">
         <div class="offer-banner__inner">
            <p class="offer-banner__line1">🔥 প্রোডাক্টের দাম <span class="offer-banner__old-price">৯৯৯/- টাকা</span>
            </p>
            <p class="offer-banner__line2">কিন্তু আপনি পাচ্ছেন <span class="offer-banner__free">একদম ফ্রি!</span></p>
            <p class="offer-banner__line3">শুধুমাত্র <span class="offer-banner__price">২৯৯/- টাকা</span> ডেলিভারি ও প্যাকেজিং চার্জ দিয়ে প্রোডাক্টটি রিসিভ করবেন</p>
         </div>
      </div>

   </div>

</section>


<!-- Order Form Section -->

<section class="order-section" id="dp-order-now">

   <div class="container">

      <?php the_content() ?>

   </div>

</section>



<!-- Footer -->
<?php get_footer(); ?>