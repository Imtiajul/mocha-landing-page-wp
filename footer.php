<?php
/**
 * The template for displaying the footer
 *
 * Provides compatibility for classic template hierarchy, Elementor Pro theme builder,
 * and standard WordPress environments while invoking the Astra-style dynamic footer.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
        <?php
        if ( function_exists( 'aose_render_footer' ) ) {
            aose_render_footer();
        }
        ?>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
