<?php
/**
 * AOSE Matcha Dynamic CSS Generation
 *
 * Generates minified inline CSS based on Astra-style Customizer settings:
 * - Layout Width & Mode
 * - Global Colors & CSS Variables
 * - Base & Heading Typography
 * - Header & Footer Row Layouts
 *
 * Attaches directly to the main stylesheet handle to avoid render-blocking CSS files.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Generate CSS from Customizer settings.
 *
 * @return string Minified CSS string.
 */
function aose_generate_dynamic_css() {
    $css = '';

    // 1. Container Width & Mode
    $container_width = get_theme_mod( 'aose_container_width', 1440 );
    if ( 1440 !== (int) $container_width ) {
        $css .= sprintf( '.page-wrapper{max-width:%dpx;}', (int) $container_width );
    }

    $site_layout = get_theme_mod( 'aose_site_layout', 'normal' );
    if ( 'boxed' === $site_layout ) {
        $css .= 'body{background-color:var(--color-bg-page);}.page-frame{box-shadow:0 12px 40px rgba(16,36,15,0.08);margin-block:24px;}';
    } elseif ( 'full_width_stretched' === $site_layout ) {
        $css .= '.page-wrapper{max-width:100%!important;padding:0!important;}.page-frame{border-radius:0!important;padding:0!important;}';
    }

    // 2. Global Colors & Dynamic CSS Custom Properties
    $root_vars = array();
    $color_matcha     = get_theme_mod( 'aose_color_matcha', '#7DB92E' );
    $color_lime       = get_theme_mod( 'aose_color_lime', '#C8F03C' );
    $color_forest     = get_theme_mod( 'aose_color_forest', '#1E4A1C' );
    $color_mint_light = get_theme_mod( 'aose_color_mint_light', '#E7F4D6' );
    $color_pink       = get_theme_mod( 'aose_color_pink', '#F6C4D2' );
    $color_ink        = get_theme_mod( 'aose_color_ink', '#10240F' );
    $color_bg_page    = get_theme_mod( 'aose_color_bg_page', '#E6E6E6' );
    $color_link       = get_theme_mod( 'aose_color_link', '#1E4A1C' );
    $color_link_hover = get_theme_mod( 'aose_color_link_hover', '#7DB92E' );

    if ( '#7DB92E' !== $color_matcha )     $root_vars[] = "--color-matcha:{$color_matcha};";
    if ( '#C8F03C' !== $color_lime )       $root_vars[] = "--color-lime:{$color_lime};";
    if ( '#1E4A1C' !== $color_forest )     $root_vars[] = "--color-forest:{$color_forest};";
    if ( '#E7F4D6' !== $color_mint_light ) $root_vars[] = "--color-mint-light:{$color_mint_light};";
    if ( '#F6C4D2' !== $color_pink )       $root_vars[] = "--color-pink:{$color_pink};";
    if ( '#10240F' !== $color_ink )        $root_vars[] = "--color-ink:{$color_ink};";
    if ( '#E6E6E6' !== $color_bg_page )    $root_vars[] = "--color-bg-page:{$color_bg_page};";

    if ( ! empty( $root_vars ) ) {
        $css .= ':root{' . implode( '', $root_vars ) . '}';
    }

    if ( '#1E4A1C' !== $color_link ) {
        $css .= sprintf( 'a{color:%s;}', esc_attr( $color_link ) );
    }
    if ( '#7DB92E' !== $color_link_hover ) {
        $css .= sprintf( 'a:hover,a:focus{color:%s;}', esc_attr( $color_link_hover ) );
    }

    // 3. Body Typography
    $body_font_size   = get_theme_mod( 'aose_body_font_size', 16 );
    $body_line_height = get_theme_mod( 'aose_body_line_height', '1.6' );
    if ( 16 !== (int) $body_font_size || '1.6' !== $body_line_height ) {
        $css .= sprintf( 'body,p{font-size:%dpx;line-height:%s;}', (int) $body_font_size, esc_attr( $body_line_height ) );
    }

    // Headings H1-H6
    $heading_tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
    $default_h_sizes = array( 'h1' => 48, 'h2' => 38, 'h3' => 28, 'h4' => 22, 'h5' => 18, 'h6' => 16 );
    foreach ( $heading_tags as $htag ) {
        $val = get_theme_mod( "aose_{$htag}_font_size", $default_h_sizes[$htag] );
        if ( (int) $val !== $default_h_sizes[$htag] ) {
            $css .= sprintf( '%s{font-size:%dpx;}', $htag, (int) $val );
        }
    }

    // 4. Above Header Background & Text Colors
    $above_bg    = get_theme_mod( 'aose_header_above_bg', '#FDE3EA' );
    $above_color = get_theme_mod( 'aose_header_above_color', '#10240F' );

    if ( '#FDE3EA' !== $above_bg ) {
        $css .= sprintf( '.announcement{background-color:%s;}', esc_attr( $above_bg ) );
    }
    if ( '#10240F' !== $above_color ) {
        $css .= sprintf( '.announcement,.announcement__content{color:%s;}', esc_attr( $above_color ) );
    }

    // 5. Sticky Header & Blur
    $sticky_header = get_theme_mod( 'aose_header_sticky', true );
    if ( ! $sticky_header ) {
        $css .= '.header{position:relative;top:0;}';
    }

    $header_blur = get_theme_mod( 'aose_header_blur', true );
    if ( ! $header_blur ) {
        $css .= '.header{backdrop-filter:none;-webkit-backdrop-filter:none;background-color:#ffffff;}';
    }

    // 6. Header Layout Preset
    $header_layout = get_theme_mod( 'aose_header_layout_preset', 'logo_left_nav_center_cta_right' );
    if ( 'logo_left_nav_right' === $header_layout ) {
        $css .= '@media(min-width:900px){.header__nav{margin-left:auto;margin-right:16px;}}';
    } elseif ( 'logo_center_nav_left_cta_right' === $header_layout ) {
        $css .= '@media(min-width:900px){.header__inner{display:grid;grid-template-columns:1fr auto 1fr;align-items:center;}.header__nav{grid-column:1;justify-content:flex-start;order:1;}.header__logo{grid-column:2;justify-content:center;order:2;}.header__cta{grid-column:3;justify-self:flex-end;order:3;}}';
    }

    // 7. Header CTA Style
    $header_cta_style = get_theme_mod( 'aose_header_cta_style', 'outline' );
    if ( 'filled' === $header_cta_style ) {
        $css .= '.header__cta{background-color:var(--color-forest);color:#ffffff;border-color:var(--color-forest);}.header__cta:hover{background-color:var(--color-forest-2);color:#ffffff;}';
    }

    // 8. Footer Layout Preset
    $footer_layout = get_theme_mod( 'aose_footer_layout_preset', '3_columns' );
    if ( '2_columns' === $footer_layout ) {
        $css .= '@media(min-width:1024px){.footer__top{grid-template-columns:1fr 1fr;gap:48px;}.footer__social-section{grid-column:1/-1;}}';
    } elseif ( '4_columns' === $footer_layout ) {
        $css .= '@media(min-width:1024px){.footer__top{grid-template-columns:1.2fr 1fr 1fr 0.8fr;gap:36px;}}';
    }

    // 9. Single Post Editorial Width
    $single_post_width = get_theme_mod( 'aose_single_post_width', 'narrow' );
    if ( 'narrow' === $single_post_width ) {
        $css .= '.single .entry-content,.single-post .entry-content,.single article{max-width:780px;margin-inline:auto;}';
    }

    // 10. Breadcrumbs styling
    $css .= '.aose-breadcrumbs{padding:12px 0;font-size:0.8125rem;color:var(--color-ink-soft);}.aose-breadcrumbs__list{display:flex;align-items:center;flex-wrap:wrap;list-style:none;margin:0;padding:0;gap:8px;}.aose-breadcrumbs__sep{opacity:0.6;font-size:0.75rem;}.aose-breadcrumbs__item a{color:inherit;text-decoration:none;transition:color 0.2s;}.aose-breadcrumbs__item a:hover{color:var(--color-forest);}.aose-breadcrumbs__item--active{font-weight:600;color:var(--color-ink);}';

    return wp_strip_all_tags( $css );
}

/**
 * Enqueue dynamic CSS as inline style attached to 'aose-custom-style'.
 * Zero extra HTTP requests, preserving 100/100 Lighthouse performance.
 */
function aose_enqueue_dynamic_css() {
    $dynamic_css = aose_generate_dynamic_css();
    if ( ! empty( $dynamic_css ) ) {
        wp_add_inline_style( 'aose-custom-style', $dynamic_css );
    }
}
add_action( 'wp_enqueue_scripts', 'aose_enqueue_dynamic_css', 20 );
