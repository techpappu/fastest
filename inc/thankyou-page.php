<?php
/**
 * Thank-you (order received) page: offer box + order video.
 *
 * Two parts, controlled from Appearance → Customize → Thank You Page:
 *
 *  1. Offer box  (template-parts/thankyou/offer.php) — static offer text.
 *     Temporary: switch it on only while the offer runs. When off, only the video shows.
 *  2. Video      (template-parts/thankyou/video.php) — autoplays, sound turns on
 *     at the visitor's first tap/click on the page.
 *
 * Styles: woocommerce.css → "Thank-you page" section.
 *
 * @package fastest_theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Read a thank-you setting with its default.
 *
 * @param string $key Setting key (without the fastest_ty_ prefix).
 * @return mixed
 */
function fastest_ty_get( $key ) {
	$defaults = array(
		'offer_enable'  => false,
		'video_enable'  => true,
		'video_id'      => 'uD6D2nx5BhA',
		'video_heading' => 'অর্ডার সম্পর্কে বিস্তারিত ভিডিও',
		'video_label'   => 'সাউন্ড চালু করতে ট্যাপ করুন',
	);

	return get_theme_mod( 'fastest_ty_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

/* -------------------------------------------------------------------------
 * Customizer
 * ---------------------------------------------------------------------- */

/**
 * Sanitize a checkbox.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function fastest_ty_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Accept a YouTube ID or any YouTube URL (watch, youtu.be, shorts, embed) and keep the ID.
 *
 * @param string $value Raw value.
 * @return string
 */
function fastest_ty_sanitize_youtube_id( $value ) {
	$value = trim( (string) $value );

	if ( preg_match( '~(?:v=|youtu\.be/|shorts/|embed/)([A-Za-z0-9_-]{11})~', $value, $m ) ) {
		return $m[1];
	}

	return preg_match( '/^[A-Za-z0-9_-]{11}$/', $value ) ? $value : '';
}

/**
 * Register the "Thank You Page" Customizer section.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function fastest_ty_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'fastest_thankyou',
		array(
			'title'    => __( 'Thank You Page', 'fastest' ),
			'priority' => 160,
		)
	);

	// key => [ control type, label, description, sanitize callback ].
	$controls = array(
		'offer_enable'  => array( 'checkbox', 'Show offer box (upper part)', 'Off by default. Turn on only while the offer runs — when off, only the video shows.', 'fastest_ty_sanitize_checkbox' ),
		'video_enable'  => array( 'checkbox', 'Show video', '', 'fastest_ty_sanitize_checkbox' ),
		'video_id'      => array( 'text', 'YouTube video (link or ID)', '', 'fastest_ty_sanitize_youtube_id' ),
		'video_heading' => array( 'text', 'Video heading (empty = hide)', '', 'sanitize_text_field' ),
		'video_label'   => array( 'text', 'Sound button text', 'Shown on the video until sound is turned on.', 'sanitize_text_field' ),
	);

	foreach ( $controls as $key => $c ) {
		$wp_customize->add_setting(
			'fastest_ty_' . $key,
			array(
				'default'           => fastest_ty_get( $key ),
				'sanitize_callback' => $c[3],
			)
		);
		$wp_customize->add_control(
			'fastest_ty_' . $key,
			array(
				'label'       => $c[1],
				'description' => $c[2],
				'section'     => 'fastest_thankyou',
				'type'        => $c[0],
			)
		);
	}
}
add_action( 'customize_register', 'fastest_ty_customize_register' );

/* -------------------------------------------------------------------------
 * Front end
 * ---------------------------------------------------------------------- */

/**
 * Print both parts above the default thank-you content.
 */
function fastest_ty_render() {
	$show_offer = (bool) fastest_ty_get( 'offer_enable' );
	$video_id   = fastest_ty_get( 'video_enable' ) ? fastest_ty_get( 'video_id' ) : '';

	if ( ! $show_offer && ! $video_id ) {
		return;
	}

	echo '<section class="fastest-ty' . ( $show_offer ? '' : ' fastest-ty--video-only' ) . '">';

	if ( $show_offer ) {
		get_template_part( 'template-parts/thankyou/offer' );
	}

	if ( $video_id ) {
		get_template_part(
			'template-parts/thankyou/video',
			null,
			array(
				'video_id' => $video_id,
				'heading'  => fastest_ty_get( 'video_heading' ),
				'label'    => fastest_ty_get( 'video_label' ),
			)
		);
	}

	echo '</section>';
}
add_action( 'woocommerce_before_thankyou', 'fastest_ty_render', 5 );
