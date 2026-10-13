<?php
/**
 * AOSE Matcha Footer Builder Customizer Registration
 *
 * Implements Astra-style dynamic 3-row Footer Builder options:
 * - Above Footer (Newsletter Lead Capture & Giant Typography)
 * - Primary Footer (Multi-Column Grid: Brand, Nav Menus, Socials)
 * - Below Footer (Copyright & Legal Row)
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Footer Builder panels, sections, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_footer_builder_customizer( $wp_customize ) {

    // Main Footer Builder Panel
    $wp_customize->add_panel(
        'aose_footer_builder_panel',
        array(
            'title'       => __( 'Footer Builder (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Customize the footer rows, columns, newsletter, and copyright dynamically.', 'aose-matcha' ),
            'priority'    => 26,
        )
    );

    /* -------------------------------------------------------------
     * 1. Above Footer (Newsletter & Lead Capture)
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_above_footer',
        array(
            'title' => __( '1. Above Footer (Newsletter Row)', 'aose-matcha' ),
            'panel' => 'aose_footer_builder_panel',
        )
    );

    // Toggle Above Footer
    $wp_customize->add_setting(
        'aose_footer_above_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_footer_above_enable',
        array(
            'label'   => __( 'Enable Newsletter Section', 'aose-matcha' ),
            'section' => 'aose_section_above_footer',
            'type'    => 'checkbox',
        )
    );

    // Newsletter Text
    $wp_customize->add_setting(
        'aose_footer_newsletter_text',
        array(
            'default'           => 'Simple rituals, matcha notes, and fresh inspiration straight to your inbox.',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_newsletter_text',
        array(
            'label'   => __( 'Newsletter Subtitle', 'aose-matcha' ),
            'section' => 'aose_section_above_footer',
            'type'    => 'text',
        )
    );

    // Newsletter Button Text
    $wp_customize->add_setting(
        'aose_footer_newsletter_btn_text',
        array(
            'default'           => 'Join the Ritual',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_newsletter_btn_text',
        array(
            'label'   => __( 'Submit Button Text', 'aose-matcha' ),
            'section' => 'aose_section_above_footer',
            'type'    => 'text',
        )
    );

    // Giant Word Text
    $wp_customize->add_setting(
        'aose_footer_giant_word',
        array(
            'default'           => 'wellness',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_giant_word',
        array(
            'label'       => __( 'Giant Decorative Word', 'aose-matcha' ),
            'description' => __( 'Rendered in giant serif gradient text (e.g. wellness, ritual, balance).', 'aose-matcha' ),
            'section'     => 'aose_section_above_footer',
            'type'        => 'text',
        )
    );

    /* -------------------------------------------------------------
     * 2. Primary Footer (Multi-Column Grid)
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_primary_footer',
        array(
            'title' => __( '2. Primary Footer (Main Columns)', 'aose-matcha' ),
            'panel' => 'aose_footer_builder_panel',
        )
    );

    // Column Layout Preset
    $wp_customize->add_setting(
        'aose_footer_layout_preset',
        array(
            'default'           => '3_columns',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_footer_layout_preset',
        array(
            'label'   => __( 'Column Layout Style', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'select',
            'choices' => array(
                '3_columns' => __( '3 Columns: Brand (1) | Links (2) | Social (1) - Default', 'aose-matcha' ),
                '2_columns' => __( '2 Columns: Brand & Links', 'aose-matcha' ),
                '4_columns' => __( '4 Columns: Brand | Links A | Links B | Socials', 'aose-matcha' ),
            ),
        )
    );

    // Brand Tagline
    $wp_customize->add_setting(
        'aose_footer_tagline',
        array(
            'default'           => 'matcha, <em>made part of every day.</em>',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_tagline',
        array(
            'label'   => __( 'Brand Tagline (HTML allowed)', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'textarea',
        )
    );

    // Brand Button Text
    $wp_customize->add_setting(
        'aose_footer_brand_cta_text',
        array(
            'default'           => 'Get Started',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_brand_cta_text',
        array(
            'label'   => __( 'Brand CTA Button Text', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'text',
        )
    );

    // Brand Button URL
    $wp_customize->add_setting(
        'aose_footer_brand_cta_url',
        array(
            'default'           => '#footer-newsletter',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_brand_cta_url',
        array(
            'label'   => __( 'Brand CTA Button URL', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'text',
        )
    );

    // Column 1 Title
    $wp_customize->add_setting(
        'aose_footer_col1_title',
        array(
            'default'           => 'Explore',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_col1_title',
        array(
            'label'   => __( 'Column 1 Heading', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'text',
        )
    );

    // Column 2 Title
    $wp_customize->add_setting(
        'aose_footer_col2_title',
        array(
            'default'           => 'About',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_col2_title',
        array(
            'label'   => __( 'Column 2 Heading', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'text',
        )
    );

    // Social Media Toggle
    $wp_customize->add_setting(
        'aose_footer_social_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_footer_social_enable',
        array(
            'label'   => __( 'Show Social Icons', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'checkbox',
        )
    );

    // Instagram URL
    $wp_customize->add_setting(
        'aose_footer_instagram_url',
        array(
            'default'           => 'https://instagram.com/aose',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_instagram_url',
        array(
            'label'   => __( 'Instagram Profile URL', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'url',
        )
    );

    // TikTok URL
    $wp_customize->add_setting(
        'aose_footer_tiktok_url',
        array(
            'default'           => 'https://tiktok.com/@aose',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_tiktok_url',
        array(
            'label'   => __( 'TikTok Profile URL', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'url',
        )
    );

    // Pinterest URL
    $wp_customize->add_setting(
        'aose_footer_pinterest_url',
        array(
            'default'           => 'https://pinterest.com/aose',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_pinterest_url',
        array(
            'label'   => __( 'Pinterest Profile URL', 'aose-matcha' ),
            'section' => 'aose_section_primary_footer',
            'type'    => 'url',
        )
    );

    /* -------------------------------------------------------------
     * 3. Below Footer (Copyright & Legal Bar)
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_below_footer',
        array(
            'title' => __( '3. Below Footer (Copyright & Legal)', 'aose-matcha' ),
            'panel' => 'aose_footer_builder_panel',
        )
    );

    // Copyright Text
    $wp_customize->add_setting(
        'aose_footer_copyright',
        array(
            'default'           => '© {year} {site_title} | all rights reserved',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_footer_copyright',
        array(
            'label'       => __( 'Copyright Text', 'aose-matcha' ),
            'description' => __( 'Tags: {year} for current year, {site_title} for site name.', 'aose-matcha' ),
            'section'     => 'aose_section_below_footer',
            'type'        => 'text',
        )
    );

    // Legal Link 1
    $wp_customize->add_setting(
        'aose_footer_legal1_text',
        array(
            'default'           => 'Cookie Preferences',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_footer_legal1_text',
        array(
            'label'   => __( 'Legal Link 1 Text', 'aose-matcha' ),
            'section' => 'aose_section_below_footer',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'aose_footer_legal1_url',
        array(
            'default'           => '#footer-newsletter',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_legal1_url',
        array(
            'label'   => __( 'Legal Link 1 URL', 'aose-matcha' ),
            'section' => 'aose_section_below_footer',
            'type'    => 'text',
        )
    );

    // Legal Link 2
    $wp_customize->add_setting(
        'aose_footer_legal2_text',
        array(
            'default'           => 'Privacy Policy',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_footer_legal2_text',
        array(
            'label'   => __( 'Legal Link 2 Text', 'aose-matcha' ),
            'section' => 'aose_section_below_footer',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'aose_footer_legal2_url',
        array(
            'default'           => '#footer-newsletter',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'aose_footer_legal2_url',
        array(
            'label'   => __( 'Legal Link 2 URL', 'aose-matcha' ),
            'section' => 'aose_section_below_footer',
            'type'    => 'text',
        )
    );
}
