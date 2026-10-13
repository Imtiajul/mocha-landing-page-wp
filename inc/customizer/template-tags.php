<?php
/**
 * AOSE Matcha Dynamic Header and Footer Template Tags
 *
 * Provides Astra-style pluggable dynamic rendering functions:
 * - aose_render_header()
 * - aose_render_footer()
 *
 * Integrates seamlessly with Elementor Pro theme builder locations
 * and respects all Astra-style WordPress Customizer settings with zero inline styles.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aose_render_header' ) ) {
    /**
     * Renders the dynamic Astra-style header.
     *
     * Respects Customizer settings: Above Header, Primary Header, Navigation, CTA, and Mobile Drawer.
     * Checks for Elementor Pro header location before rendering.
     */
    function aose_render_header() {
        // Elementor Pro Theme Builder priority check
        if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) {
            return;
        }

        $above_enable      = get_theme_mod( 'aose_header_above_enable', true );
        $announcement_text = get_theme_mod( 'aose_header_announcement_text', 'PURE MATCHA • STEADY ENERGY • CALM FOCUS • DAILY BALANCE • CLEAN RITUAL • EVERYDAY WELLNESS' );
        $search_enable     = get_theme_mod( 'aose_header_search_enable', true );
        $cta_enable        = get_theme_mod( 'aose_header_cta_enable', true );
        $cta_text          = get_theme_mod( 'aose_header_cta_text', 'Start Your Ritual' );
        $cta_url           = get_theme_mod( 'aose_header_cta_url', '#footer-newsletter' );
        $cta_style         = get_theme_mod( 'aose_header_cta_style', 'outline' );
        $mobile_cta_enable = get_theme_mod( 'aose_mobile_cta_enable', true );
        $cta_btn_class     = ( 'filled' === $cta_style ) ? 'pill-btn pill-btn--filled' : 'pill-btn pill-btn--outline';
        $site_name         = get_bloginfo( 'name' );
        if ( empty( $site_name ) ) {
            $site_name = 'AOSE';
        }
        ?>
        <a class="skip-link" href="#main"><?php esc_html_e( 'Skip to main content', 'aose-matcha' ); ?></a>

        <?php if ( $above_enable ) : ?>
            <div class="announcement" role="marquee" aria-label="<?php esc_attr_e( 'Brand highlights', 'aose-matcha' ); ?>">
                <div class="announcement__track">
                    <span class="announcement__content"><?php echo esc_html( $announcement_text ); ?></span>
                    <span class="announcement__content" aria-hidden="true"><?php echo esc_html( $announcement_text ); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <header class="header" role="banner">
            <div class="header__inner">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="header__logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo" aria-label="<?php echo esc_attr( $site_name ); ?> home">
                        <svg class="header__logo-icon" width="32" height="32" viewBox="0 0 100 100" aria-hidden="true" focusable="false">
                            <circle cx="38" cy="38" r="18" fill="#7DB92E" opacity="0.85"/>
                            <circle cx="62" cy="38" r="18" fill="#7DB92E" opacity="0.85"/>
                            <circle cx="38" cy="62" r="18" fill="#7DB92E" opacity="0.85"/>
                            <circle cx="62" cy="62" r="18" fill="#7DB92E" opacity="0.85"/>
                        </svg>
                        <span class="header__logo-text"><?php echo esc_html( $site_name ); ?></span>
                    </a>
                <?php endif; ?>

                <nav class="header__nav" aria-label="<?php esc_attr_e( 'Primary', 'aose-matcha' ); ?>">
                    <?php if ( $search_enable ) : ?>
                        <button class="header__search" type="button" aria-label="<?php esc_attr_e( 'Search', 'aose-matcha' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <circle cx="11" cy="11" r="8"/>
                                <path d="M21 21l-4.35-4.35"/>
                            </svg>
                        </button>
                    <?php endif; ?>

                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'fallback_cb'    => false,
                            )
                        );
                    } else {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__nav-link header__nav-link--active" aria-current="page"><?php esc_html_e( 'Home', 'aose-matcha' ); ?></a>
                        <a href="#wellness-title" class="header__nav-link"><?php esc_html_e( 'Benefits', 'aose-matcha' ); ?></a>
                        <a href="#ritual-title" class="header__nav-link"><?php esc_html_e( 'Ritual', 'aose-matcha' ); ?></a>
                        <a href="#steps-title" class="header__nav-link"><?php esc_html_e( 'Recipes', 'aose-matcha' ); ?></a>
                        <a href="#leaf-title" class="header__nav-link"><?php esc_html_e( 'Journal', 'aose-matcha' ); ?></a>
                        <?php
                    }
                    ?>
                </nav>

                <?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
                    <div class="header__widget-area">
                        <?php dynamic_sidebar( 'header-widget' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $cta_enable ) : ?>
                    <a href="<?php echo esc_url( $cta_url ); ?>" class="header__cta <?php echo esc_attr( $cta_btn_class ); ?>"><?php echo esc_html( $cta_text ); ?></a>
                <?php endif; ?>

                <button class="header__mobile-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="<?php esc_attr_e( 'Open menu', 'aose-matcha' ); ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <nav class="header__mobile-nav" id="mobile-nav" aria-label="<?php esc_attr_e( 'Mobile navigation', 'aose-matcha' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__nav-link header__nav-link--active" aria-current="page"><?php esc_html_e( 'Home', 'aose-matcha' ); ?></a>
                <a href="#wellness-title" class="header__nav-link"><?php esc_html_e( 'Benefits', 'aose-matcha' ); ?></a>
                <a href="#ritual-title" class="header__nav-link"><?php esc_html_e( 'Ritual', 'aose-matcha' ); ?></a>
                <a href="#steps-title" class="header__nav-link"><?php esc_html_e( 'Recipes', 'aose-matcha' ); ?></a>
                <a href="#leaf-title" class="header__nav-link"><?php esc_html_e( 'Journal', 'aose-matcha' ); ?></a>
                <?php if ( $cta_enable && $mobile_cta_enable ) : ?>
                    <a href="<?php echo esc_url( $cta_url ); ?>" class="<?php echo esc_attr( $cta_btn_class ); ?> header__mobile-cta"><?php echo esc_html( $cta_text ); ?></a>
                <?php endif; ?>
            </nav>
        </header>
        <?php
    }
}

if ( ! function_exists( 'aose_render_footer' ) ) {
    /**
     * Renders the dynamic Astra-style footer.
     *
     * Respects Customizer settings: Newsletter Row, Multi-Column Grid, Social Icons, and Copyright.
     * Checks for Elementor Pro footer location before rendering.
     */
    function aose_render_footer() {
        // Elementor Pro Theme Builder priority check
        if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {
            return;
        }

        $above_enable        = get_theme_mod( 'aose_footer_above_enable', true );
        $newsletter_text     = get_theme_mod( 'aose_footer_newsletter_text', 'Simple rituals, matcha notes, and fresh inspiration straight to your inbox.' );
        $newsletter_btn_text = get_theme_mod( 'aose_footer_newsletter_btn_text', 'Join the Ritual' );
        $giant_word          = get_theme_mod( 'aose_footer_giant_word', 'wellness' );
        $tagline             = get_theme_mod( 'aose_footer_tagline', 'matcha, <em>made part of every day.</em>' );
        $brand_cta_text      = get_theme_mod( 'aose_footer_brand_cta_text', 'Get Started' );
        $brand_cta_url       = get_theme_mod( 'aose_footer_brand_cta_url', '#footer-newsletter' );
        $col1_title          = get_theme_mod( 'aose_footer_col1_title', 'Explore' );
        $col2_title          = get_theme_mod( 'aose_footer_col2_title', 'About' );
        $social_enable       = get_theme_mod( 'aose_footer_social_enable', true );
        $instagram_url       = get_theme_mod( 'aose_footer_instagram_url', 'https://instagram.com/aose' );
        $tiktok_url          = get_theme_mod( 'aose_footer_tiktok_url', 'https://tiktok.com/@aose' );
        $pinterest_url       = get_theme_mod( 'aose_footer_pinterest_url', 'https://pinterest.com/aose' );
        $copyright_raw       = get_theme_mod( 'aose_footer_copyright', '© {year} {site_title} | all rights reserved' );
        $legal1_text         = get_theme_mod( 'aose_footer_legal1_text', 'Cookie Preferences' );
        $legal1_url          = get_theme_mod( 'aose_footer_legal1_url', '#footer-newsletter' );
        $legal2_text         = get_theme_mod( 'aose_footer_legal2_text', 'Privacy Policy' );
        $legal2_url          = get_theme_mod( 'aose_footer_legal2_url', '#footer-newsletter' );

        $site_name = get_bloginfo( 'name' );
        if ( empty( $site_name ) ) {
            $site_name = 'AOSE';
        }

        // Token replacements for dynamic copyright
        $copyright_formatted = str_replace(
            array( '{year}', '{site_title}' ),
            array( gmdate( 'Y' ), esc_html( $site_name ) ),
            $copyright_raw
        );
        ?>
        <footer class="footer" role="contentinfo">
            <div class="footer__top">
                <div class="footer__brand">
                    <p class="footer__tagline"><?php echo wp_kses_post( $tagline ); ?></p>
                    <a href="<?php echo esc_url( $brand_cta_url ); ?>" class="footer__cta pill-btn pill-btn--outline"><?php echo esc_html( $brand_cta_text ); ?></a>
                </div>

                <div class="footer__links">
                    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                        <div class="footer__links-group footer__widget-col">
                            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                        </div>
                    <?php else : ?>
                        <div class="footer__links-group">
                            <h3 class="footer__links-title"><?php echo esc_html( $col1_title ); ?></h3>
                            <a href="#wellness-title" class="footer__link"><?php esc_html_e( 'Benefits', 'aose-matcha' ); ?></a>
                            <a href="#ritual-title" class="footer__link"><?php esc_html_e( 'Ritual', 'aose-matcha' ); ?></a>
                            <a href="#steps-title" class="footer__link"><?php esc_html_e( 'Recipes', 'aose-matcha' ); ?></a>
                            <a href="#leaf-title" class="footer__link"><?php esc_html_e( 'Journal', 'aose-matcha' ); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                        <div class="footer__links-group footer__widget-col">
                            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                        </div>
                    <?php else : ?>
                        <div class="footer__links-group">
                            <h3 class="footer__links-title"><?php echo esc_html( $col2_title ); ?></h3>
                            <a href="#nature-title" class="footer__link"><?php esc_html_e( 'Our Story', 'aose-matcha' ); ?></a>
                            <a href="#leaf-title" class="footer__link"><?php esc_html_e( 'From Leaf To Cup', 'aose-matcha' ); ?></a>
                            <a href="#steps-title" class="footer__link"><?php esc_html_e( 'FAQ', 'aose-matcha' ); ?></a>
                            <a href="<?php echo esc_url( $brand_cta_url ); ?>" class="footer__link"><?php esc_html_e( 'Contact', 'aose-matcha' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ( $social_enable ) : ?>
                    <div class="footer__social-section">
                        <h3 class="footer__links-title"><?php esc_html_e( 'Social Media', 'aose-matcha' ); ?></h3>
                        <div class="footer__social">
                            <?php if ( ! empty( $instagram_url ) ) : ?>
                                <a href="<?php echo esc_url( $instagram_url ); ?>" class="footer__social-link" aria-label="<?php echo esc_attr( sprintf( __( 'Follow %s on Instagram', 'aose-matcha' ), $site_name ) ); ?>" rel="noopener noreferrer" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $tiktok_url ) ) : ?>
                                <a href="<?php echo esc_url( $tiktok_url ); ?>" class="footer__social-link" aria-label="<?php echo esc_attr( sprintf( __( 'Follow %s on TikTok', 'aose-matcha' ), $site_name ) ); ?>" rel="noopener noreferrer" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.15 15.2a6.34 6.34 0 0010.86 4.43V13a8.16 8.16 0 005.58 2.18V11.7a4.83 4.83 0 01-3.77-1.24V6.69h3.77z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $pinterest_url ) ) : ?>
                                <a href="<?php echo esc_url( $pinterest_url ); ?>" class="footer__social-link" aria-label="<?php echo esc_attr( sprintf( __( 'Follow %s on Pinterest', 'aose-matcha' ), $site_name ) ); ?>" rel="noopener noreferrer" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.08 3.15 9.43 7.6 11.21-.1-.95-.19-2.41.04-3.45.21-.94 1.36-5.76 1.36-5.76s-.35-.69-.35-1.71c0-1.6.93-2.8 2.09-2.8.98 0 1.46.74 1.46 1.63 0 .99-.63 2.47-.96 3.85-.27 1.15.58 2.09 1.71 2.09 2.06 0 3.64-2.17 3.64-5.3 0-2.77-1.99-4.71-4.84-4.71-3.3 0-5.23 2.47-5.23 5.02 0 .99.38 2.06.86 2.64.09.11.1.21.08.32-.09.38-.29 1.15-.33 1.31-.05.22-.18.26-.41.16C5.96 15.56 5 13.82 5 12.04 5 8.46 7.57 5.18 12.38 5.18c3.79 0 6.73 2.7 6.73 6.3 0 3.76-2.37 6.79-5.67 6.79-1.11 0-2.15-.58-2.5-1.26l-.68 2.6c-.25.93-.91 2.1-1.36 2.81C10.05 23.54 11 23.75 12 23.75c6.63 0 12-5.37 12-12S18.63 0 12 0z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ( $above_enable ) : ?>
                <div class="footer__newsletter" id="footer-newsletter">
                    <div class="footer__newsletter-row">
                        <div class="footer__newsletter-info">
                            <p class="footer__newsletter-text"><?php echo esc_html( $newsletter_text ); ?></p>
                            <form class="footer__newsletter-form" novalidate>
                                <label for="newsletter-email" class="visually-hidden"><?php esc_html_e( 'Email address', 'aose-matcha' ); ?></label>
                                <input
                                    type="email"
                                    id="newsletter-email"
                                    class="footer__newsletter-input"
                                    placeholder="<?php esc_attr_e( 'Enter Your Email', 'aose-matcha' ); ?>"
                                    autocomplete="email"
                                    required
                                >
                                <button type="submit" class="footer__newsletter-btn pill-btn pill-btn--filled"><?php echo esc_html( $newsletter_btn_text ); ?></button>
                            </form>
                            <p class="footer__newsletter-error" id="newsletter-error" role="alert" aria-live="polite"></p>
                            <p class="footer__newsletter-success" id="newsletter-success" role="status" aria-live="polite"></p>
                        </div>
                        <?php if ( ! empty( $giant_word ) ) : ?>
                            <div class="footer__giant-word-container" aria-hidden="true">
                                <span class="footer__giant-word gradient-word"><?php echo esc_html( $giant_word ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="footer__legal">
                <p><?php echo wp_kses_post( $copyright_formatted ); ?></p>
                <?php if ( ! empty( $legal1_text ) ) : ?>
                    <a href="<?php echo esc_url( $legal1_url ); ?>"><?php echo esc_html( $legal1_text ); ?></a>
                <?php endif; ?>
                <?php if ( ! empty( $legal2_text ) ) : ?>
                    <a href="<?php echo esc_url( $legal2_url ); ?>"><?php echo esc_html( $legal2_text ); ?></a>
                <?php endif; ?>
            </div>
        </footer>
        <?php
    }
}
