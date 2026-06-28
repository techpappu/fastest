<!-- here need all video code here. -->
<div class="video-section">
    <div class="video-wrapper">
        <iframe id="hero-youtube-video"
            src="https://www.youtube.com/embed/kuAI5tD2mRQ?autoplay=1&mute=1&playsinline=1&rel=0&controls=0&disablekb=1&fs=0&modestbranding=1&iv_load_policy=3&cc_load_policy=0&hl=en&loop=1&color=white&enablejsapi=1"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            onload="setTimeout(function(){document.getElementById('video-placeholder').classList.add('hidden')},2000)"
            allowfullscreen></iframe>

        <!-- Premium Custom Loading Placeholder Overlay -->
        <div id="video-placeholder" class="video-placeholder">
            <!-- Blur Poster Background -->
            <div class="placeholder-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/poster_4.webp');"></div>
            <!-- Dark Overlay Gradient -->
            <div class="placeholder-overlay"></div>
            <!-- Interactive Play & Spinner Button -->
            <div class="placeholder-content">
                <div class="play-btn-circle">
                    <svg class="play-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 5v14l11-7z"></path>
                    </svg>
                    <div class="spinner-ring"></div>
                </div>
                <div class="placeholder-text">ভিডিওটি লোড হচ্ছে...</div>
            </div>
        </div>
    </div>
</div>

<style>
    .video-section {
        margin: 0 auto;
        width: 100%;
        max-width: 300px;
        text-align: center;
        padding: 0 !important;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        height: 300px;
        aspect-ratio: 9 / 16;
        border-radius: 20px;
        overflow: hidden;
        background-color: #C41E3A;
        border: 2px solid #C41E3A;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    @supports (aspect-ratio: 9/16) {
        .video-wrapper {
            height: auto;
        }
    }

    .video-wrapper iframe {
        width: 100%;
        height: 100%;
        display: block;
        border-radius: 18px;
        border: 0;
    }

    /* Custom Placeholder Overlay */
    .video-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 5;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: opacity 0.4s ease, visibility 0.4s ease;
        opacity: 1;
        visibility: visible;
    }

    .video-placeholder.hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .placeholder-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        filter: blur(2px);
        transform: scale(1.08);
        opacity: 0.9;
        transition: transform 0.5s ease;
    }

    .video-placeholder:hover .placeholder-bg {
        transform: scale(1.02);
    }

    .placeholder-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, rgba(196, 30, 58, 0.55) 100%);
    }

    .placeholder-content {
        position: relative;
        z-index: 6;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .play-btn-circle {
        position: relative;
        width: 48px;
        height: 48px;
        background-color: #FFD700;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.3s ease;
    }

    .play-icon {
        width: 22px;
        height: 22px;
        fill: #000;
        margin-left: 2px;
        transition: fill 0.3s ease;
    }

    .video-placeholder:hover .play-btn-circle {
        transform: scale(1.1);
        background-color: #ffffff;
    }

    /* CSS Spinner Ring around Play Button */
    .spinner-ring {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid rgba(255, 215, 0, 0.25);
        border-top: 2px solid #FFD700;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        transition: border-top-color 0.3s ease;
    }

    .video-placeholder:hover .spinner-ring {
        border-top-color: #ffffff;
    }

    .placeholder-text {
        font-family: Arial, sans-serif;
        font-size: 11px;
        color: #ffffff;
        font-weight: bold;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        letter-spacing: 0.5px;
        animation: pulse 1.5s infinite ease-in-out;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 0.75;
        }

        50% {
            opacity: 1;
        }
    }
</style>
<script src="https://www.youtube.com/iframe_api"></script>
<script>
    let player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('hero-youtube-video', {
            events: {
                onReady: onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        event.target.playVideo();
        event.target.unMute();
        event.target.setVolume(100);
        setTimeout(() => {
            document.getElementById("video-placeholder").classList.add("hidden");
        }, 2000);
    }


    document.getElementById("video-placeholder").addEventListener("click", (e) => {
        e.stopPropagation();
        document.getElementById("video-placeholder").classList.add("hidden");
        if (!player) return;
        player.playVideo();
        player.unMute();
        player.setVolume(100);
    });
</script>