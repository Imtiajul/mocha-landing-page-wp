<?php
/**
 * Title: Pure By Nature
 * Slug: aose/pure-by-nature
 * Categories: aose-matcha
 * Description: Editorial two-column feature highlighting whole leaf stone-ground matcha.
 */
?>
<!-- wp:html -->
<section class="nature reveal" aria-labelledby="nature-title">
  <div class="nature__image">
    <picture>
      <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-whisk-powder.webp" type="image/webp">
      <img
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-whisk-powder.jpg"
        alt="Bamboo whisk beside a scattered pile of bright green matcha powder on a white background"
        width="800"
        height="533"
        loading="lazy"
        decoding="async"
      >
    </picture>
  </div>
  <div class="nature__content">
    <p class="eyebrow nature__eyebrow">
      <span class="eyebrow__dot" aria-hidden="true"></span>
      Pure by Nature
    </p>
    <h2 id="nature-title" class="nature__title">
      simple by nature, <em>powerful in every cup.</em>
      <span class="nature__sticker sticker sticker--pink nature__sticker--rotate" aria-hidden="true">natural</span>
      <span class="nature__sticker sticker sticker--lime nature__sticker--alt" aria-hidden="true">whole leaf</span>
    </h2>
    <div>
      <div class="nature__thumb">
        <picture>
          <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-iced.webp" type="image/webp">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/nature-iced.jpg"
            alt="Iced matcha on a pink backdrop"
            width="140"
            height="140"
            loading="lazy"
            decoding="async"
          >
        </picture>
      </div>
      <p class="nature__text">Pure matcha keeps things refreshingly simple. Whole tea leaves are finely ground into a vibrant powder, bringing their naturally occurring caffeine, L-theanine, and plant compounds directly into every cup.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
