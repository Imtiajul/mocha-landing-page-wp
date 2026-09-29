<?php
/**
 * Title: Balance Showcase
 * Slug: aose/balance-showcase
 * Categories: aose-matcha
 * Description: Signature typography showcase with giant gradient display word and latte photo.
 */
?>
<!-- wp:html -->
<section class="balance reveal" aria-labelledby="balance-heading">
  <h2 id="balance-heading" class="visually-hidden">Balance in every cup</h2>

  <div class="balance__left">
    <div class="balance__photo">
      <picture>
        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-latte.webp" type="image/webp">
        <img
          src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-latte.jpg"
          alt="Matcha latte with beautiful green latte art in a white ceramic cup"
          width="280"
          height="210"
          loading="lazy"
          decoding="async"
        >
      </picture>
    </div>
    <p class="balance__caption">The result is a ritual that feels as good as it tastes: smooth energy, a calmer sense of focus, and an easy way to bring a little more balance into the everyday.</p>
  </div>

  <span class="balance__word gradient-word" aria-hidden="true">balance</span>

  <div class="balance__cutout" aria-hidden="true">
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-sieve.webp" type="image/webp">
      <img
        class="balance__cutout-img"
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-sieve.jpg"
        alt="Fine mesh sieve with pure green matcha powder"
        width="300"
        height="400"
        loading="lazy"
        decoding="async"
      >
    </picture>
  </div>
</section>
<!-- /wp:html -->
