<?php
/**
 * The template for displaying comments
 *
 * Modern, accessible, secure comment list and form adhering to AOSE design tokens.
 *
 * @package AOSE_Matcha
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $aose_comment_count = get_comments_number();
            if ( '1' === $aose_comment_count ) {
                printf(
                    /* translators: 1: title. */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'aose-matcha' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $aose_comment_count, 'comments title', 'aose-matcha' ) ),
                    number_format_i18n( $aose_comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 48,
                )
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aose-matcha' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(
        array(
            'class_submit'  => 'pill-btn pill-btn--filled',
            'title_reply'   => __( 'Leave a Comment', 'aose-matcha' ),
            'title_reply_to'=> __( 'Leave a Reply to %s', 'aose-matcha' ),
        )
    );
    ?>
</div>
