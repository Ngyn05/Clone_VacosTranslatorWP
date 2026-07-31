/**
 * ROCK-SOLID ULTRA-SMOOTH HORIZONTAL CAROUSEL ENGINE
 * Features:
 * - 700ms ease-in-out / cubic-bezier horizontal sliding via transform: translateX()
 * - Moves 1 item at a time
 * - Previous & Next navigation buttons
 * - Pause / Resume autoplay toggle button
 * - Infinite looping via silent clone-reset on transitionend (no jump, no backward scrolling)
 * - Desktop mouse drag + Mobile touch swipe
 * - Autoplay 4.5s with pause on hover/interaction & manual pause lock
 * - Responsive items per view
 */

(function () {
  'use strict';

  const PAUSE_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#2D3139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 8V16" stroke="#2D3139" stroke-width="2"/>
<path d="M10 8V16" stroke="#2D3139" stroke-width="2"/>
</svg>`;

  const PLAY_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#2D3139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<polygon points="10,8 16,12 10,16" fill="#2D3139"/>
</svg>`;

  function initSmoothCarousel(container) {
    if (container.dataset.smoothCarouselInitialized) return;
    container.dataset.smoothCarouselInitialized = 'true';

    // Find or wrap track
    let track = container.querySelector('.smooth-carousel-track, .swiper-wrapper');
    if (!track) {
      const children = Array.from(container.children).filter(
        el => !el.classList.contains('smooth-carousel-btn') &&
              !el.classList.contains('swiper-button-prev') &&
              !el.classList.contains('swiper-button-next') &&
              !el.classList.contains('btn-stop-autoplay')
      );
      if (children.length === 0) return;
      track = document.createElement('div');
      track.className = 'smooth-carousel-track';
      children.forEach(child => track.appendChild(child));
      container.appendChild(track);
    }

    container.classList.add('smooth-carousel-container');
    track.classList.add('smooth-carousel-track');

    let originalSlides = Array.from(track.children).filter(
      el => !el.classList.contains('smooth-carousel-btn') &&
            !el.classList.contains('swiper-button-prev') &&
            !el.classList.contains('swiper-button-next')
    );

    if (originalSlides.length === 0) return;

    // Make slides distinguishable
    originalSlides.forEach(slide => slide.classList.add('smooth-carousel-slide'));

    const slideCount = originalSlides.length;
    const cloneCount = Math.max(slideCount, 4);

    // Create cloned slides for infinite seamless loop
    for (let i = 0; i < cloneCount; i++) {
      const cloneFirst = originalSlides[i % slideCount].cloneNode(true);
      cloneFirst.classList.add('is-clone');
      track.appendChild(cloneFirst);

      const cloneLastIndex = (slideCount - 1 - (i % slideCount) + slideCount) % slideCount;
      const cloneLast = originalSlides[cloneLastIndex].cloneNode(true);
      cloneLast.classList.add('is-clone');
      track.insertBefore(cloneLast, track.firstChild);
    }

    let allSlides = Array.from(track.children);
    let currentIndex = cloneCount;
    let isTransitioning = false;
    let isDragging = false;
    let startX = 0;
    let currentX = 0;
    let deltaX = 0;
    let autoplayTimer = null;
    let isManuallyPaused = false;

    let itemWidth = 0;
    let gap = 20;
    let stepWidth = 0;

    function calculateDimensions() {
      const containerWidth = container.clientWidth || 300;
      let itemsPerView = 3;

      if (window.innerWidth < 768) {
        itemsPerView = 1.18; // Mobile: ~1.18 items visible
        gap = 14;
      } else if (window.innerWidth < 1024) {
        itemsPerView = 2;
        gap = 20;
      } else {
        itemsPerView = container.classList.contains('carousel-media') || container.classList.contains('carousel-awards') || container.classList.contains('carousel-award') ? 4 : 3;
        gap = 24;
      }

      itemWidth = (containerWidth - (Math.floor(itemsPerView) - 1) * gap) / itemsPerView;
      stepWidth = itemWidth + gap;

      allSlides.forEach(slide => {
        slide.style.width = itemWidth + 'px';
        slide.style.marginRight = gap + 'px';
      });

      // Update position without animation on resize
      track.style.transition = 'none';
      setTransform(-currentIndex * stepWidth);
    }

    function setTransform(x) {
      track.style.transform = 'translate3d(' + x + 'px, 0, 0)';
    }

    function slideTo(index, animate = true) {
      if (animate) {
        isTransitioning = true;
        track.style.transition = 'transform 700ms cubic-bezier(0.25, 1, 0.5, 1)';
      } else {
        track.style.transition = 'none';
      }
      currentIndex = index;
      setTransform(-currentIndex * stepWidth);
    }

    function nextSlide() {
      if (isTransitioning) return;
      slideTo(currentIndex + 1, true);
    }

    function prevSlide() {
      if (isTransitioning) return;
      slideTo(currentIndex - 1, true);
    }

    // Handle Seamless Infinite Loop Reset after transition
    track.addEventListener('transitionend', function (e) {
      if (e.target !== track) return;
      isTransitioning = false;

      // When past last original slide
      if (currentIndex >= slideCount + cloneCount) {
        track.style.transition = 'none';
        currentIndex = currentIndex - slideCount;
        setTransform(-currentIndex * stepWidth);
        track.offsetHeight; // Force reflow
      } 
      // When before first original slide
      else if (currentIndex < cloneCount) {
        track.style.transition = 'none';
        currentIndex = currentIndex + slideCount;
        setTransform(-currentIndex * stepWidth);
        track.offsetHeight; // Force reflow
      }
    });

    // Hide all Previous & Next buttons
    const existingNavBtns = container.querySelectorAll('.swiper-button-prev, .swiper-button-next, .btn-carousel-prev, .btn-carousel-next, .smooth-carousel-btn');
    existingNavBtns.forEach(btn => {
      btn.style.display = 'none';
    });

    // Mouse Drag & Touch Swipe Event Listeners
    function onDragStart(e) {
      if (isTransitioning) return;
      isDragging = true;
      startX = e.type.includes('touch') ? e.touches[0].pageX : e.pageX;
      currentX = startX;
      deltaX = 0;
      track.style.transition = 'none';
      stopAutoplay();
    }

    function onDragMove(e) {
      if (!isDragging) return;
      currentX = e.type.includes('touch') ? e.touches[0].pageX : e.pageX;
      deltaX = currentX - startX;
      setTransform(-currentIndex * stepWidth + deltaX);
    }

    function onDragEnd() {
      if (!isDragging) return;
      isDragging = false;
      track.style.transition = 'transform 700ms cubic-bezier(0.25, 1, 0.5, 1)';

      if (deltaX < -50) {
        nextSlide();
      } else if (deltaX > 50) {
        prevSlide();
      } else {
        slideTo(currentIndex, true);
      }
      if (!isManuallyPaused) {
        resumeAutoplayLater();
      }
    }

    container.addEventListener('mousedown', onDragStart);
    container.addEventListener('mousemove', onDragMove);
    window.addEventListener('mouseup', onDragEnd);

    container.addEventListener('touchstart', onDragStart, { passive: true });
    container.addEventListener('touchmove', onDragMove, { passive: true });
    container.addEventListener('touchend', onDragEnd);

    // Autoplay Engine (Auto scroll automatically with dynamic speed)
    const speed = parseInt(container.dataset.carouselSpeed) || 3000;

    function startAutoplay() {
      if (isManuallyPaused) return;
      stopAutoplay();
      autoplayTimer = setInterval(function () {
        nextSlide();
      }, speed);
    }

    function stopAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    let resumeTimeout = null;
    function resumeAutoplayLater(delay = 300) {
      if (isManuallyPaused) return;
      if (resumeTimeout) clearTimeout(resumeTimeout);
      resumeTimeout = setTimeout(function () {
        startAutoplay();
      }, delay);
    }

    container.addEventListener('mouseenter', function () {
      stopAutoplay();
    });

    container.addEventListener('mouseleave', function () {
      if (!isManuallyPaused) {
        resumeAutoplayLater(300);
      }
    });

    // Pause / Resume Button Setup
    let parentSection = container.closest('section') || container.closest('.trustedby-logo-carousel-wrapper') || container.parentElement;
    let pauseBtn = container.querySelector('.btn-stop-autoplay') ||
                   (container.nextElementSibling && container.nextElementSibling.querySelector ? container.nextElementSibling.querySelector('.btn-stop-autoplay') : null) ||
                   (parentSection ? parentSection.querySelector('.btn-stop-autoplay') : null);

    if (pauseBtn) {
      if (!pauseBtn._controlledCarousels) {
        pauseBtn._controlledCarousels = [];

        const textSpan = pauseBtn.querySelector('span');
        const imgIcon = pauseBtn.querySelector('img');

        let isGlobalPaused = false;
        const pauseLabel = 'Tạm dừng';
        const resumeLabel = 'Tiếp tục';

        // Translate initial button text to Vietnamese
        if (textSpan) {
          textSpan.textContent = pauseLabel;
        }
        pauseBtn.setAttribute('aria-label', 'Tạm dừng tự động cuộn');

        pauseBtn.addEventListener('click', function (e) {
          e.preventDefault();
          e.stopPropagation();
          isGlobalPaused = !isGlobalPaused;

          if (isGlobalPaused) {
            pauseBtn.classList.add('is-paused');
            if (textSpan) textSpan.textContent = resumeLabel;
            pauseBtn.setAttribute('aria-label', 'Tiếp tục tự động cuộn');

            if (imgIcon) {
              imgIcon.style.display = 'none';
            }
            let svgEl = pauseBtn.querySelector('.btn-pause-play-icon');
            if (!svgEl) {
              svgEl = document.createElement('span');
              svgEl.className = 'btn-pause-play-icon';
              pauseBtn.appendChild(svgEl);
            }
            svgEl.style.display = 'inline-flex';
            svgEl.innerHTML = PLAY_SVG;
          } else {
            pauseBtn.classList.remove('is-paused');
            if (textSpan) textSpan.textContent = pauseLabel;
            pauseBtn.setAttribute('aria-label', 'Tạm dừng tự động cuộn');

            if (imgIcon) {
              imgIcon.style.display = '';
            }
            let svgEl = pauseBtn.querySelector('.btn-pause-play-icon');
            if (svgEl) {
              svgEl.style.display = 'none';
            }
          }

          pauseBtn._controlledCarousels.forEach(control => {
            control.togglePause(isGlobalPaused);
          });
        });
      }

      pauseBtn._controlledCarousels.push({
        togglePause: function (shouldPause) {
          isManuallyPaused = shouldPause;
          if (shouldPause) {
            stopAutoplay();
            if (resumeTimeout) clearTimeout(resumeTimeout);
          } else {
            startAutoplay();
          }
        }
      });
    }

    // Resize Handler
    window.addEventListener('resize', calculateDimensions);

    // Initial Layout Setup
    calculateDimensions();
    startAutoplay();
  }

  function initAllCarousels() {
    const selectors = [
      '.floating-carousel',
      '.carousel-media',
      '.carousel-awards',
      '.carousel-award',
      '.carousel-trustedby-logo',
      '.swiper-carousel',
      '.how-vasco-section .swiper',
      '.media-awards .swiper',
      '.key-features-section .swiper',
      '.blogs .swiper'
    ];

    selectors.forEach(sel => {
      document.querySelectorAll(sel).forEach(el => {
        if (!el.closest('.translators-carousel')) {
          initSmoothCarousel(el);
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllCarousels);
  } else {
    initAllCarousels();
  }

  // Backup re-init after dynamic loads
  setTimeout(initAllCarousels, 500);
  setTimeout(initAllCarousels, 1500);
})();

