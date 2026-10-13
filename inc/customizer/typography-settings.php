<?php
/**
 * AOSE Matcha Typography Customizer Settings
 *
 * Provides Astra-style typography controls:
 * - Base Font Family, Font Size, Line Height
 * - Heading Font Family & H1-H6 Font Sizes
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Typography Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_typography_customizer( $wp_customize ) {

    $wp_customize->add_panel(
        'aose_typography_panel',
        array(
            'title'       => __( 'Typography (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Manage typography for body text and H1-H6 headings.', 'aose-matcha' ),
            'priority'    => 23,
        )
    );

    /* -------------------------------------------------------------
     * 1. Body Typography
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_body_typo',
        array(
            'title' => __( 'Base & Body Typography', 'aose-matcha' ),
            'panel' => 'aose_typography_panel',
        )
    );

    $wp_customize->add_setting(
        'aose_body_font_family',
        array(
            'default'           => 'inter',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_body_font_family',
        array(
            'label'   => __( 'Body Font Family', 'aose-matcha' ),
            'section' => 'aose_section_body_typo',
            'type'    => 'select',
            'choices' => array(
                'inter'   => __( 'Inter (Clean Sans - Default)', 'aose-matcha' ),
                'serif'   => __( 'Instrument Serif (Editorial)', 'aose-matcha' ),
                'system'  => __( 'System Default (-apple-system, Segoe UI)', 'aose-matcha' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'aose_body_font_size',
        array(
            'default'           => 16,
            'sanitize_callback' => 'absint',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_body_font_size',
        array(
            'label'       => __( 'Body Font Size (px)', 'aose-matcha' ),
            'section'     => 'aose_section_body_typo',
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 13,
                'max'  => 22,
                'step' => 1,
            ),
        )
    );

    $wp_customize->add_setting(
        'aose_body_line_height',
        array(
            'default'           => '1.6',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_body_line_height',
        array(
            'label'       => __( 'Body Line Height', 'aose-matcha' ),
            'section'     => 'aose_section_body_typo',
            'type'        => 'text',
        )
    );

    /* -------------------------------------------------------------
     * 2. Headings Typography
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_headings_typo',
        array(
            'title' => __( 'Headings (H1 to H6)', 'aose-matcha' ),
            'panel' => 'aose_typography_panel',
        )
    );

    $wp_customize->add_setting(
        'aose_heading_font_family',
        array(
            'default'           => 'instrument-serif',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_heading_font_family',
        array(
            'label'   => __( 'Headings Font Family', 'aose-matcha' ),
            'section' => 'aose_section_headings_typo',
            'type'    => 'select',
            'choices' => array(
                'instrument-serif' => __( 'Instrument Serif (Default Editorial)', 'aose-matcha' ),
                'inter'            => __( 'Inter (Modern Sans)', 'aose-matcha' ),
                'system-serif'     => __( 'Georgia / System Serif', 'aose-matcha' ),
            ),
        )
    );

    // H1 to H6 sizes
    $headings = array(
        'h1' => array( 'label' => 'H1 Size (px)', 'default' => 48 ),
        'h2' => array( 'label' => 'H2 Size (px)', 'default' => 38 ),
        'h3' => array( 'label' => 'H3 Size (px)', 'default' => 28 ),
        'h4' => array( 'label' => 'H4 Size (px)', 'default' => 22 ),
        'h5' => array( 'label' => 'H5 Size (px)', 'default' => 18 ),
        'h6' => array( 'label' => 'H6 Size (px)', 'default' => 16 ),
    );

    foreach ( $headings as $tag => $data ) {
        $setting_id = "aose_{$tag}_font_size";
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => $data['default'],
                'sanitize_callback' => 'absint',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            $setting_id,
            array(
                'label'       => __( $data['label'], 'aose-matcha' ),
                'section'     => 'aose_section_headings_typo',
                'type'        => 'number',
                'input_attrs' => array(
                    'min'  => 12,
                    'max'  => 80,
                    'step' => 1,
                ),
            )
        );
    }
}
