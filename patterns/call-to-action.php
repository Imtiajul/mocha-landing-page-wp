<?php
/**
 * Title: Call To Action
 * Slug: aose/call-to-action
 * Categories: aose-matcha, call-to-action
 * Description: Newsletter sign-up and brand call-to-action banner with giant decorative typography.
 */
?>
<!-- wp:html -->
<section class="footer__newsletter" id="footer-newsletter" aria-labelledby="cta-heading">
  <h2 id="cta-heading" class="visually-hidden">Join the AOSE Ritual</h2>
  <div class="footer__newsletter-row">
    <div class="footer__newsletter-info">
      <p class="footer__newsletter-text">Simple rituals, matcha notes, and fresh inspiration straight to your inbox.</p>
      <form class="footer__newsletter-form" novalidate>
        <label for="cta-newsletter-email" class="visually-hidden">Email address</label>
        <input
          type="email"
          id="cta-newsletter-email"
          class="footer__newsletter-input"
          placeholder="Enter Your Email"
          autocomplete="email"
          required
        >
        <button type="submit" class="footer__newsletter-btn pill-btn pill-btn--filled">Join the Ritual</button>
      </form>
      <p class="footer__newsletter-error" id="cta-newsletter-error" role="alert" aria-live="polite"></p>
      <p class="footer__newsletter-success" id="cta-newsletter-success" role="status" aria-live="polite"></p>
    </div>
    <div class="footer__giant-word-container" aria-hidden="true">
      <span class="footer__giant-word gradient-word">wellness</span>
    </div>
  </div>
</section>
<!-- /wp:html -->
