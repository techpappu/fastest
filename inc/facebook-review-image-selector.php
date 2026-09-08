<?php
/**
 * Facebook review image selector for WordPress pages.
 *
 * Loaded from functions.php. Everything needed by the editor (including the
 * media-frame JavaScript and admin CSS) lives in this file.
 */

defined('ABSPATH') || exit;

const FASTEST_FACEBOOK_REVIEW_META_KEY = '_fastest_facebook_review_images';

add_action('add_meta_boxes_page', function () {
	add_meta_box(
		'fastest-facebook-review-images',
		__('Facebook Review Slider Images', 'fastest-theme'),
		'fastest_render_facebook_review_image_box',
		'page',
		'normal',
		'default'
	);
});

function fastest_render_facebook_review_image_box($post)
{
	$image_ids = get_post_meta($post->ID, FASTEST_FACEBOOK_REVIEW_META_KEY, true);
	$image_ids = is_array($image_ids) ? array_filter(array_map('absint', $image_ids)) : array();

	wp_nonce_field('fastest_save_facebook_review_images', 'fastest_facebook_review_nonce');
	?>
	<div id="fastest-review-image-picker">
		<p><?php esc_html_e('Choose the Facebook review screenshots to show in this page’s slider. Drag previews to change their order.', 'fastest-theme'); ?></p>
		<input type="hidden" id="fastest-review-image-ids" name="fastest_facebook_review_images" value="<?php echo esc_attr(implode(',', $image_ids)); ?>">
		<ul id="fastest-review-image-list">
			<?php foreach ($image_ids as $image_id) :
				$thumbnail = wp_get_attachment_image_url($image_id, 'thumbnail');
				if (!$thumbnail) {
					continue;
				}
				?>
				<li data-id="<?php echo esc_attr($image_id); ?>">
					<img src="<?php echo esc_url($thumbnail); ?>" alt="">
					<button type="button" class="fastest-remove-review-image" aria-label="<?php esc_attr_e('Remove image', 'fastest-theme'); ?>">&times;</button>
				</li>
			<?php endforeach; ?>
		</ul>
		<p>
			<button type="button" class="button button-primary" id="fastest-select-review-images"><?php esc_html_e('Select review images', 'fastest-theme'); ?></button>
			<button type="button" class="button" id="fastest-clear-review-images"><?php esc_html_e('Clear all', 'fastest-theme'); ?></button>
		</p>
	</div>
	<style>
		#fastest-review-image-list{display:flex;flex-wrap:wrap;gap:12px;margin:14px 0}
		#fastest-review-image-list li{position:relative;width:110px;height:110px;margin:0;cursor:move;border:1px solid #c3c4c7;background:#f6f7f7;border-radius:4px;overflow:hidden}
		#fastest-review-image-list img{width:100%;height:100%;display:block;object-fit:cover}
		#fastest-review-image-list .fastest-remove-review-image{position:absolute;top:4px;right:4px;width:25px;height:25px;padding:0;border:0;border-radius:50%;background:#b32d2e;color:#fff;font-size:20px;line-height:23px;cursor:pointer}
	</style>
	<script>
	jQuery(function($){
		var $list = $('#fastest-review-image-list');
		var $input = $('#fastest-review-image-ids');
		var frame;

		function syncIds(){
			var ids = $list.children('li').map(function(){ return $(this).data('id'); }).get();
			$input.val(ids.join(','));
		}

		$list.sortable({items:'li', update:syncIds});
		$list.on('click', '.fastest-remove-review-image', function(){
			$(this).closest('li').remove();
			syncIds();
		});

		$('#fastest-clear-review-images').on('click', function(){
			$list.empty();
			syncIds();
		});

		$('#fastest-select-review-images').on('click', function(event){
			event.preventDefault();
			if (frame) { frame.open(); return; }
			frame = wp.media({
				title: <?php echo wp_json_encode(__('Select Facebook review images', 'fastest-theme')); ?>,
				button: {text: <?php echo wp_json_encode(__('Use these images', 'fastest-theme')); ?>},
				library: {type: 'image'},
				multiple: true
			});
			frame.on('select', function(){
				frame.state().get('selection').each(function(attachment){
					var data = attachment.toJSON();
					if ($list.children('[data-id="' + data.id + '"]').length) return;
					var url = data.sizes && data.sizes.thumbnail ? data.sizes.thumbnail.url : data.url;
					$('<li>', {'data-id': data.id}).append(
						$('<img>', {src:url, alt:''}),
						$('<button>', {type:'button', class:'fastest-remove-review-image', 'aria-label':<?php echo wp_json_encode(__('Remove image', 'fastest-theme')); ?>, html:'&times;'})
					).appendTo($list);
				});
				syncIds();
			});
			frame.open();
		});
	});
	</script>
	<?php
}

add_action('admin_enqueue_scripts', function ($hook) {
	if (in_array($hook, array('post.php', 'post-new.php'), true) && get_current_screen() && 'page' === get_current_screen()->post_type) {
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-sortable');
	}
});

add_action('save_post_page', function ($post_id) {
	if (!isset($_POST['fastest_facebook_review_nonce']) ||
		!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['fastest_facebook_review_nonce'])), 'fastest_save_facebook_review_images') ||
		(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
		!current_user_can('edit_page', $post_id)) {
		return;
	}

	$raw_ids = isset($_POST['fastest_facebook_review_images'])
		? explode(',', sanitize_text_field(wp_unslash($_POST['fastest_facebook_review_images'])))
		: array();
	$image_ids = array_values(array_unique(array_filter(array_map('absint', $raw_ids))));

	if ($image_ids) {
		update_post_meta($post_id, FASTEST_FACEBOOK_REVIEW_META_KEY, $image_ids);
	} else {
		delete_post_meta($post_id, FASTEST_FACEBOOK_REVIEW_META_KEY);
	}
});
