<?php
/**
 * AOSE Matcha Customizer Master Bootstrapper
 *
 * Coordinates and loads the Astra-style Customizer system:
 * - Layout & Container Options
 * - Global Colors & CSS Variables
 * - Base & Headings Typography
 * - Blog & Single Post Options
 * - Breadcrumbs Trail & Schema Microdata
 * - Header & Footer Builders
 * - Dynamic CSS Injection & Live Preview Handlers
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class AOSE_Customizer {

    /**
     * Singleton instance.
     *
     * @var AOSE_Customizer|null
     */
    private static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return AOSE_Customizer
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor: includes files and binds WordPress hooks.
     */
    private function __construct() {
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Include all customizer module files.
     */
    private function includes() {
        $customizer_dir = get_template_directory() . '/inc/customizer';

        require_once $customizer_dir . '/layout-settings.php';
        require_once $customizer_dir . '/colors-settings.php';
        require_once $customizer_dir . '/typography-settings.php';
        require_once $customizer_dir . '/blog-settings.php';
        require_once $customizer_dir . '/breadcrumbs.php';
        require_once $customizer_dir . '/header-builder.php';
        require_once $customizer_dir . '/footer-builder.php';
        require_once $customizer_dir . '/dynamic-css.php';
        require_once $customizer_dir . '/template-tags.php';
    }

    /**
     * Initialize WordPress actions.
     */
    private function init_hooks() {
        add_action( 'customize_register', array( $this, 'register_customizer_components' ) );
        add_action( 'customize_preview_init', array( $this, 'enqueue_preview_scripts' ) );
    }

    /**
     * Register Customizer panels, sections, and controls.
     *
     * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
     */
    public function register_customizer_components( $wp_customize ) {
        if ( function_exists( 'aose_register_layout_customizer' ) ) {
            aose_register_layout_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_colors_customizer' ) ) {
            aose_register_colors_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_typography_customizer' ) ) {
            aose_register_typography_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_blog_customizer' ) ) {
            aose_register_blog_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_breadcrumbs_customizer' ) ) {
            aose_register_breadcrumbs_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_header_builder_customizer' ) ) {
            aose_register_header_builder_customizer( $wp_customize );
        }
        if ( function_exists( 'aose_register_footer_builder_customizer' ) ) {
            aose_register_footer_builder_customizer( $wp_customize );
        }
    }

    /**
     * Enqueue live preview JavaScript for instant customizer feedback.
     */
    public function enqueue_preview_scripts() {
        wp_enqueue_script(
            'aose-customizer-preview',
            get_template_directory_uri() . '/assets/js/customizer-preview.js',
            array( 'customize-preview', 'jquery' ),
            AOSE_THEME_VERSION,
            true
        );
    }
}

// Initialize Customizer
AOSE_Customizer::get_instance();
