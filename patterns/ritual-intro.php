<?php
/**
 * Title: Ritual Intro & Products
 * Slug: aose/ritual-intro
 * Categories: aose-matcha
 * Description: Ceremonial matcha introduction with 3 product cards and hover lift effects.
 */
?>
<!-- wp:html -->
<section class="ritual reveal" aria-labelledby="ritual-title">
  <div class="container">
    <p class="eyebrow ritual__eyebrow">
      <span class="eyebrow__dot" aria-hidden="true"></span>
      The AOSE Ritual
    </p>
    <h2 id="ritual-title" class="ritual__title">
      a small ritual for slower, <em>better days.</em>
      <span class="ritual__sticker sticker sticker--pink ritual__sticker--rotate" aria-hidden="true">daily ritual</span>
      <span class="ritual__sticker sticker sticker--lime ritual__sticker--alt" aria-hidden="true">made fresh</span>
    </h2>

    <div class="ritual__cards">
      <!-- Card 1: Pure -->
      <article class="ritual__card">
        <p class="ritual__card-badge">Pure</p>
        <p class="ritual__card-subtitle">Traditional Ceremonial</p>
        <div class="ritual__card-image">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.jpg"
              alt="Glass of vibrant green ceremonial matcha on a wooden coaster with a soft pink backdrop"
              width="400"
              height="500"
              loading="lazy"
              decoding="async"
            >
          </picture>
        </div>
        <a href="#footer-newsletter" class="ritual__card-btn pill-btn pill-btn--outline">Explore</a>
      </article>

      <!-- Card 2: Creamy -->
      <article class="ritual__card">
        <p class="ritual__card-badge">Creamy</p>
        <p class="ritual__card-subtitle">Iced Matcha Latte</p>
        <div class="ritual__card-image">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-creamy.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-creamy.jpg"
              alt="Layered iced matcha latte in a tall glass showing green and white milk layers"
              width="400"
              height="500"
              loading="lazy"
              decoding="async"
            >
          </picture>
        </div>
        <a href="#footer-newsletter" class="ritual__card-btn pill-btn pill-btn--outline">Explore</a>
      </article>

      <!-- Card 3: Bright -->
      <article class="ritual__card">
        <p class="ritual__card-badge">Bright</p>
        <p class="ritual__card-subtitle">Strawberry Matcha</p>
        <div class="ritual__card-image">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-bright.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-bright.jpg"
              alt="Strawberry matcha layered drink with pink and green gradients in a clear glass"
              width="400"
              height="500"
              loading="lazy"
              decoding="async"
            >
          </picture>
        </div>
        <a href="#footer-newsletter" class="ritual__card-btn pill-btn pill-btn--outline">Explore</a>
      </article>
    </div>
  </div>
</section>
<!-- /wp:html -->
