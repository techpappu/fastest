<?php
/**
 * Benefits video section, including all section-specific HTML and JavaScript.
 */
?>
<section class="benefits-section benefits-video-self-contained">
    <div class="container">
        <h2 class="benefits-title">একটানা 40+ মিনিট খেলুন</h2>
        <p class="benefits-subtitle">প্রতিটা রাত মধুময় করে তুলুন</p>

        <div class="youtube-thumbnail-container" id="youtube-thumbnail-container">
            <img id="youtube-thumbnail"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/landing.webp'); ?>"
                alt="YouTube Video Thumbnail">
            <div class="play-button">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/play-button.webp'); ?>"
                    alt="Play YouTube Video">
            </div>
        </div>

        <div id="video-modal" class="video-modal">
            <span class="close-modal">&times;</span>
            <iframe id="youtube-video" width="640" height="360" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        <a href="#order" class="cta-btn">অর্ডার করতে চাই</a>
    </div>
</section>

<script>
    (function() {
        const modal = document.getElementById('video-modal');
        const thumbnail = document.getElementById('youtube-thumbnail-container');
        const youtubeVideo = document.getElementById('youtube-video');
        const closeButton = document.querySelector('.benefits-video-self-contained .close-modal');
        const youtubeVideoID = document.body.classList.contains('woocommerce-order-received')
            ? '5fHzViaZ64A'
            : 'm_-nt6PdQe0';

        thumbnail.addEventListener('click', function() {
            modal.style.display = 'flex';
            youtubeVideo.src = 'https://www.youtube.com/embed/' + youtubeVideoID + '?autoplay=1';
        });

        closeButton.addEventListener('click', function() {
            modal.style.display = 'none';
            youtubeVideo.src = '';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                youtubeVideo.src = '';
            }
        });
    })();
</script>
