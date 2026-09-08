<?php
/**
 * Facebook review screenshot slider.
 *
 * Include from a page template where the slider should appear:
 * require get_template_directory() . '/facebook-review-slider.php';
 */

defined('ABSPATH') || exit;

$fastest_review_page_id = get_queried_object_id() ?: get_the_ID();
$fastest_review_image_ids = get_post_meta($fastest_review_page_id, '_fastest_facebook_review_images', true);
$fastest_review_image_ids = is_array($fastest_review_image_ids)
	? array_values(array_filter(array_map('absint', $fastest_review_image_ids)))
	: array();

if (!$fastest_review_image_ids) {
	return;
}

$fastest_slider_id = wp_unique_id('fastest-facebook-reviews-');
?>
<section id="<?php echo esc_attr($fastest_slider_id); ?>" class="ffr-slider"
	aria-label="<?php esc_attr_e('Facebook user reviews', 'fastest-theme'); ?>">
	<h2 class="ffr-heading">ব্যবহারকারীদের মন্তব্য দেখুন</h2>
	<div class="ffr-stage">
		<div class="ffr-viewport">
		<div class="ffr-track">
			<?php foreach ($fastest_review_image_ids as $fastest_image_id):
				$fastest_full_url = wp_get_attachment_image_url($fastest_image_id, 'full');
				if (!$fastest_full_url) {
					continue;
				}
				?>
				<article class="ffr-slide">
					<?php echo wp_get_attachment_image($fastest_image_id, 'medium_large', false, array(
						'class' => 'ffr-image',
						'loading' => 'lazy',
						'decoding' => 'async',
						'sizes' => '(max-width: 767px) calc(100vw - 84px), (max-width: 1400px) calc((100vw - 136px) / 3), 421px',
					)); ?>
				</article>
			<?php endforeach; ?>
		</div>
		</div>
		<button class="ffr-arrow ffr-prev" type="button"
			aria-label="<?php esc_attr_e('Previous reviews', 'fastest-theme'); ?>">&#10094;</button>
		<button class="ffr-arrow ffr-next" type="button"
			aria-label="<?php esc_attr_e('Next reviews', 'fastest-theme'); ?>">&#10095;</button>
	</div>
	<div class="ffr-dots" aria-label="<?php esc_attr_e('Review slider navigation', 'fastest-theme'); ?>"></div>
</section>

<style>
	#<?php echo esc_attr($fastest_slider_id); ?> {
		--ffr-gap: 20px;
		position: relative;
		width: 100%;
		max-width: 1400px;
		margin: 30px auto;
		padding: 0 48px 35px;
		box-sizing: border-box
	}

	#<?php echo esc_attr($fastest_slider_id); ?> * {
		box-sizing: border-box
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-heading {
		margin: 0 0 26px;
		text-align: center;
		color: #1c1e21;
		font-size: clamp(26px, 3vw, 40px);
		font-weight: 700;
		line-height: 1.25;
		letter-spacing: 0
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-heading::after {
		content: "";
		display: block;
		width: 72px;
		height: 4px;
		margin: 12px auto 0;
		border-radius: 999px;
		background: #1877f2
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-stage {
		position: relative
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-viewport {
		overflow: hidden
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-track {
		display: flex;
		gap: var(--ffr-gap);
		transition: transform .5s ease;
		will-change: transform
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-slide {
		flex: 0 0 calc((100% - (var(--ffr-gap) * 2))/3);
		min-width: 0;
		aspect-ratio: 5/4;
		overflow: hidden;
		border-radius: 10px;
		background: #f4f4f4;
		box-shadow: 0 4px 18px rgba(0, 0, 0, .12)
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-image {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 10px
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-arrow {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		z-index: 2;
		width: 38px;
		height: 38px;
		padding: 0;
		border: 0;
		border-radius: 50%;
		background: #1877f2;
		color: #fff;
		font-size: 23px;
		line-height: 38px;
		text-align: center;
		cursor: pointer;
		box-shadow: 0 2px 8px rgba(0, 0, 0, .2)
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-arrow:hover,
	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-arrow:focus {
		background: #0d65d9;
		outline: 2px solid #fff;
		outline-offset: 2px
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-prev {
		left: -46px
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-next {
		right: -46px
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-dots {
		position: absolute;
		left: 0;
		right: 0;
		bottom: 4px;
		display: flex;
		justify-content: center;
		gap: 8px
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-dot {
		width: 10px;
		height: 10px;
		padding: 0;
		border: 0;
		border-radius: 50%;
		background: #b8b8b8;
		cursor: pointer
	}

	#<?php echo esc_attr($fastest_slider_id); ?> .ffr-dot.is-active {
		background: #1877f2;
		transform: scale(1.2)
	}

	@media(max-width:767px) {
		#<?php echo esc_attr($fastest_slider_id); ?> {
			--ffr-gap: 0;
			padding-right: 42px;
			padding-left: 42px
		}

		#<?php echo esc_attr($fastest_slider_id); ?> .ffr-slide {
			flex: 0 0 100%;
			width: 100%
		}
	}

	@media(prefers-reduced-motion:reduce) {
		#<?php echo esc_attr($fastest_slider_id); ?> .ffr-track {
			transition: none
		}
	}
</style>

<script>
	(function () {
		'use strict';
		var root = document.getElementById(<?php echo wp_json_encode($fastest_slider_id); ?>);
		if (!root) return;
		var track = root.querySelector('.ffr-track');
		var slides = Array.prototype.slice.call(root.querySelectorAll('.ffr-slide'));
		var dotsBox = root.querySelector('.ffr-dots');
		var current = 0;

		function visibleCount() { return window.matchMedia('(max-width: 767px)').matches ? 1 : 3; }
		function maxIndex() { return Math.max(0, slides.length - visibleCount()); }
		function render() {
			current = Math.min(current, maxIndex());
			var slideWidth = slides[0] ? slides[0].getBoundingClientRect().width : 0;
			var gap = parseFloat(getComputedStyle(track).gap) || 0;
			track.style.transform = 'translate3d(' + (-(slideWidth + gap) * current) + 'px,0,0)';
			Array.prototype.forEach.call(dotsBox.children, function (dot, i) {
				dot.classList.toggle('is-active', i === current);
				dot.setAttribute('aria-current', i === current ? 'true' : 'false');
			});
		}
		function buildDots() {
			dotsBox.innerHTML = '';
			for (var i = 0; i <= maxIndex(); i++) (function (index) {
				var dot = document.createElement('button');
				dot.type = 'button'; dot.className = 'ffr-dot';
				dot.setAttribute('aria-label', 'Go to review ' + (index + 1));
				dot.addEventListener('click', function () { current = index; render(); });
				dotsBox.appendChild(dot);
			})(i);
			render();
		}
		function move(direction) { current = direction > 0 ? (current >= maxIndex() ? 0 : current + 1) : (current <= 0 ? maxIndex() : current - 1); render(); }

		root.querySelector('.ffr-prev').addEventListener('click', function () { move(-1); });
		root.querySelector('.ffr-next').addEventListener('click', function () { move(1); });
		window.addEventListener('resize', buildDots);
		buildDots();
	})();
</script>
