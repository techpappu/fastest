<!doctype html>

<html <?php language_attributes(); ?>>



<head>

   <meta charset="<?php bloginfo('charset'); ?>">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="profile" href="https://gmpg.org/xfn/11">



   <?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>
   <!-- <section style="margin-top: 50px;"></section>
   <section class="sticky-header">
      <div class="sticky-content">
         <div class="heading">🌙 রমজান ও রোজায় ব্যবহার নির্দেশনা</div>
         <marquee behavior="" direction="left" scrollamount="5">
            <p>রমজান ও রোজার সময় স্বাভাবিকভাবেই গ্রহণযোগ্য।</p>
            <p>ইফতারের পর বা সেহরির আগে নিয়ম অনুযায়ী গ্রহণ করা যায়।</p>
            <p>রোজায় ব্যবহারে কোনো সমস্যা নেই এবং ধারাবাহিক ব্যবহারেই স্থির ফল অনুভব করা যায়।</p>
         </marquee>
      </div>
   </section> -->
   <div>
      <a href="tel:+8809648110184" class="sticky-call">
         📞 ফোন করুন
      </a>
   </div>
   <div class="sticky-bottom-call-bar">
      <a href="tel:+8809648110184" class="sticky-bottom-call-bar__button">
         <span aria-hidden="true">☎</span>
         কল করে অর্ডার করুন: 09648-110184
      </a>
   </div>
   <style>
      .sticky-call {
         position: fixed;
         bottom: 20px;
         right: 20px;
         background-color: #28a745;
         color: #fff;
         padding: 10px;
         border-radius: 20px;
         text-decoration: none;
         font-size: 12px;
         font-weight: bold;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
         z-index: 9999;
         transition: 0.3s ease;
      }

      .sticky-call:hover {
         background-color: #218838;
         transform: scale(1.05);
      }

      .sticky-bottom-call-bar {
         position: fixed;
         right: 0;
         bottom: 0;
         left: 0;
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 42px;
         padding: 4px 10px;
         background: #fff;
         border-top: 1px solid #eee;
         box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.08);
         box-sizing: border-box;
         z-index: 9998;
      }

      .sticky-bottom-call-bar__button {
         display: inline-flex;
         align-items: center;
         justify-content: center;
         gap: 5px;
         min-height: 32px;
         padding: 3px 12px;
         color: #f59b23;
         background: #fff;
         border: 2px solid #f59b23;
         border-radius: 4px;
         box-sizing: border-box;
         font-size: 12px;
         font-weight: 700;
         line-height: 1.2;
         text-decoration: none;
         transition: color 0.2s ease, background-color 0.2s ease;
      }

      .sticky-bottom-call-bar__button:hover,
      .sticky-bottom-call-bar__button:focus {
         color: #fff;
         background: #f59b23;
         text-decoration: none;
      }
   </style>