/**
 * AOSE Matcha Customizer Live Preview
 *
 * Real-time responsive updates within the WordPress Customizer preview frame.
 * Uses vanilla JS inside jQuery wrapper for standard WP Customizer API compatibility.
 */
(function ($) {
  'use strict';

  // 1. Container Width
  wp.customize('aose_container_width', function (value) {
    value.bind(function (newVal) {
      $('.page-wrapper').css('max-width', newVal + 'px');
    });
  });

  // 2. Global Colors
  wp.customize('aose_color_matcha', function (value) {
    value.bind(function (newVal) {
      document.documentElement.style.setProperty('--color-matcha', newVal);
    });
  });

  wp.customize('aose_color_lime', function (value) {
    value.bind(function (newVal) {
      document.documentElement.style.setProperty('--color-lime', newVal);
    });
  });

  wp.customize('aose_color_forest', function (value) {
    value.bind(function (newVal) {
      document.documentElement.style.setProperty('--color-forest', newVal);
    });
  });

  wp.customize('aose_color_link', function (value) {
    value.bind(function (newVal) {
      $('a').css('color', newVal);
    });
  });

  // 3. Body Typography
  wp.customize('aose_body_font_size', function (value) {
    value.bind(function (newVal) {
      $('body, p').css('font-size', newVal + 'px');
    });
  });

  // Headings
  ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'].forEach(function (h) {
    wp.customize('aose_' + h + '_font_size', function (value) {
      value.bind(function (newVal) {
        $(h).css('font-size', newVal + 'px');
      });
    });
  });

  // 4. Header Announcement Ticker Text
  wp.customize('aose_header_announcement_text', function (value) {
    value.bind(function (newVal) {
      $('.announcement__content').text(newVal);
    });
  });

  // 5. Above Header Background Color
  wp.customize('aose_header_above_bg', function (value) {
    value.bind(function (newVal) {
      $('.announcement').css('background-color', newVal);
    });
  });

  // 6. Above Header Text Color
  wp.customize('aose_header_above_color', function (value) {
    value.bind(function (newVal) {
      $('.announcement, .announcement__content').css('color', newVal);
    });
  });

  // 7. Header CTA Button Text
  wp.customize('aose_header_cta_text', function (value) {
    value.bind(function (newVal) {
      $('.header__cta, .header__mobile-cta').text(newVal);
    });
  });

  // 8. Footer Newsletter Subtitle
  wp.customize('aose_footer_newsletter_text', function (value) {
    value.bind(function (newVal) {
      $('.footer__newsletter-text').text(newVal);
    });
  });

  // 9. Footer Newsletter Submit Button Text
  wp.customize('aose_footer_newsletter_btn_text', function (value) {
    value.bind(function (newVal) {
      $('.footer__newsletter-btn').text(newVal);
    });
  });

  // 10. Footer Giant Decorative Word
  wp.customize('aose_footer_giant_word', function (value) {
    value.bind(function (newVal) {
      $('.footer__giant-word').text(newVal);
    });
  });

  // 11. Footer Brand Tagline
  wp.customize('aose_footer_tagline', function (value) {
    value.bind(function (newVal) {
      $('.footer__tagline').html(newVal);
    });
  });

  // 12. Footer Brand CTA Text
  wp.customize('aose_footer_brand_cta_text', function (value) {
    value.bind(function (newVal) {
      $('.footer__brand .footer__cta').text(newVal);
    });
  });

  // 13. Footer Column 1 Title
  wp.customize('aose_footer_col1_title', function (value) {
    value.bind(function (newVal) {
      $('.footer__links-group:first-child .footer__links-title').text(newVal);
    });
  });

  // 14. Footer Column 2 Title
  wp.customize('aose_footer_col2_title', function (value) {
    value.bind(function (newVal) {
      $('.footer__links-group:last-child .footer__links-title').text(newVal);
    });
  });

  // 15. Footer Copyright
  wp.customize('aose_footer_copyright', function (value) {
    value.bind(function (newVal) {
      var currentYear = new Date().getFullYear();
      var siteTitle = $('title').text().split('—')[0].trim() || 'AOSE';
      var formatted = newVal
        .replace('{year}', currentYear)
        .replace('{site_title}', siteTitle);
      $('.footer__legal p').html(formatted);
    });
  });
})(jQuery);
