<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastest_theme
 */

?>

<footer>
	<div class="container">
		<p>&copy; ২০২৬ Natural Mixed Honey. সর্বস্বত্ব সংরক্ষিত।</p>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<?php include get_template_directory() . '/product-switch-js.php'; ?>

<script>
	// Get the modal
	var modal = document.getElementById("video-modal");

	// Get the thumbnail image and iframe
	var thumbnail = document.getElementById("youtube-thumbnail-container");
	var youtubeVideo = document.getElementById("youtube-video");

	// Get the close button inside the modal
	var closeBtn = document.querySelector(".close-modal");

	if (modal && thumbnail && youtubeVideo && closeBtn && !thumbnail.closest('.benefits-video-self-contained')) {
		// The video ID from the YouTube link
		if (document.body.classList.contains("woocommerce-order-received")) {
			var youtubeVideoID = "5fHzViaZ64A";
		} else {
			var youtubeVideoID = "m_-nt6PdQe0"; //https://www.youtube.com/shorts/m_-nt6PdQe0
		}

		// When the thumbnail is clicked, open the modal and play the video
		thumbnail.onclick = function () {
			modal.style.display = "flex";
			youtubeVideo.src = "https://www.youtube.com/embed/" + youtubeVideoID + "?autoplay=1";
		}

		// When the close button is clicked, close the modal and stop the video
		closeBtn.onclick = function () {
			modal.style.display = "none";
			youtubeVideo.src = ""; // Stop the video by clearing the iframe source
		}

		// Close the modal if the user clicks anywhere outside the video
		window.onclick = function (event) {
			if (event.target == modal) {
				modal.style.display = "none";
				youtubeVideo.src = ""; // Stop the video by clearing the iframe source
			}
		}
	}
</script>
</body>

</html>