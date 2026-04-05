<?php 

add_action('add_meta_boxes', function () {
    add_meta_box(
        'funnel_editor_box',
        'Product Description',
        'render_funnel_editor_box',
        'page', // change to 'product' if needed
        'normal',
        'high'
    );
});

function render_funnel_editor_box($post) {
    // Check template
    $template = get_page_template_slug($post->ID);

    if ($template !== 'template-funnel-google.php') {
        echo '<p>This editor is only available for Funnel template.</p>';
        return;
    }

    $content = get_post_meta($post->ID, '_funnel_editor', true);

    wp_nonce_field('save_funnel_editor', 'funnel_editor_nonce');

    wp_editor(
        $content,
        'funnel_editor_id',
        [
            'textarea_name' => 'funnel_editor_field',
            'media_buttons' => true,
            'textarea_rows' => 10,
        ]
    );
}

add_action('save_post', function ($post_id) {

    if (!isset($_POST['funnel_editor_nonce']) ||
        !wp_verify_nonce($_POST['funnel_editor_nonce'], 'save_funnel_editor')) {
        return;
    }

    if (isset($_POST['funnel_editor_field'])) {
        update_post_meta(
            $post_id,
            '_funnel_editor',
            wp_kses_post($_POST['funnel_editor_field'])
        );
    }
});