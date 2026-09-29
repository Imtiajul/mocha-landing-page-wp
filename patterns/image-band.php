<?php
/**
 * Title: Image Band
 * Slug: aose/image-band
 * Categories: aose-matcha
 * Description: Full-width panoramic cherry blossom and matcha bowl image band.
 */
?>
<!-- wp:html -->
<section class="band reveal" aria-label="Matcha among cherry blossoms">
  <picture class="band__picture">
    <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/band-blossoms.webp" type="image/webp">
    <img
      class="band__image"
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/band-blossoms.jpg"
      alt="Ceramic matcha bowl with bamboo whisk surrounded by pink cherry blossoms under a bright blue sky"
      width="1600"
      height="700"
      loading="lazy"
      decoding="async"
    >
  </picture>
</section>
<!-- /wp:html -->
