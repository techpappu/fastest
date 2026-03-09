<?php

/**
 * Template name: Royal Crown Roots
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
    .product-badge {
    color: #ffffff;
    }
    .hero {
        background: linear-gradient(135deg, #591664 0%, #7b6b06 100%);
    }
    a:visited {
        color: #D4AF37;
    }
    .cta-btn {
        background: #000000;
        color: #D4AF37;
    }

    .features-section,
    .benefits-section,
    .order-section {
        background: #194b57;
    }

    .gallery-item img {
        height: auto;
    }
</style>

<!-- Hero Section -->



<section class="hero">
    <div class="hero-content">
        <div class="logo">অর্ডার করতে সরাসরি কল করুন <br> <a href="tel:01811546874">01811546874</a></div>
        <div class="product-badge">Royal Crown Roots</div>
        <h1 class="hero-title">রয়েল ক্রাউন রুটস মধু</h1>
        <p class="hero-subtitle">সেরা মধুগুলোর সবচেয়ে শক্তিশালী কম্বিনেশন</p>
        <div class="product-image" style="background: #e44708; padding: 5px; border-radius: 10px;">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/poster_4.webp" style="width:100%; height:auto;border-radius:5px;" alt="Royal Crown Roots">
        </div>
        <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
    </div>
</section>



<!-- Trust Section -->

<section class="trust-section">
    <h2 class="trust-title">সম্পূর্ণ ক্যাশ অন ডেলিভারি</h2>
    <p class="trust-text">
        বিশেষ সময়ের জন্য কি খুঁজছেন একটু বাড়তি শক্তি? তাহলে শুনে নিন এক মিনিটে Royal Crown Roots এর রাজকীয় কথা!" Royal Crown Roots শুধু রাজাদের জন্য না বরং আপনার ভেতরের রাজাকে জাগিয়ে তোলার জন্য!
    </p>
</section>

<!-- Features Section -->

<section class="features-section">
    <div class="container">
        <h2 class="features-title">এটা কোনো সাধারণ হানি না</h2>
        <div class="features-grid">
            <div>
                <div class="feature-item">
                    <span>Royal Crown Roots – থাইল্যান্ডের এর proven formulay তৈরী একটা শক্তির বোমা।</span>
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
                <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
            </div>
            <div class="product-image-container">
                <div class="product-image" style="background: #D4AF37; padding: 20px; border-radius: 10px;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post_desgin.webp" width="100%" height="auto" alt="Royal Crown Roots">
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
        </div>
    </div>

</section>



<!-- Gallery Section -->

<section class="gallery">
    <div class="container" style="width:100%">
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post_desgin80.webp" alt="">
            </div>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/imgi_2_Post_Desgin6-1.webp" alt="">
            </div>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post_desgin8.webp" alt="">
            </div>
        </div>
    </div>
</section>



<!-- Benefits Banner -->

<section class="benefits-section">
    <div class="container">
        <h2 class="benefits-title">একটানা 40+ মিনিট খেলুন</h2>
        <p class="benefits-subtitle">প্রতিটা রাত মধুময় করে তুলুন</p>
        <!-- Video Thumbnail (Image) Section -->
        <div class="youtube-thumbnail-container" id="youtube-thumbnail-container">
            <img id="youtube-thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/landing.webp" alt="YouTube Video Thumbnail" />
            <div class="play-button">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play-button.webp" alt="Play YouTube Video">
            </div>
        </div>

        <!-- Modal (Lightbox) Section with YouTube Video Embed -->
        <div id="video-modal" class="video-modal">
            <span class="close-modal">&times;</span>
            <!-- YouTube Embed Video -->
            <iframe id="youtube-video" width="640" height="360" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
    </div>
</section>





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
                <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
            </div>
            <div class="info-card" style="background: linear-gradient(135deg, #591664 0%, #7b6b06 100%); color: white;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post_desgin.webp" alt="">
            </div>
        </div>
    </div>
</section>



<!-- FAQ Section -->

<section class="info-section" style="background: #f9f9f9;">
    <div class="container">
        <h2 class="text-center mb-20" style="color: #C41E3A; font-size: clamp(20px, 4vw, 28px);">সাধারণ প্রশ্ন উত্তর</h2>
        <div class="info-card">
            <ul class="info-list">
                <li>বিস্তারিত বলুন</li>
                <p>Royal Crown Roots হলো প্রাকৃতিক মধুর সাথে বাছাই করা ভেষজ ও পুষ্টিকর উপাদানের সমন্বয়ে তৈরি একটি বিশেষ ফর্মুলা। এটি শরীরের প্রাকৃতিক শক্তি, সহনশীলতা ও দৈনন্দিন এনার্জি সাপোর্ট করতে সাহায্য করে।</p>
                <li>রয়াল মধু কি?</li>
                <p>এই মধু শরীরের ভেতর থেকে শক্তি জাগিয়ে তোলে, ক্লান্তি কমাতে সহায়তা করে এবং দৈনন্দিন জীবনে ফ্রেশ ও অ্যাকটিভ থাকতে সাহায্য করে।</p>
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

<section class="order-section" id="order">

    <div class="container">

        <?php the_content(); ?>
        <div class="logo" style="text-align:center;">অর্ডার করতে সরাসরি কল করুন <br> <a href="tel:01811546874">01811546874</a></div>
    </div>

</section>



<!-- Footer -->










<footer>
	<div class="container">
		<p>&copy; ২০২৫ Royal Crown Roots. সর্বস্বত্ব সংরক্ষিত।</p>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
<script>
	jQuery(function($) {

		// Make sure WooCommerce checkout JS is loaded
		if (typeof wc_checkout_params === 'undefined') return;

		// Function to switch product via AJAX
		function switchProduct(productId) {
			if (!productId) return;

			$.post(wc_checkout_params.ajax_url, {
				action: 'switch_checkout_product',
				product_id: productId
			}).done(function() {
				// Trigger WooCommerce to refresh the checkout form
				$('body').trigger('update_checkout');
			});
		}

		// Load default product after page load
		$(document).ready(function() {
			let defaultProduct = $('.order-form').data('default');
			if (defaultProduct) {
				switchProduct(defaultProduct);
			}
		});

		// Switch product on radio change
		$(document).on('change', 'input[name="checkout_product"]', function() {
			let selectedProduct = $(this).val();
			switchProduct(selectedProduct);
		});

	});


	// Get the modal
	var modal = document.getElementById("video-modal");

	// Get the thumbnail image and iframe
	var thumbnail = document.getElementById("youtube-thumbnail-container");
	var youtubeVideo = document.getElementById("youtube-video");

	// Get the close button inside the modal
	var closeBtn = document.querySelector(".close-modal");

	// The video ID from the YouTube link
	if(document.body.classList.contains("woocommerce-order-received")) {
		var youtubeVideoID = "5fHzViaZ64A";
	}else{
		var youtubeVideoID = "-AiEPl55hD8"; 
	}
	 // Replace with the actual video ID

	// When the thumbnail is clicked, open the modal and play the video
	thumbnail.onclick = function() {
		modal.style.display = "flex";
		youtubeVideo.src = "https://www.youtube.com/embed/" + youtubeVideoID + "?autoplay=1";
	}

	// When the close button is clicked, close the modal and stop the video
	closeBtn.onclick = function() {
		modal.style.display = "none";
		youtubeVideo.src = ""; // Stop the video by clearing the iframe source
	}

	// Close the modal if the user clicks anywhere outside the video
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
			youtubeVideo.src = ""; // Stop the video by clearing the iframe source
		}
	}
</script>
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