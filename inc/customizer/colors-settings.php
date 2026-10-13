<?php
/**
 * AOSE Matcha Global Colors Customizer Settings
 *
 * Provides Astra-style color pickers for the global theme palette.
 * Updates CSS custom properties dynamically with zero performance penalty.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Colors Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_colors_customizer( $wp_customize ) {

    $wp_customize->add_section(
        'aose_section_global_colors',
        array(
            'title'       => __( 'Colors & Background (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Customize theme brand colors, link colors, and background tones.', 'aose-matcha' ),
            'priority'    => 22,
        )
    );

    $colors = array(
        'aose_color_matcha'     => array(
            'label'   => __( 'Primary Matcha Green', 'aose-matcha' ),
            'default' => '#7DB92E',
        ),
        'aose_color_lime'       => array(
            'label'   => __( 'Accent Vibrant Lime', 'aose-matcha' ),
            'default' => '#C8F03C',
        ),
        'aose_color_forest'     => array(
            'label'   => __( 'Forest Dark Green', 'aose-matcha' ),
            'default' => '#1E4A1C',
        ),
        'aose_color_mint_light' => array(
            'label'   => __( 'Mint Light Tint', 'aose-matcha' ),
            'default' => '#E7F4D6',
        ),
        'aose_color_pink'       => array(
            'label'   => __( 'Blossom Pink Accent', 'aose-matcha' ),
            'default' => '#F6C4D2',
        ),
        'aose_color_ink'        => array(
            'label'   => __( 'Body Text Dark Ink', 'aose-matcha' ),
            'default' => '#10240F',
        ),
        'aose_color_link'       => array(
            'label'   => __( 'Link Color', 'aose-matcha' ),
            'default' => '#1E4A1C',
        ),
        'aose_color_link_hover' => array(
            'label'   => __( 'Link Hover Color', 'aose-matcha' ),
            'default' => '#7DB92E',
        ),
        'aose_color_bg_page'    => array(
            'label'   => __( 'Outer Page Background', 'aose-matcha' ),
            'default' => '#E6E6E6',
        ),
    );

    foreach ( $colors as $id => $color_info ) {
        $wp_customize->add_setting(
            $id,
            array(
                'default'           => $color_info['default'],
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $id,
                array(
                    'label'   => $color_info['label'],
                    'section' => 'aose_section_global_colors',
                )
            )
        );
    }
}
