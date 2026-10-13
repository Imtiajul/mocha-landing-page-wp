<?php
/**
 * The template for displaying the header
 *
 * Provides compatibility for classic template hierarchy, Elementor Pro theme builder,
 * and standard WordPress environments while invoking the Astra-style dynamic header.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="page-wrapper">
    <div class="page-frame">
        <?php
        if ( function_exists( 'aose_render_header' ) ) {
            aose_render_header();
        }
        ?>
