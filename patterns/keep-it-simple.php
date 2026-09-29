<?php
/**
 * Title: Keep It Simple (4 Steps)
 * Slug: aose/keep-it-simple
 * Categories: aose-matcha
 * Description: Interactive 4-step matcha preparation ritual with scroll-activated preview bands.
 */
?>
<!-- wp:html -->
<section class="steps reveal" aria-labelledby="steps-title">
  <div class="container">
    <p class="eyebrow steps__eyebrow">
      <span class="eyebrow__dot" aria-hidden="true"></span>
      Keep It Simple
    </p>
    <h2 id="steps-title" class="steps__title">
      a better matcha ritual, <em>in four simple steps</em>
      <span class="steps__sticker sticker sticker--pink steps__sticker--rotate" aria-hidden="true">step by step</span>
      <span class="steps__sticker sticker sticker--lime steps__sticker--alt" aria-hidden="true">easy</span>
    </h2>
    <p class="steps__subtitle">A simple routine for making matcha part of your everyday.</p>

    <ol class="steps__list">
      <li class="steps__item">
        <div class="steps__item-header">
          <span class="steps__number">1</span>
          <span class="steps__word">scoop</span>
        </div>
        <div class="steps__band">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-whisk-powder.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-whisk-powder.jpg"
              alt="Bamboo scoop with bright green matcha powder"
              width="500"
              height="300"
              loading="lazy"
              decoding="async"
            >
          </picture>
          <p class="steps__caption">Measure a scoop of vibrant matcha powder into your favourite bowl or cup.</p>
        </div>
      </li>

      <li class="steps__item">
        <div class="steps__item-header">
          <span class="steps__number">2</span>
          <span class="steps__word">pour</span>
        </div>
        <div class="steps__band">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.jpg"
              alt="Water being poured over matcha powder"
              width="500"
              height="300"
              loading="lazy"
              decoding="async"
            >
          </picture>
          <p class="steps__caption">Add a small splash of hot water, just enough to form a smooth, vivid paste.</p>
        </div>
      </li>

      <li class="steps__item steps__item--active">
        <div class="steps__item-header">
          <span class="steps__number">3</span>
          <span class="steps__word"><em>whisk</em></span>
        </div>
        <div class="steps__band">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/step-whisk.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/step-whisk.jpg"
              alt="Bamboo whisk creating froth in a bowl of bright green matcha"
              width="500"
              height="300"
              loading="lazy"
              decoding="async"
            >
          </picture>
          <p class="steps__caption">Whisk gently until the texture turns smooth, light, and softly frothy.</p>
        </div>
      </li>

      <li class="steps__item">
        <div class="steps__item-header">
          <span class="steps__number">4</span>
          <span class="steps__word">enjoy</span>
        </div>
        <div class="steps__band">
          <picture>
            <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-latte.webp" type="image/webp">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/balance-latte.jpg"
              alt="A finished matcha latte ready to enjoy"
              width="500"
              height="300"
              loading="lazy"
              decoding="async"
            >
          </picture>
          <p class="steps__caption">Sip slowly and let the calm, steady energy settle into your day.</p>
        </div>
      </li>
    </ol>
  </div>
</section>
<!-- /wp:html -->
