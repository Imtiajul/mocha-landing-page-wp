<?php
/**
 * AOSE Matcha Child Theme Functions
 *
 * Enqueues parent theme assets and provides safe extension points for custom hooks.
 *
 * @package AOSE_Matcha_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue child theme styles cleanly after parent theme stylesheet.
 */
function aose_child_enqueue_styles() {
    wp_enqueue_style(
        'aose-matcha-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'aose-custom-style' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'aose_child_enqueue_styles', 15 );
