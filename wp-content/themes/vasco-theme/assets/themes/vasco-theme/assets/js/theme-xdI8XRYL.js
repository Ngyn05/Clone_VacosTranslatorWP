const __vite__mapDeps=(i,m=__vite__mapDeps,d=(m.f||(m.f=["../assets/cart-modal-C1E_2DFn.js","../assets/dialog-BE5C2ZW3.js","../assets/loading-spinner-IQ_6KCmN.js","../assets/rolldown-runtime-C8AdG69S.js","../assets/animation-E2gjKDJg.js","../assets/drawer-tkWpXgDw.js","../assets/shared-C7N2bOYi.js","../assets/carousel-CwDpB8Cz.js","../assets/debounce-BY8Hu9sM.js","../assets/a11y-N6uFk4og.js","../assets/swiper-BeXrhkc_.js","../assets/autoplay-B8bxufiG.js","../assets/header-By5nkkeM.js","../assets/trustedby-logo-carousel-Dny6NQVU.js","../assets/footer-BwncCAkG.js","../assets/discount-popup-DM7DMII9.js","../assets/floating-carousel-BkfMTQi9.js"])))=>i.map(i=>d[i]);
import{t as e}from"../assets/lazy-load-BIVtDcTT.js";import{t}from"../assets/preload-helper-BDd-SnbG.js";e(`.blockcart, #blockcart-wrapper, #blockcart-modal`,()=>t(()=>import(`../assets/cart-modal-C1E_2DFn.js`),__vite__mapDeps([0,1,2,3,4]),import.meta.url)),e(`.blockcart, #blockcart-wrapper, #blockcart-modal`,async()=>{let{initDrawerCrossSelling:e}=await t(async()=>{let{initDrawerCrossSelling:e}=await import(`../assets/drawer-tkWpXgDw.js`);return{initDrawerCrossSelling:e}},__vite__mapDeps([5,6,7,3,8,9,10,11,2,4]),import.meta.url);e()}),e(`#header, .header, #open-menu, #blockcart-wrapper, .language_selector, #phone-numbers, .smooth-scroll`,()=>t(()=>import(`../assets/header-By5nkkeM.js`),__vite__mapDeps([12,0,1,2,3,4]),import.meta.url)),e(`.swiper-carousel`,async()=>{let{default:e}=await t(async()=>{let{default:e}=await import(`../assets/carousel-CwDpB8Cz.js`).then(e=>e.t);return{default:e}},__vite__mapDeps([7,3,8,9,10,11]),import.meta.url);e()}),e(`.trustedby-logo-carousel`,async()=>{let{default:e}=await t(async()=>{let{default:e}=await import(`../assets/trustedby-logo-carousel-Dny6NQVU.js`);return{default:e}},__vite__mapDeps([13,10]),import.meta.url);e()}),e(`.footer-column-header, .newsletter-component`,()=>t(()=>import(`../assets/footer-BwncCAkG.js`),__vite__mapDeps([14,4]),import.meta.url)),e(`.discount-popup`,()=>t(()=>import(`../assets/discount-popup-DM7DMII9.js`),__vite__mapDeps([15,1]),import.meta.url)),e(`[id$="-g-recaptcha-response"], [id$="-g-recaptcha-action"], form[data-recaptcha], .g-recaptcha`,()=>t(()=>import(`../assets/recaptcha-Stf6prNV.js`),[],import.meta.url)),e(`.tooltip`,async()=>{let{default:e}=await t(async()=>{let{default:e}=await import(`../assets/tooltip-DBbyUPNz.js`);return{default:e}},[],import.meta.url);e()}),e(`body[data-titles]`,async()=>{let{default:e}=await t(async()=>{let{default:e}=await import(`../assets/dynamic-title-V9O3iWuS.js`);return{default:e}},[],import.meta.url);e()}),e(`.floating-carousel`,async()=>{let{initCarousels:e}=await t(async()=>{let{initCarousels:e}=await import(`../assets/floating-carousel-BkfMTQi9.js`);return{initCarousels:e}},__vite__mapDeps([16,7,3,8,9,10,11]),import.meta.url);e(document.querySelectorAll(`.floating-carousel`))}),e(`[data-global-back-to-top]`,async()=>{let{initScrollToTop:e}=await t(async()=>{let{initScrollToTop:e}=await import(`../assets/scrollToTop-C1U1zAzb.js`);return{initScrollToTop:e}},[],import.meta.url);e()});


/* Header Megamenu Dropdown Hover & Click Toggle Handler */
(function() {
    function initHeaderMegamenu() {
        function loadLazyImages(container) {
            var imgs = (container || document).querySelectorAll('.js-menu-lazy-image[data-src]');
            imgs.forEach(function(img) {
                var dataSrc = img.getAttribute('data-src');
                if (dataSrc && (!img.src || img.src.includes('data:'))) {
                    img.src = dataSrc;
                }
            });
        }

        // Load images on start
        loadLazyImages();

        // Toggle megamenus on hover / focus / click
        var wrappers = document.querySelectorAll('.menu-item-wrapper');
        wrappers.forEach(function(wrapper) {
            var submenu = wrapper.querySelector('.megamenu-childs-wrapper');
            var link = wrapper.querySelector('.nav-link');
            if (!submenu) return;

            function openMenu() {
                loadLazyImages(submenu);
                submenu.removeAttribute('hidden');
                wrapper.classList.add('open');
                if (link) link.setAttribute('aria-expanded', 'true');
            }

            function closeMenu() {
                submenu.setAttribute('hidden', '');
                wrapper.classList.remove('open');
                if (link) link.setAttribute('aria-expanded', 'false');
            }

            wrapper.addEventListener('mouseenter', openMenu);
            wrapper.addEventListener('mouseleave', closeMenu);

            if (link) {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        if (wrapper.classList.contains('open')) {
                            closeMenu();
                        } else {
                            wrappers.forEach(function(w) { 
                                w.classList.remove('open');
                                var sub = w.querySelector('.megamenu-childs-wrapper');
                                if (sub) sub.setAttribute('hidden', '');
                            });
                            openMenu();
                        }
                    }
                });
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeaderMegamenu);
    } else {
        initHeaderMegamenu();
    }
})();
