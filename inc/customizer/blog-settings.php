<?php
/**
 * AOSE Matcha Blog & Single Post Customizer Settings
 *
 * Provides Astra-style Blog / Archive and Single Post controls:
 * - Blog Layout (Grid 2-col, Grid 3-col, List)
 * - Excerpt vs Full Content
 * - Post Meta Toggles (Author, Date, Category, Read Time, Comments)
 * - Single Post Width (Default vs Editorial Narrow)
 * - Author Bio Box & Related Posts Toggles
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Blog & Single Post Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_blog_customizer( $wp_customize ) {

    $wp_customize->add_panel(
        'aose_blog_panel',
        array(
            'title'       => __( 'Blog & Posts (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Manage blog archives, excerpt lengths, post meta, and single post layouts.', 'aose-matcha' ),
            'priority'    => 24,
        )
    );

    /* -------------------------------------------------------------
     * 1. Blog / Archive Settings
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_blog_archive',
        array(
            'title' => __( 'Blog / Archive', 'aose-matcha' ),
            'panel' => 'aose_blog_panel',
        )
    );

    // Layout
    $wp_customize->add_setting(
        'aose_blog_layout',
        array(
            'default'           => 'grid_3',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_blog_layout',
        array(
            'label'   => __( 'Blog Layout', 'aose-matcha' ),
            'section' => 'aose_section_blog_archive',
            'type'    => 'select',
            'choices' => array(
                'grid_3' => __( 'Grid (3 Columns)', 'aose-matcha' ),
                'grid_2' => __( 'Grid (2 Columns)', 'aose-matcha' ),
                'list'   => __( 'List Style', 'aose-matcha' ),
            ),
        )
    );

    // Content Display
    $wp_customize->add_setting(
        'aose_blog_content_type',
        array(
            'default'           => 'excerpt',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_blog_content_type',
        array(
            'label'   => __( 'Post Content Display', 'aose-matcha' ),
            'section' => 'aose_section_blog_archive',
            'type'    => 'select',
            'choices' => array(
                'excerpt' => __( 'Excerpt', 'aose-matcha' ),
                'full'    => __( 'Full Content', 'aose-matcha' ),
            ),
        )
    );

    // Excerpt Length
    $wp_customize->add_setting(
        'aose_blog_excerpt_length',
        array(
            'default'           => 25,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'aose_blog_excerpt_length',
        array(
            'label'   => __( 'Excerpt Word Count', 'aose-matcha' ),
            'section' => 'aose_section_blog_archive',
            'type'    => 'number',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 5,
            ),
        )
    );

    // Post Meta Toggles
    $meta_toggles = array(
        'aose_blog_meta_author'    => array( 'label' => 'Show Author', 'default' => true ),
        'aose_blog_meta_date'      => array( 'label' => 'Show Publish Date', 'default' => true ),
        'aose_blog_meta_category'  => array( 'label' => 'Show Category', 'default' => true ),
        'aose_blog_meta_read_time' => array( 'label' => 'Show Reading Time', 'default' => true ),
        'aose_blog_featured_image' => array( 'label' => 'Show Featured Image', 'default' => true ),
    );

    foreach ( $meta_toggles as $setting_id => $data ) {
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => $data['default'],
                'sanitize_callback' => 'wp_validate_boolean',
            )
        );
        $wp_customize->add_control(
            $setting_id,
            array(
                'label'   => __( $data['label'], 'aose-matcha' ),
                'section' => 'aose_section_blog_archive',
                'type'    => 'checkbox',
            )
        );
    }

    /* -------------------------------------------------------------
     * 2. Single Post Settings
     * ------------------------------------------------------------- */
    $wp_customize->add_section(
        'aose_section_single_post',
        array(
            'title' => __( 'Single Post', 'aose-matcha' ),
            'panel' => 'aose_blog_panel',
        )
    );

    $wp_customize->add_setting(
        'aose_single_post_width',
        array(
            'default'           => 'narrow',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_single_post_width',
        array(
            'label'   => __( 'Single Post Content Width', 'aose-matcha' ),
            'section' => 'aose_section_single_post',
            'type'    => 'select',
            'choices' => array(
                'narrow'  => __( 'Editorial Narrow (780px - Optimal Reading)', 'aose-matcha' ),
                'default' => __( 'Default Container (1200px)', 'aose-matcha' ),
            ),
        )
    );

    $single_toggles = array(
        'aose_single_featured_image' => array( 'label' => 'Show Featured Image', 'default' => true ),
        'aose_single_author_box'     => array( 'label' => 'Show Author Bio Card', 'default' => true ),
        'aose_single_related_posts'  => array( 'label' => 'Show Related Posts Section', 'default' => true ),
    );

    foreach ( $single_toggles as $setting_id => $data ) {
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => $data['default'],
                'sanitize_callback' => 'wp_validate_boolean',
            )
        );
        $wp_customize->add_control(
            $setting_id,
            array(
                'label'   => __( $data['label'], 'aose-matcha' ),
                'section' => 'aose_section_single_post',
                'type'    => 'checkbox',
            )
        );
    }
}
