<?php
/**
 * Plugin Name: Thumbnail RSS
 * Version: 1.0.0
 * Plugin URI: #
 * Description: Allows thumbnails to appear in RSS feeds.
 * Author: AkaiNezumi
 * Author URI: https://github.com/akainezumi/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: thumbnail-rss
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

function rss_post_thumbnail($content)
{
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . get_the_content();
    }
    return $content;
}

add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');