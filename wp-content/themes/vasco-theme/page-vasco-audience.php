<?php
/**
 * Template Name: page-vasco-audience.php
 *
 * @package VascoTheme
 */

get_header();
?>

<!DOCTYPE html>

<html lang="pl">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="../favicon.svg" rel="icon" type="image/svg+xml"/>
<link href="../favicon.ico" rel="icon" type="image/x-icon"/>
<link href="../favicon-32x32.png" rel="icon" sizes="32x32" type="image/png"/>
<link href="../favicon-16x16.png" rel="icon" sizes="16x16" type="image/png"/>
<link href="../apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180"/>
<link href="../manifest.json" rel="manifest"/>
<meta content="#111827" name="theme-color"/>
<link href="#" rel="preconnect"/>
<link crossorigin="" href="#" rel="preconnect"/>
<title>Vasco Audience | Tłumaczenia na żywo bez sprzętu</title>
<style>
      body{margin:0;font-family:system-ui,-apple-system,sans-serif;-webkit-font-smoothing:antialiased}
      #root{min-height:100vh}
      .min-h-screen{min-height:100vh}
      .bg-white{background-color:#fff}
      .text-gray-900{color:#111827}
      .font-sans{font-family:ui-sans-serif,system-ui,sans-serif}
    </style>
<!-- Google Consent Mode v2 — must load BEFORE GTM -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', {
      analytics_storage: 'denied',
      ad_storage: 'denied',
      ad_user_data: 'denied',
      ad_personalization: 'denied'
    });
    (function(){
      try {
        var c = localStorage.getItem('vasco-cookie-consent');
        if (c === 'accepted') {
          gtag('consent', 'update', {
            analytics_storage: 'granted',
            ad_storage: 'granted',
            ad_user_data: 'granted',
            ad_personalization: 'granted'
          });
        }
      } catch(e){}
    })();
    </script>
<!-- End Google Consent Mode v2 -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WZBDT6KF');</script>
<!-- End Google Tag Manager -->
<!-- Contentsquare / Hotjar -->
<script async="" src="https://t.contentsquare.net/uxa/4caffd57f93f5.js" /></script>
<!-- End Contentsquare / Hotjar -->
<script crossorigin="" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/index-DF1SitB8.js" ); ?>" type="module"></script>
<link crossorigin="" href="../assets/vendor-helmet-Bl0NkVNc.js" rel="modulepreload"/>
<link crossorigin="" href="../assets/vendor-motion-B-DXh1kW.js" rel="modulepreload"/>
<link crossorigin="" href="../assets/vendor-router-CvRv0Qke.js" rel="modulepreload"/>
<link crossorigin="" href="../assets/vendor-i18n-oX0ZlWwM.js" rel="modulepreload"/>
<link crossorigin="" href="../assets/vendor-icons-CDibjtYT.js" rel="modulepreload"/>
<link crossorigin="" href="../assets/index-Bac-we2J.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../themes/vasco-theme/assets/css/smooth-carousel.css"/>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-WZBDT6KF" style="display:none;visibility:hidden" width="0"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="root"></div>
<!-- GUARANTEED MEGAMENU HOVER ENGINE WITH SNAPPY CLOSE -->
<style id="guaranteed-megamenu-css">
  @media (min-width: 992px) {
    header, .header, #desktop-nav {
      position: relative !important;
      z-index: 10000 !important;
    }
    .desktop-nav .menu-item-wrapper {
      position: static !important;
    }
    .desktop-nav .menu-item-wrapper:hover {
      background-color: #efece8 !important;
    }
    .desktop-nav .menu-item-wrapper:hover .arrow-rotate,
    .desktop-nav .menu-item-wrapper.open .arrow-rotate {
      transform: rotate(180deg) !important;
    }
    .megamenu-childs-wrapper {
      position: absolute !important;
      top: 100% !important;
      left: 0 !important;
      right: 0 !important;
      width: 100% !important;
      background-color: #ffffff !important;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.16) !important;
      border-bottom-left-radius: 24px !important;
      border-bottom-right-radius: 24px !important;
      border-top: 1px solid #efece8 !important;
      padding: 32px 0 !important;
      pointer-events: auto !important;
    }
    .megamenu-childs-wrapper[hidden] {
      display: none !important;
    }
  }
</style>
<script id="guaranteed-megamenu-js">
(function() {
  function setupHoverMegamenus() {
    var wrappers = document.querySelectorAll('.menu-item-wrapper');
    wrappers.forEach(function(wrapper) {
      var submenu = wrapper.querySelector('.megamenu-childs-wrapper');
      var link = wrapper.querySelector('.nav-link');
      if (!submenu) return;

      var closeTimer = null;

      function loadLazyImages() {
        var imgs = submenu.querySelectorAll('img[data-src]');
        imgs.forEach(function(img) {
          var ds = img.getAttribute('data-src');
          if (ds) {
            img.src = ds;
          }
        });
      }

      function openMenu() {
        if (closeTimer) {
          clearTimeout(closeTimer);
          closeTimer = null;
        }
        loadLazyImages();
        submenu.removeAttribute('hidden');
        submenu.style.cssText = 'display: flex !important; visibility: visible !important; opacity: 1 !important; z-index: 99999 !important; pointer-events: auto !important;';
        wrapper.classList.add('open');
        if (link) link.setAttribute('aria-expanded', 'true');
      }

      function closeMenu() {
        if (closeTimer) clearTimeout(closeTimer);
        closeTimer = setTimeout(function() {
          submenu.setAttribute('hidden', '');
          submenu.style.cssText = '';
          wrapper.classList.remove('open');
          if (link) link.setAttribute('aria-expanded', 'false');
        }, 100); // Fast 100ms close when mouse moves out
      }

      wrapper.addEventListener('mouseenter', openMenu);
      wrapper.addEventListener('mouseleave', closeMenu);
      submenu.addEventListener('mouseenter', openMenu);
      submenu.addEventListener('mouseleave', closeMenu);

      if (link) {
        link.addEventListener('mouseenter', openMenu);
        link.addEventListener('mouseleave', closeMenu);
        link.addEventListener('click', function(e) {
          if (window.innerWidth < 992) {
            e.preventDefault();
            if (wrapper.classList.contains('open')) {
              closeMenu();
            } else {
              openMenu();
            }
          }
        });
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', setupHoverMegamenus);
  } else {
    setupHoverMegamenus();
  }
})();
</script>
<!-- MOBILE MENU & CTA CLICK NAV ENGINE -->
<!-- MOBILE MENU & CTA CLICK NAV ENGINE -->
<script id="custom-mobile-menu-fix">
(function() {
  function initMobileMenuNav() {
    var burger = document.querySelector('#open-menu, .open-menu, .burger-menu');
    var mobileMenu = document.querySelector('.mobile-menu, #mobile-menu, .mobile-nav');
    
    if (burger && mobileMenu) {
      burger.addEventListener('click', function(e) {
        mobileMenu.classList.toggle('active');
        mobileMenu.classList.toggle('open');
      });
    }

    // Ensure all links with valid href navigate correctly
    document.querySelectorAll('a[href]').forEach(function(link) {
      var href = link.getAttribute('href');
      if (href && href !== '#' && !href.startsWith('javascript:')) {
        link.style.cursor = 'pointer';
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenuNav);
  } else {
    initMobileMenuNav();
  }
})();
</script>
  <script src="../themes/vasco-theme/assets/js/smooth-carousel.js"></script>
</body>
</html>


<?php
get_footer();
