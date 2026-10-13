<?php
/**
 * AOSE Matcha Header Builder Customizer Registration
 *
 * Implements Astra-style dynamic 3-row Header Builder options:
 * - Above Header (Top Announcement Bar / Ticker)
 * - Primary Header (Logo, Navigation, Search, CTA Button, Mobile Toggle)
 * - Mobile Drawer (Off-Canvas Navigation & Action)
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Header Builder panels, sections, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_header_builder_customizer( $wp_customize ) {

    // Main Header Builder Panel
    $wp_customize->add_panel(
        'aose_header_builder_panel',
        array(
            'title'       => __( 'Header Builder (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Customize the header rows, elements, colors, and layout dynamically.', 'aose-matcha' ),
            'priority'    => 25,
        )
    );

    /* -------------------------------------------------------------
     * 1. Above Header (Top Announcement Bar)
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_above_header',
        array(
            'title' => __( '1. Above Header (Top Bar)', 'aose-matcha' ),
            'panel' => 'aose_header_builder_panel',
        )
    );

    // Toggle Above Header
    $wp_customize->add_setting(
        'aose_header_above_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'aose_header_above_enable',
        array(
            'label'   => __( 'Enable Above Header', 'aose-matcha' ),
            'section' => 'aose_section_above_header',
            'type'    => 'checkbox',
        )
    );

    // Announcement Text
    $wp_customize->add_setting(
        'aose_header_announcement_text',
        array(
            'default'           => 'PURE MATCHA • STEADY ENERGY • CALM FOCUS • DAILY BALANCE • CLEAN RITUAL • EVERYDAY WELLNESS',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_header_announcement_text',
        array(
            'label'       => __( 'Announcement Ticker Text', 'aose-matcha' ),
            'description' => __( 'Repeated in marquee animation on mobile.', 'aose-matcha' ),
            'section'     => 'aose_section_above_header',
            'type'        => 'text',
        )
    );

    // Marquee on Mobile Toggle
    $wp_customize->add_setting(
        'aose_header_announcement_marquee',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_header_announcement_marquee',
        array(
            'label'   => __( 'Enable Marquee Ticker on Mobile', 'aose-matcha' ),
            'section' => 'aose_section_above_header',
            'type'    => 'checkbox',
        )
    );

    // Background Color
    $wp_customize->add_setting(
        'aose_header_above_bg',
        array(
            'default'           => '#FDE3EA',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'aose_header_above_bg',
            array(
                'label'   => __( 'Background Color', 'aose-matcha' ),
                'section' => 'aose_section_above_header',
            )
        )
    );

    // Text Color
    $wp_customize->add_setting(
        'aose_header_above_color',
        array(
            'default'           => '#10240F',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'aose_header_above_color',
            array(
                'label'   => __( 'Text Color', 'aose-matcha' ),
                'section' => 'aose_section_above_header',
            )
        )
    );

    /* -------------------------------------------------------------
     * 2. Primary Header (Main Row)
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_primary_header',
        array(
            'title' => __( '2. Primary Header (Main Row)', 'aose-matcha' ),
            'panel' => 'aose_header_builder_panel',
        )
    );

    // Layout Preset
    $wp_customize->add_setting(
        'aose_header_layout_preset',
        array(
            'default'           => 'logo_left_nav_center_cta_right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_header_layout_preset',
        array(
            'label'   => __( 'Header Layout Style', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'select',
            'choices' => array(
                'logo_left_nav_center_cta_right' => __( 'Logo Left | Nav Center | CTA Right (Default)', 'aose-matcha' ),
                'logo_left_nav_right'            => __( 'Logo Left | Nav Right', 'aose-matcha' ),
                'logo_center_nav_left_cta_right' => __( 'Nav Left | Logo Center | CTA Right', 'aose-matcha' ),
            ),
        )
    );

    // Sticky Header
    $wp_customize->add_setting(
        'aose_header_sticky',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_header_sticky',
        array(
            'label'   => __( 'Sticky Header on Scroll', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'checkbox',
        )
    );

    // Glassmorphism Blur
    $wp_customize->add_setting(
        'aose_header_blur',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_header_blur',
        array(
            'label'   => __( 'Frosted Glass (Backdrop Blur)', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'checkbox',
        )
    );

    // Search Icon Toggle
    $wp_customize->add_setting(
        'aose_header_search_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_header_search_enable',
        array(
            'label'   => __( 'Show Search Icon', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'checkbox',
        )
    );

    // CTA Button Toggle
    $wp_customize->add_setting(
        'aose_header_cta_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_header_cta_enable',
        array(
            'label'   => __( 'Show Header CTA Button', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'checkbox',
        )
    );

    // CTA Button Text
    $wp_customize->add_setting(
        'aose_header_cta_text',
        array(
            'default'           => 'Start Your Ritual',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_header_cta_text',
        array(
            'label'   => __( 'CTA Button Text', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'text',
        )
    );

    // CTA Button Link
    $wp_customize->add_setting(
        'aose_header_cta_url',
        array(
            'default'           => '#footer-newsletter',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_header_cta_url',
        array(
            'label'   => __( 'CTA Button Link', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'text',
        )
    );

    // CTA Button Style
    $wp_customize->add_setting(
        'aose_header_cta_style',
        array(
            'default'           => 'outline',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_header_cta_style',
        array(
            'label'   => __( 'CTA Button Style', 'aose-matcha' ),
            'section' => 'aose_section_primary_header',
            'type'    => 'select',
            'choices' => array(
                'outline' => __( 'Pill Outline (AOSE Signature)', 'aose-matcha' ),
                'filled'  => __( 'Pill Filled Forest', 'aose-matcha' ),
            ),
        )
    );

    /* -------------------------------------------------------------
     * 3. Mobile Navigation & Drawer
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_mobile_header',
        array(
            'title' => __( '3. Mobile Menu & Drawer', 'aose-matcha' ),
            'panel' => 'aose_header_builder_panel',
        )
    );

    // Show CTA in Mobile Drawer
    $wp_customize->add_setting(
        'aose_mobile_cta_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_mobile_cta_enable',
        array(
            'label'   => __( 'Show CTA Button in Mobile Menu', 'aose-matcha' ),
            'section' => 'aose_section_mobile_header',
            'type'    => 'checkbox',
        )
    );
}
