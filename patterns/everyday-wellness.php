<?php
/**
 * Title: Everyday Wellness
 * Slug: aose/everyday-wellness
 * Categories: aose-matcha
 * Description: Forest green wellness section featuring benefits tabs and swipeable image carousel.
 */
?>
<!-- wp:html -->
<section class="wellness reveal" aria-labelledby="wellness-title">
  <div class="container">
    <div class="wellness__header">
      <div class="wellness__header-text">
        <p class="eyebrow wellness__eyebrow">
          <svg class="eyebrow__icon" width="16" height="16" viewBox="0 0 100 100" aria-hidden="true" focusable="false">
            <circle cx="38" cy="38" r="14" fill="currentColor" opacity="0.8"/>
            <circle cx="62" cy="38" r="14" fill="currentColor" opacity="0.8"/>
            <circle cx="38" cy="62" r="14" fill="currentColor" opacity="0.8"/>
            <circle cx="62" cy="62" r="14" fill="currentColor" opacity="0.8"/>
          </svg>
          Everyday Wellness
        </p>
        <h2 id="wellness-title" class="wellness__title">
          matcha made to feel good, <em>every day.</em>
          <span class="wellness__sticker sticker sticker--lime" aria-hidden="true">clean energy</span>
        </h2>
        <p class="wellness__text">Pure matcha brings smoother energy, calmer focus, and a simple sense of balance into your everyday routine.</p>
      </div>
      <div class="wellness__arrows">
        <button class="wellness__arrow wellness__arrow--prev" type="button" aria-label="Previous slide" disabled>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <path d="M19 12H5"/>
            <path d="M12 19l-7-7 7-7"/>
          </svg>
        </button>
        <button class="wellness__arrow wellness__arrow--next" type="button" aria-label="Next slide">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <path d="M5 12h14"/>
            <path d="M12 5l7 7-7 7"/>
          </svg>
        </button>
      </div>
    </div>

    <div class="wellness__grid">
      <div class="wellness__left">
        <div class="wellness__features" role="tablist" aria-label="Wellness benefits">
          <button class="wellness__feature wellness__feature--active" role="tab" aria-selected="true" tabindex="0">
            <div class="wellness__feature-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
                <circle cx="12" cy="12" r="5"/>
                <line x1="12" y1="1" x2="12" y2="3"/>
                <line x1="12" y1="21" x2="12" y2="23"/>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                <line x1="1" y1="12" x2="3" y2="12"/>
                <line x1="21" y1="12" x2="23" y2="12"/>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
              </svg>
            </div>
            <p class="wellness__feature-title">Morning Energy</p>
            <p class="wellness__feature-text">A smoother lift to start your day.</p>
          </button>

          <button class="wellness__feature" role="tab" aria-selected="false" tabindex="-1">
            <div class="wellness__feature-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
                <path d="M18 8h1a4 4 0 010 8h-1"/>
                <path d="M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"/>
                <line x1="6" y1="1" x2="6" y2="4"/>
                <line x1="10" y1="1" x2="10" y2="4"/>
                <line x1="14" y1="1" x2="14" y2="4"/>
              </svg>
            </div>
            <p class="wellness__feature-title">Midday Reset</p>
            <p class="wellness__feature-text">A refreshing pause to recharge.</p>
          </button>

          <button class="wellness__feature" role="tab" aria-selected="false" tabindex="-1">
            <div class="wellness__feature-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                <path d="M2 17l10 5 10-5"/>
                <path d="M2 12l10 5 10-5"/>
              </svg>
            </div>
            <p class="wellness__feature-title">Calm Focus</p>
            <p class="wellness__feature-text">Clearer focus, without the rush.</p>
          </button>

          <button class="wellness__feature" role="tab" aria-selected="false" tabindex="-1">
            <div class="wellness__feature-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              </svg>
            </div>
            <p class="wellness__feature-title">Daily Balance</p>
            <p class="wellness__feature-text">An easy ritual to come back to.</p>
          </button>
        </div>
      </div>

      <div class="wellness__right">
        <div class="wellness__carousel" tabindex="0" aria-label="Wellness imagery" role="region" aria-roledescription="carousel">
          <div class="wellness__slide" role="group" aria-roledescription="slide" aria-label="1 of 4">
            <picture>
              <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/wellness-whisk.webp" type="image/webp">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/wellness-whisk.jpg"
                alt="Close-up of a bamboo whisk in a bowl of frothy green matcha"
                width="600"
                height="800"
                loading="lazy"
                decoding="async"
              >
            </picture>
          </div>
          <div class="wellness__slide" role="group" aria-roledescription="slide" aria-label="2 of 4">
            <picture>
              <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/wellness-iced.webp" type="image/webp">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/wellness-iced.jpg"
                alt="Iced green matcha drink in a glass with condensation and a metal straw"
                width="600"
                height="800"
                loading="lazy"
                decoding="async"
              >
            </picture>
          </div>
          <div class="wellness__slide" role="group" aria-roledescription="slide" aria-label="3 of 4">
            <picture>
              <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.webp" type="image/webp">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-pure.jpg"
                alt="Pure green matcha in a clear glass on a wooden coaster"
                width="600"
                height="800"
                loading="lazy"
                decoding="async"
              >
            </picture>
          </div>
          <div class="wellness__slide" role="group" aria-roledescription="slide" aria-label="4 of 4">
            <picture>
              <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-creamy.webp" type="image/webp">
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-creamy.jpg"
                alt="Creamy iced matcha latte with layers of green and white"
                width="600"
                height="800"
                loading="lazy"
                decoding="async"
              >
            </picture>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
