<?php
/**
 * Thank-you page — part 2: autoplay YouTube video with sound.
 *
 * Browsers never allow a video to START with sound before the visitor has
 * interacted with the page. So:
 *  1. The video autoplays immediately (muted — the only way autoplay is allowed).
 *  2. The visitor's FIRST tap/click/key anywhere on the page turns the sound on
 *     (volume 100) — that interaction is what the browser needs.
 *  3. A full-size "tap for sound" layer covers the video until then, so tapping
 *     the video itself also turns sound on (instead of pausing it).
 * If the YouTube API fails to load, the tap reloads the video unmuted instead.
 *
 * Loaded by fastest_ty_render() (inc/thankyou-page.php). Styles: woocommerce.css.
 * IDs differ from the old #youtube-video / #video-modal markup on purpose so the
 * modal script in footer.php does not hook in.
 *
 * @package fastest_theme
 *
 * @var array $args { video_id, heading, label }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$video_id = isset( $args['video_id'] ) ? $args['video_id'] : '';
$heading  = isset( $args['heading'] ) ? trim( $args['heading'] ) : '';
$label    = isset( $args['label'] ) ? trim( $args['label'] ) : '';

if ( ! $video_id ) {
	return;
}

$params = array(
	'autoplay'       => 1,
	'mute'           => 1,
	'playsinline'    => 1,
	'loop'           => 1,
	'playlist'       => $video_id, // Required for loop to work on a single video.
	'rel'            => 0,
	'modestbranding' => 1,
	'iv_load_policy' => 3,
	'enablejsapi'    => 1,
	'origin'         => home_url(),
);
$embed  = add_query_arg( array_map( 'rawurlencode', $params ), 'https://www.youtube.com/embed/' . rawurlencode( $video_id ) );
?>
<div class="fastest-ty-video">

	<?php if ( $heading ) : ?>
		<h3 class="fastest-ty-video__heading">
			<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="11" /><path d="M10 8.2v7.6l6-3.8z" /></svg>
			<?php echo esc_html( $heading ); ?>
		</h3>
	<?php endif; ?>

	<div class="fastest-ty-video__frame">
		<iframe id="fastest-ty-player" src="<?php echo esc_url( $embed ); ?>"
			title="<?php echo esc_attr( $heading ? $heading : 'Video' ); ?>"
			allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>

		<button type="button" class="fastest-ty-video__sound">
			<span class="fastest-ty-video__sound-pill">
				<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 9v6h4l5 4V5L8 9z" /><path d="M16.5 8.5a5 5 0 0 1 0 7M19 6a8.5 8.5 0 0 1 0 12" /></svg>
				<?php echo esc_html( $label ? $label : 'Tap for sound' ); ?>
			</span>
		</button>
	</div>

</div>

<script>
	(function () {
		var iframe = document.getElementById('fastest-ty-player');
		var btn = document.querySelector('.fastest-ty-video__sound');
		if (!iframe || !btn) return;

		var player = null;
		var done = false;
		// Only these events count as a "user gesture" for the browser's sound policy
		// (pointerdown on touch screens does not).
		var events = ['click', 'touchend', 'keydown'];

		function soundOn() {
			if (done) return;
			// A scroll swipe ends with touchend but is not a gesture — wait for a real tap.
			if (navigator.userActivation && !navigator.userActivation.isActive) return;
			done = true;
			events.forEach(function (ev) { document.removeEventListener(ev, soundOn, true); });
			btn.hidden = true;

			if (player && player.unMute) {
				player.unMute();
				player.setVolume(100);
				player.playVideo();
			} else {
				// API not ready: reload unmuted — allowed now because of the user gesture.
				iframe.src = iframe.src.replace('mute=1', 'mute=0');
			}
		}

		// First interaction anywhere on the page (taps inside the iframe can't be seen,
		// which is why the overlay button covers the video until sound is on).
		events.forEach(function (ev) { document.addEventListener(ev, soundOn, true); });

		// Load the YouTube IFrame API without overwriting another script's callback.
		var prevReady = window.onYouTubeIframeAPIReady;
		window.onYouTubeIframeAPIReady = function () {
			if (typeof prevReady === 'function') prevReady();
			player = new YT.Player('fastest-ty-player', {
				events: {
					onReady: function (e) { e.target.playVideo(); }
				}
			});
		};

		if (window.YT && window.YT.Player) {
			window.onYouTubeIframeAPIReady();
		} else {
			var s = document.createElement('script');
			s.src = 'https://www.youtube.com/iframe_api';
			s.async = true;
			document.head.appendChild(s);
		}
	})();
</script>
