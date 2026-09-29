<?php
/**
 * Title: Hero Section
 * Slug: aose/hero-section
 * Categories: aose-matcha, banner, featured
 * Description: Editorial full-width matcha hero section with floating petals, seasonal sticker, and tag pills.
 */
?>
<!-- wp:html -->
<section class="hero" aria-labelledby="hero-title">
  <picture class="hero__media">
    <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero.webp" type="image/webp">
    <img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero.jpg"
      alt="Ceramic matcha bowl filled with vivid green frothy matcha, bamboo whisk, scattered tea leaves and pink cherry blossom petals under a bright blue sky"
      width="1600"
      height="900"
      fetchpriority="high"
      decoding="async"
    >
  </picture>

  <!-- Floating petals with extracted classes (zero inline styles) -->
  <div class="hero__petals" aria-hidden="true">
    <svg class="hero__petal hero__petal--1" viewBox="0 0 24 24" fill="#F6C4D2" opacity="0.7"><ellipse cx="12" cy="12" rx="6" ry="10" transform="rotate(-30 12 12)"/></svg>
    <svg class="hero__petal hero__petal--2" viewBox="0 0 24 24" fill="#F6C4D2" opacity="0.5"><ellipse cx="12" cy="12" rx="5" ry="9" transform="rotate(15 12 12)"/></svg>
    <svg class="hero__petal hero__petal--3" viewBox="0 0 24 24" fill="#FDE3EA" opacity="0.6"><ellipse cx="12" cy="12" rx="6" ry="10" transform="rotate(-45 12 12)"/></svg>
    <svg class="hero__petal hero__petal--4" viewBox="0 0 24 24" fill="#F6C4D2" opacity="0.5"><ellipse cx="12" cy="12" rx="5" ry="9" transform="rotate(20 12 12)"/></svg>
    <svg class="hero__petal hero__petal--5" viewBox="0 0 24 24" fill="#FDE3EA" opacity="0.4"><ellipse cx="12" cy="12" rx="5" ry="8" transform="rotate(-10 12 12)"/></svg>
    <svg class="hero__petal hero__petal--6" viewBox="0 0 24 24" fill="#F6C4D2" opacity="0.6"><ellipse cx="12" cy="12" rx="6" ry="10" transform="rotate(35 12 12)"/></svg>
  </div>

  <div class="hero__content">
    <div class="hero__top">
      <h1 id="hero-title" class="hero__title">
        matcha
        <span class="hero__sticker sticker sticker--lime" aria-hidden="true">seasonal edit</span>
      </h1>

      <div class="hero__info">
        <p class="hero__info-label">
          <span class="sticker sticker--pink sticker-dot" aria-hidden="true"></span>
          <span class="sticker sticker--lime sticker-dot" aria-hidden="true"></span>
          Made for everyday
        </p>
        <p class="hero__info-text">A simple matcha ritual designed to bring steadier energy, calmer focus, and a little more balance into your everyday.</p>
      </div>
    </div>

    <ul class="hero__tags" role="list">
      <li class="hero__tag"><em>ceremonial</em></li>
      <li class="hero__tag"><em>whisked</em></li>
      <li class="hero__tag"><em>seasonal</em></li>
      <li class="hero__tag"><em>creamy</em></li>
      <li class="hero__tag"><em>smooth</em></li>
      <li class="hero__tag"><em>refreshing</em></li>
      <li class="hero__tag"><em>floral</em></li>
      <li class="hero__tag"><em>bright</em></li>
    </ul>
  </div>
</section>
<!-- /wp:html -->
