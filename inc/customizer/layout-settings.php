<?php
/**
 * AOSE Matcha Layout Customizer Settings
 *
 * Provides Astra-style layout controls:
 * - Container Width (Custom slider 1000px - 1600px)
 * - Container Style (Normal, Boxed, Content Boxed, Full Width Contained, Full Width Stretched)
 * - Sidebar Layouts (Default, Blog Archive, Single Post)
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Layout Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_layout_customizer( $wp_customize ) {

    // Layout Panel
    $wp_customize->add_panel(
        'aose_layout_panel',
        array(
            'title'       => __( 'Layout Options (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Manage site container widths, layout modes, and sidebar positions.', 'aose-matcha' ),
            'priority'    => 20,
        )
    );

    /* -------------------------------------------------------------
     * 1. Container Settings
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_container',
        array(
            'title' => __( 'Container', 'aose-matcha' ),
            'panel' => 'aose_layout_panel',
        )
    );

    // Container Max Width
    $wp_customize->add_setting(
        'aose_container_width',
        array(
            'default'           => 1440,
            'sanitize_callback' => 'absint',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(
        'aose_container_width',
        array(
            'label'       => __( 'Container Max Width (px)', 'aose-matcha' ),
            'description' => __( 'Controls the maximum width of the site wrapper (1000px to 1600px).', 'aose-matcha' ),
            'section'     => 'aose_section_container',
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 1000,
                'max'  => 1600,
                'step' => 10,
            ),
        )
    );

    // Site Container Style
    $wp_customize->add_setting(
        'aose_site_layout',
        array(
            'default'           => 'normal',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_site_layout',
        array(
            'label'   => __( 'Site Layout Mode', 'aose-matcha' ),
            'section' => 'aose_section_container',
            'type'    => 'select',
            'choices' => array(
                'normal'                => __( 'Normal (AOSE Framed Card)', 'aose-matcha' ),
                'boxed'                 => __( 'Boxed Page Frame', 'aose-matcha' ),
                'content_boxed'         => __( 'Content Boxed', 'aose-matcha' ),
                'full_width_contained'  => __( 'Full Width Contained', 'aose-matcha' ),
                'full_width_stretched'  => __( 'Full Width Stretched', 'aose-matcha' ),
            ),
        )
    );

    /* -------------------------------------------------------------
     * 2. Sidebar Settings
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_sidebar',
        array(
            'title' => __( 'Sidebar Layouts', 'aose-matcha' ),
            'panel' => 'aose_layout_panel',
        )
    );

    // Default Sidebar
    $wp_customize->add_setting(
        'aose_default_sidebar_layout',
        array(
            'default'           => 'no_sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_default_sidebar_layout',
        array(
            'label'   => __( 'Default Pages Sidebar', 'aose-matcha' ),
            'section' => 'aose_section_sidebar',
            'type'    => 'select',
            'choices' => array(
                'no_sidebar'    => __( 'No Sidebar', 'aose-matcha' ),
                'right_sidebar' => __( 'Right Sidebar', 'aose-matcha' ),
                'left_sidebar'  => __( 'Left Sidebar', 'aose-matcha' ),
            ),
        )
    );

    // Blog / Archive Sidebar
    $wp_customize->add_setting(
        'aose_archive_sidebar_layout',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_archive_sidebar_layout',
        array(
            'label'   => __( 'Blog & Archive Sidebar', 'aose-matcha' ),
            'section' => 'aose_section_sidebar',
            'type'    => 'select',
            'choices' => array(
                'default'       => __( 'Use Default', 'aose-matcha' ),
                'no_sidebar'    => __( 'No Sidebar', 'aose-matcha' ),
                'right_sidebar' => __( 'Right Sidebar', 'aose-matcha' ),
                'left_sidebar'  => __( 'Left Sidebar', 'aose-matcha' ),
            ),
        )
    );

    // Single Post Sidebar
    $wp_customize->add_setting(
        'aose_single_sidebar_layout',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_single_sidebar_layout',
        array(
            'label'   => __( 'Single Post Sidebar', 'aose-matcha' ),
            'section' => 'aose_section_sidebar',
            'type'    => 'select',
            'choices' => array(
                'default'       => __( 'Use Default', 'aose-matcha' ),
                'no_sidebar'    => __( 'No Sidebar', 'aose-matcha' ),
                'right_sidebar' => __( 'Right Sidebar', 'aose-matcha' ),
                'left_sidebar'  => __( 'Left Sidebar', 'aose-matcha' ),
            ),
        )
    );
}
