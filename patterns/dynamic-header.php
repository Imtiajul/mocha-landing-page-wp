<?php
/**
 * Title: Header
 * Slug: aose/header
 * Categories: aose-matcha, header
 * Block Types: core/template-part/header
 * Description: Dynamic Astra-style customizable header with 3 rows (Above, Primary, Drawer).
 */
?>
<!-- wp:html -->
<?php
if ( function_exists( 'aose_render_header' ) ) {
    aose_render_header();
}
?>
<!-- /wp:html -->
