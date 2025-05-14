<?php
/**
 * Plugin Name: Remove Avada Shortcodes
 * Description: Strips Avada Builder shortcodes from post content, preserving text and images.
 * Version: 1.0
 * Author: Lead Lamp Media
 * Plugin URI: https://leadlamps.com
 */

if (!defined('ABSPATH')) exit;

add_action('admin_menu', function() {
    add_management_page('Remove Avada Shortcodes', 'Remove Avada Shortcodes', 'manage_options', 'remove-avada-shortcodes', 'ras_render_page');
});

function ras_render_page() {
    if (isset($_POST['ras_process'])) {
        ras_strip_avada_shortcodes();
        echo '<div class="updated"><p>All Avada shortcodes have been removed from posts.</p></div>';
    }

    echo '<div class="wrap">';
    echo '<h1>Remove Avada Shortcodes</h1>';
    echo '<form method="post">';
    echo '<p>This tool will remove all Avada builder shortcodes from your blog posts and preserve the content inside.</p>';
    echo '<input type="submit" class="button button-primary" name="ras_process" value="Run Cleanup">';
    echo '</form>';
    echo '</div>';
}

function ras_strip_avada_shortcodes() {
    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'any'
    ];

    $posts = get_posts($args);

    foreach ($posts as $post) {
        $original = $post->post_content;
        $cleaned = ras_clean_content($original);

        if ($original !== $cleaned) {
            wp_update_post([
                'ID' => $post->ID,
                'post_content' => $cleaned
            ]);
        }
    }
}

function ras_clean_content($content) {
    // Remove paired [fusion_xxx]...[/fusion_xxx] and keep inner content
    $content = preg_replace_callback('/\[fusion_[^\]]+\](.*?)\[\/fusion_[^\]]+\]/s', function($matches) {
        return $matches[1]; // return inner content
    }, $content);

    // Remove any remaining self-closing shortcodes like [fusion_separator]
    $content = preg_replace('/\[fusion_[^\]]+\]/', '', $content);

    // Remove any closing shortcodes like [/fusion_text] or [/fusion_builder_column]
    $content = preg_replace('/\[\/fusion_[^\]]+\]/', '', $content);

    return $content;
}
