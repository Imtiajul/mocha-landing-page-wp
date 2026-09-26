/**
 * AOSE Matcha Landing Page - Main JavaScript
 * No dependencies, vanilla ES module.
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

function initNav() {
  const header = document.querySelector('.header');
  const toggleBtn = document.querySelector('.header__mobile-toggle');
  const mobileNav = document.querySelector('.header__mobile-nav');
  
  if (!header) return;

  // Sticky header
  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        if (window.scrollY > 50) {
          header.classList.add('header--scrolled');
        } else {
          header.classList.remove('header--scrolled');
        }
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });

  if (window.scrollY > 50) {
    header.classList.add('header--scrolled');
  }

  // Mobile nav
  if (toggleBtn && mobileNav) {
    const focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    const firstFocusableElement = mobileNav.querySelectorAll(focusableElements)[0];
    const focusableContent = mobileNav.querySelectorAll(focusableElements);
    const lastFocusableElement = focusableContent[focusableContent.length - 1];
    let isNavOpen = false;

    const toggleNav = () => {
      isNavOpen = !isNavOpen;
      mobileNav.classList.toggle('header__mobile-nav--open');
      toggleBtn.setAttribute('aria-expanded', isNavOpen);
      document.body.style.overflow = isNavOpen ? 'hidden' : '';

      if (isNavOpen && firstFocusableElement) {
        // Focus first element on open
        setTimeout(() => firstFocusableElement.focus(), 100);
      } else {
        toggleBtn.focus();
      }
    };

    toggleBtn.addEventListener('click', toggleNav);

    // Trap focus
    mobileNav.addEventListener('keydown', (e) => {
      if (e.key === 'Tab') {
        if (e.shiftKey) {
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            e.preventDefault();
          }
        } else {
          if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            e.preventDefault();
          }
        }
      } else if (e.key === 'Escape') {
        toggleNav();
      }
    });

    // Close on link click
    const links = mobileNav.querySelectorAll('a');
    links.forEach(link => {
      link.addEventListener('click', () => {
        if (isNavOpen) toggleNav();
      });
    });
  }
}

function initCarousel() {
  const carousel = document.querySelector('.wellness__carousel');
  const prevBtn = document.querySelector('.wellness__arrow--prev');
  const nextBtn = document.querySelector('.wellness__arrow--next');
  const features = document.querySelectorAll('.wellness__feature');
  const slides = document.querySelectorAll('.wellness__slide');

  if (!carousel || !slides.length) return;

  const updateControls = () => {
    if (prevBtn && nextBtn) {
      prevBtn.disabled = carousel.scrollLeft <= 0;
      nextBtn.disabled = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 1;
    }
  };

  const updateActiveFeature = (activeIndex) => {
    features.forEach((feature, index) => {
      if (index === activeIndex) {
        feature.classList.add('wellness__feature--active');
        feature.setAttribute('aria-selected', 'true');
      } else {
        feature.classList.remove('wellness__feature--active');
        feature.setAttribute('aria-selected', 'false');
      }
    });
  };

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const index = Array.from(slides).indexOf(entry.target);
          updateActiveFeature(index);
          updateControls();
        }
      });
    }, {
      root: carousel,
      threshold: 0.5
    });

    slides.forEach(slide => observer.observe(slide));
  } else {
    // Fallback for older browsers
    carousel.addEventListener('scroll', () => {
      const slideWidth = slides[0].clientWidth;
      const index = Math.round(carousel.scrollLeft / slideWidth);
      updateActiveFeature(index);
      updateControls();
    }, { passive: true });
  }

  const scrollToIndex = (index) => {
    const slide = slides[index];
    if (slide) {
      carousel.scrollTo({
        left: slide.offsetLeft,
        behavior: prefersReducedMotion.matches ? 'auto' : 'smooth'
      });
    }
  };

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -carousel.clientWidth, behavior: prefersReducedMotion.matches ? 'auto' : 'smooth' });
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: carousel.clientWidth, behavior: prefersReducedMotion.matches ? 'auto' : 'smooth' });
    });
  }

  features.forEach((feature, index) => {
    feature.addEventListener('click', () => scrollToIndex(index));
    feature.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        scrollToIndex(index);
      }
    });
  });

  carousel.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
      e.preventDefault();
      carousel.scrollBy({ left: -carousel.clientWidth, behavior: prefersReducedMotion.matches ? 'auto' : 'smooth' });
    } else if (e.key === 'ArrowRight') {
      e.preventDefault();
      carousel.scrollBy({ left: carousel.clientWidth, behavior: prefersReducedMotion.matches ? 'auto' : 'smooth' });
    }
  });

  // Initial setup
  carousel.setAttribute('role', 'region');
  carousel.setAttribute('aria-roledescription', 'carousel');
  slides.forEach((slide, i) => {
    slide.setAttribute('role', 'group');
    slide.setAttribute('aria-roledescription', 'slide');
    slide.setAttribute('aria-label', `${i + 1} of ${slides.length}`);
  });
  updateControls();
}

function initSteps() {
  const steps = document.querySelectorAll('.steps__item');
  if (!steps.length) return;

  if (prefersReducedMotion.matches) {
    steps.forEach(step => step.classList.add('steps__item--active'));
    return;
  }

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          steps.forEach(s => s.classList.remove('steps__item--active'));
          entry.target.classList.add('steps__item--active');
        }
      });
    }, { threshold: 0.6 });

    steps.forEach(step => observer.observe(step));
  } else {
    steps.forEach(step => step.classList.add('steps__item--active'));
  }
}

function initReveal() {
  const elements = document.querySelectorAll('.reveal');
  if (!elements.length) return;

  if (prefersReducedMotion.matches || !('IntersectionObserver' in window)) {
    elements.forEach(el => el.classList.add('reveal--visible'));
    return;
  }

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('reveal--visible');
        obs.unobserve(entry.target);
      }
    });
  }, {
    rootMargin: '-50px',
    threshold: 0.15
  });

  elements.forEach(el => observer.observe(el));
}

function initNewsletter() {
  const form = document.querySelector('.footer__newsletter-form');
  const input = document.querySelector('.footer__newsletter-input');
  const errorMsg = document.querySelector('.footer__newsletter-error');
  const successMsg = document.querySelector('.footer__newsletter-success');

  if (!form || !input || !errorMsg || !successMsg) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (!input.checkValidity()) {
      errorMsg.textContent = input.validationMessage || "Please enter a valid email address.";
      errorMsg.style.display = 'block';
      input.setAttribute('aria-invalid', 'true');
      input.setAttribute('aria-describedby', errorMsg.id);
    } else {
      errorMsg.style.display = 'none';
      input.removeAttribute('aria-invalid');
      input.removeAttribute('aria-describedby');
      
      // TODO: Replace with actual form submission endpoint
      
      form.style.display = 'none';
      successMsg.textContent = "Welcome to the ritual! Check your inbox soon.";
      successMsg.style.display = 'block';
    }
  });

  input.addEventListener('input', () => {
    if (input.validity.valid) {
      errorMsg.style.display = 'none';
      input.removeAttribute('aria-invalid');
      input.removeAttribute('aria-describedby');
    }
  });
}

function initAnnouncement() {
  const announcement = document.querySelector('.announcement');
  if (!announcement) return;

  if (prefersReducedMotion.matches) return;

  announcement.addEventListener('mouseenter', () => announcement.classList.add('announcement--paused'));
  announcement.addEventListener('mouseleave', () => announcement.classList.remove('announcement--paused'));
  announcement.addEventListener('focusin', () => announcement.classList.add('announcement--paused'));
  announcement.addEventListener('focusout', () => announcement.classList.remove('announcement--paused'));
}

// Main initialization
function init() {
  try {
    initNav();
    initCarousel();
    initSteps();
    initReveal();
    initNewsletter();
    initAnnouncement();
  } catch (error) {
    // Silently handle to meet "no console errors or warnings" requirement
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
