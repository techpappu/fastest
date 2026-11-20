<?php
/**
 * Thank-you page — part 1: offer box (static text).
 *
 * Loaded by fastest_ty_render() (inc/thankyou-page.php) only while
 * Customizer → Thank You Page → "Show offer box" is on. Styles: woocommerce.css.
 *
 * @package fastest_theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="fastest-ty-offer">

	<header class="fastest-ty-offer__head">
		<p class="fastest-ty-offer__brand"><span aria-hidden="true">&#9819;</span> Royal Wellness</p>

		<h2 class="fastest-ty-offer__title">
			<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10" /><path d="m8 12.5 2.8 2.8L16.5 9.5" /></svg>
			ধন্যবাদ! অর্ডার পেয়েছি
		</h2>

		<p class="fastest-ty-offer__subtitle">আপনার ফ্রি ট্রায়াল অর্ডার রিকোয়েস্ট সফলভাবে জমা হয়েছে</p>
	</header>

	<div class="fastest-ty-offer__cards">
		<div class="fastest-ty-card fastest-ty-card--free">
			<span class="fastest-ty-card__label">ট্রায়াল প্রোডাক্ট</span>
			<strong class="fastest-ty-card__value">FREE</strong>
			<span class="fastest-ty-card__note">মূল্য ৳০</span>
		</div>

		<div class="fastest-ty-card fastest-ty-card--charge">
			<span class="fastest-ty-card__label">প্যাকেজিং + ডেলিভারি</span>
			<strong class="fastest-ty-card__value">৳৩৭৭</strong>
			<span class="fastest-ty-card__note">মোট চার্জ</span>
		</div>
	</div>

	<div class="fastest-ty-pay">
		<p class="fastest-ty-pay__label">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3zM14 9h4l3 3.5V16h-7" /><circle cx="7" cy="17.5" r="1.8" /><circle cx="17" cy="17.5" r="1.8" /></svg>
			পার্সেল রিসিভের সময়
		</p>
		<p class="fastest-ty-pay__value">মোট ৳৩৭৭ দিতে হবে</p>
		<p class="fastest-ty-pay__note">প্রোডাক্ট ফ্রি, শুধু প্যাকেজিং ও ডেলিভারি চার্জ</p>
	</div>

	<ul class="fastest-ty-info">
		<li class="fastest-ty-info__item">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2" /><path d="M15 3a6 6 0 0 1 6 6M15 7a2 2 0 0 1 2 2" /></svg>
			<div>
				<strong class="fastest-ty-info__title">কিছুক্ষণের মধ্যে কল পাবেন</strong>
				<p class="fastest-ty-info__text">আমাদের প্রতিনিধি আপনার সম্মতি নিয়ে অর্ডার কনফার্ম করবেন।</p>
			</div>
		</li>
		<li class="fastest-ty-info__item">
			<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2" /><path d="M3 10h18M8 3v4M16 3v4M9 15l2 2 4-4" /></svg>
			<p class="fastest-ty-info__text">প্রোডাক্ট পাওয়ার ৭ দিন পর আপনার ফিডব্যাক নেওয়া হবে।</p>
		</li>
	</ul>

</div>
