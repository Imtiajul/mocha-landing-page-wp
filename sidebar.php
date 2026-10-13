<?php
/**
 * The sidebar containing the primary widget area.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
    return;
}
?>
<aside id="secondary" class="widget-area aose-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Primary Sidebar', 'aose-matcha' ); ?>">
    <?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside>
