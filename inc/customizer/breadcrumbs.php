<?php
/**
 * AOSE Matcha Breadcrumb Trail with Schema.org Microdata
 *
 * Implements Astra-style dynamic breadcrumb navigation with full Schema.org
 * BreadcrumbList structured data for optimal SEO ranking.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Breadcrumbs Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function aose_register_breadcrumbs_customizer( $wp_customize ) {

    $wp_customize->add_section(
        'aose_section_breadcrumbs',
        array(
            'title'       => __( 'Breadcrumbs (Astra Style)', 'aose-matcha' ),
            'description' => __( 'Configure breadcrumb navigation and Schema.org rich snippets.', 'aose-matcha' ),
            'priority'    => 28,
        )
    );

    // Toggle
    $wp_customize->add_setting(
        'aose_breadcrumbs_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'aose_breadcrumbs_enable',
        array(
            'label'   => __( 'Enable Breadcrumbs', 'aose-matcha' ),
            'section' => 'aose_section_breadcrumbs',
            'type'    => 'checkbox',
        )
    );

    // Separator
    $wp_customize->add_setting(
        'aose_breadcrumbs_separator',
        array(
            'default'           => '›',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'aose_breadcrumbs_separator',
        array(
            'label'   => __( 'Breadcrumb Separator', 'aose-matcha' ),
            'section' => 'aose_section_breadcrumbs',
            'type'    => 'select',
            'choices' => array(
                '›' => '› (Angle)',
                '/' => '/ (Slash)',
                '•' => '• (Bullet)',
                '→' => '→ (Arrow)',
            ),
        )
    );
}

/**
 * Render Breadcrumb Trail with Schema.org BreadcrumbList Microdata.
 */
function aose_render_breadcrumbs() {
    if ( is_front_page() || is_home() ) {
        return;
    }

    $enable = get_theme_mod( 'aose_breadcrumbs_enable', true );
    if ( ! $enable ) {
        return;
    }

    $sep = esc_html( get_theme_mod( 'aose_breadcrumbs_separator', '›' ) );
    $home_title = __( 'Home', 'aose-matcha' );

    echo '<nav class="aose-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumbs', 'aose-matcha' ) . '">';
    echo '<ol itemscope itemtype="https://schema.org/BreadcrumbList" class="aose-breadcrumbs__list">';

    $pos = 1;

    // Home item
    echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item">';
    echo '<a itemprop="item" href="' . esc_url( home_url( '/' ) ) . '"><span itemprop="name">' . esc_html( $home_title ) . '</span></a>';
    echo '<meta itemprop="position" content="' . $pos . '" />';
    echo '</li>';

    if ( is_singular() ) {
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $pos++;
            $cat = $categories[0];
            echo '<span class="aose-breadcrumbs__sep" aria-hidden="true">' . $sep . '</span>';
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item">';
            echo '<a itemprop="item" href="' . esc_url( get_category_link( $cat->term_id ) ) . '"><span itemprop="name">' . esc_html( $cat->name ) . '</span></a>';
            echo '<meta itemprop="position" content="' . $pos . '" />';
            echo '</li>';
        }

        $pos++;
        echo '<span class="aose-breadcrumbs__sep" aria-hidden="true">' . $sep . '</span>';
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item aose-breadcrumbs__item--active">';
        echo '<span itemprop="name" aria-current="page">' . esc_html( get_the_title() ) . '</span>';
        echo '<meta itemprop="position" content="' . $pos . '" />';
        echo '</li>';
    } elseif ( is_category() ) {
        $pos++;
        echo '<span class="aose-breadcrumbs__sep" aria-hidden="true">' . $sep . '</span>';
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item aose-breadcrumbs__item--active">';
        echo '<span itemprop="name" aria-current="page">' . esc_html( single_cat_title( '', false ) ) . '</span>';
        echo '<meta itemprop="position" content="' . $pos . '" />';
        echo '</li>';
    } elseif ( is_archive() ) {
        $pos++;
        echo '<span class="aose-breadcrumbs__sep" aria-hidden="true">' . $sep . '</span>';
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item aose-breadcrumbs__item--active">';
        echo '<span itemprop="name" aria-current="page">' . esc_html( get_the_archive_title() ) . '</span>';
        echo '<meta itemprop="position" content="' . $pos . '" />';
        echo '</li>';
    } elseif ( is_search() ) {
        $pos++;
        echo '<span class="aose-breadcrumbs__sep" aria-hidden="true">' . $sep . '</span>';
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="aose-breadcrumbs__item aose-breadcrumbs__item--active">';
        echo '<span itemprop="name" aria-current="page">' . sprintf( esc_html__( 'Search: &ldquo;%s&rdquo;', 'aose-matcha' ), esc_html( get_search_query() ) ) . '</span>';
        echo '<meta itemprop="position" content="' . $pos . '" />';
        echo '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}
