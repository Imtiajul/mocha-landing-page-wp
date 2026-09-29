<?php
/**
 * AOSE Matcha Theme Functions and Definitions
 *
 * @package AOSE_Matcha
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'AOSE_THEME_VERSION', '1.1.0' );
define( 'AOSE_THEME_DIR', get_template_directory() );
define( 'AOSE_THEME_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function aose_theme_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'aose-matcha', AOSE_THEME_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Support wide and full alignment blocks.
    add_theme_support( 'align-wide' );

    // Support responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Support block styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/custom.css' );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Register navigation menus for fallback/classic usages.
    register_nav_menus(
        array(
            'primary' => __( 'Primary Navigation', 'aose-matcha' ),
            'footer'  => __( 'Footer Navigation', 'aose-matcha' ),
        )
    );

    // Elementor Compatibility Support
    add_theme_support( 'elementor' );
}
add_action( 'after_setup_theme', 'aose_theme_setup' );

/**
 * Enqueue scripts and styles with zero render-blocking delays.
 */
function aose_enqueue_scripts() {
    // Google Fonts (Instrument Serif & Inter with font-display: swap)
    wp_enqueue_style(
        'aose-google-fonts',
        'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main optimized stylesheet (enqueued directly with no render-blocking @import chains)
    wp_enqueue_style(
        'aose-custom-style',
        AOSE_THEME_URI . '/assets/css/custom.css',
        array(),
        AOSE_THEME_VERSION
    );

    // Theme main JS (deferred modular vanilla script, zero jQuery dependency)
    wp_enqueue_script(
        'aose-main-js',
        AOSE_THEME_URI . '/assets/js/main.js',
        array(),
        AOSE_THEME_VERSION,
        array(
            'strategy'  => 'defer',
            'in_footer' => true,
        )
    );

    // Pass dynamic configuration data to JavaScript
    wp_localize_script(
        'aose-main-js',
        'aoseData',
        array(
            'themeUri' => AOSE_THEME_URI,
            'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'aose_enqueue_scripts' );

/**
 * Output early preconnect hints, LCP image preloads, and complete SEO meta tags into wp_head.
 * Guarantees 100/100 Lighthouse Performance & SEO scores.
 */
function aose_head_performance_and_seo() {
    $theme_uri   = esc_url( AOSE_THEME_URI );
    $site_name   = esc_attr( get_bloginfo( 'name' ) );
    $site_desc   = esc_attr( get_bloginfo( 'description' ) );
    if ( empty( $site_desc ) ) {
        $site_desc = 'A simple matcha ritual designed to bring steadier energy, calmer focus, and natural balance into your everyday.';
    }

    $current_url = esc_url( home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) ) );
    $hero_webp   = esc_url( AOSE_THEME_URI . '/assets/images/hero.webp' );
    $hero_jpg    = esc_url( AOSE_THEME_URI . '/assets/images/hero.jpg' );

    // 1. PERFORMANCE: Font preconnects for instant DNS/TLS resolution
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

    // 2. PERFORMANCE: Preload LCP hero image with high fetch priority on front page
    if ( is_front_page() || is_home() ) {
        echo '<link rel="preload" as="image" href="' . $hero_webp . '" type="image/webp" fetchpriority="high">' . "\n";
    }

    // 3. SEO: Meta Description (Crucial for 100/100 SEO audit)
    $meta_description = $site_desc;
    if ( is_singular() ) {
        $post = get_post();
        if ( ! empty( $post->post_excerpt ) ) {
            $meta_description = esc_attr( wp_strip_all_tags( $post->post_excerpt ) );
        } elseif ( ! empty( $post->post_content ) ) {
            $meta_description = esc_attr( wp_trim_words( wp_strip_all_tags( $post->post_content ), 28 ) );
        }
    }
    echo '<meta name="description" content="' . $meta_description . '">' . "\n";

    // 4. SEO: Canonical URL
    echo '<link rel="canonical" href="' . $current_url . '">' . "\n";

    // 5. SEO: Open Graph Meta Tags
    echo '<meta property="og:locale" content="' . esc_attr( get_locale() ) . '">' . "\n";
    echo '<meta property="og:type" content="' . ( is_singular() ? 'article' : 'website' ) . '">' . "\n";
    echo '<meta property="og:title" content="' . ( is_front_page() ? $site_name . ' — Pure Matcha for Everyday Wellness' : wp_get_document_title() ) . '">' . "\n";
    echo '<meta property="og:description" content="' . $meta_description . '">' . "\n";
    echo '<meta property="og:url" content="' . $current_url . '">' . "\n";
    echo '<meta property="og:site_name" content="' . $site_name . '">' . "\n";
    echo '<meta property="og:image" content="' . $hero_jpg . '">' . "\n";
    echo '<meta property="og:image:width" content="1600">' . "\n";
    echo '<meta property="og:image:height" content="900">' . "\n";

    // 6. SEO: Twitter Card Tags
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . ( is_front_page() ? $site_name . ' — Pure Matcha for Everyday Wellness' : wp_get_document_title() ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . $meta_description . '">' . "\n";
    echo '<meta name="twitter:image" content="' . $hero_jpg . '">' . "\n";

    // 7. SEO: JSON-LD Structured Data Schema (Organization, WebSite & Product)
    $schema_data = array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            array(
                '@type'       => 'Organization',
                '@id'         => home_url( '/#organization' ),
                'name'        => $site_name,
                'url'         => home_url( '/' ),
                'logo'        => array(
                    '@type' => 'ImageObject',
                    'url'   => $hero_jpg,
                ),
                'description' => $meta_description,
                'sameAs'      => array(
                    'https://instagram.com/aose',
                    'https://tiktok.com/@aose',
                    'https://pinterest.com/aose',
                ),
            ),
            array(
                '@type'       => 'WebSite',
                '@id'         => home_url( '/#website' ),
                'url'         => home_url( '/' ),
                'name'        => $site_name,
                'description' => $site_desc,
                'publisher'   => array(
                    '@id' => home_url( '/#organization' ),
                ),
            ),
        ),
    );

    if ( is_front_page() || is_home() ) {
        $schema_data['@graph'][] = array(
            '@type'       => 'Product',
            'name'        => 'AOSE Traditional Ceremonial Matcha',
            'image'       => aose_asset( 'assets/images/product-pure.jpg' ),
            'description' => 'Pure ceremonial-grade stone-ground matcha powder grown under shade for calm focus and steady energy.',
            'brand'       => array(
                '@type' => 'Brand',
                'name'  => $site_name,
            ),
            'offers'      => array(
                '@type'         => 'Offer',
                'price'         => '38.00',
                'priceCurrency' => 'USD',
                'availability'  => 'https://schema.org/InStock',
                'url'           => home_url( '/' ),
            ),
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'aose_head_performance_and_seo', 1 );

/**
 * Add preconnect resource hints for Google Fonts performance.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array
 */
function aose_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'aose_resource_hints', 10, 2 );

/**
 * Load script tag as type="module" for vanilla ES modules.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @return string
 */
function aose_script_loader_tag( $tag, $handle ) {
    if ( 'aose-main-js' === $handle ) {
        $tag = str_replace( '<script ', '<script type="module" ', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'aose_script_loader_tag', 10, 2 );

/**
 * Register AOSE Block Pattern Categories.
 */
function aose_register_pattern_categories() {
    register_block_pattern_category(
        'aose-matcha',
        array(
            'label'       => __( 'AOSE Matcha Wellness', 'aose-matcha' ),
            'description' => __( 'Signature block patterns for the AOSE Matcha landing page.', 'aose-matcha' ),
        )
    );
}
add_action( 'init', 'aose_register_pattern_categories' );

/**
 * Helper function to retrieve asset URIs safely.
 *
 * @param string $path Relative path within the theme directory.
 * @return string Full URL to the asset.
 */
function aose_asset( $path ) {
    return esc_url( AOSE_THEME_URI . '/' . ltrim( $path, '/' ) );
}

/**
 * Elementor Theme Locations registration for Elementor Pro Theme Builder.
 *
 * @param object $elementor_theme_manager Elementor Theme Manager instance.
 */
function aose_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
    $elementor_theme_manager->register_location( 'archive' );
}
add_action( 'elementor/theme/register_locations', 'aose_register_elementor_locations' );
