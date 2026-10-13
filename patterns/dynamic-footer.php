<?php
/**
 * Title: Footer
 * Slug: aose/footer
 * Categories: aose-matcha, footer
 * Block Types: core/template-part/footer
 * Description: Dynamic Astra-style customizable footer with 3 rows (Above Newsletter, Multi-Column Primary, Below Legal).
 */
?>
<!-- wp:html -->
<?php
if ( function_exists( 'aose_render_footer' ) ) {
    aose_render_footer();
}
?>
<!-- /wp:html -->
