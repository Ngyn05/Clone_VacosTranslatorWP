/* Header Megamenu Dropdown Hover & Click Toggle Handler */
(function() {
    function initHeaderMegamenu() {
        function loadLazyImages(container) {
            var imgs = (container || document).querySelectorAll('.js-menu-lazy-image[data-src], img[data-src]');
            imgs.forEach(function(img) {
                var dataSrc = img.getAttribute('data-src');
                if (dataSrc && (!img.src || img.src.includes('data:'))) {
                    img.src = dataSrc;
                }
            });
        }

        loadLazyImages();

        var wrappers = document.querySelectorAll('.menu-item-wrapper');
        wrappers.forEach(function(wrapper) {
            var submenu = wrapper.querySelector('.megamenu-childs-wrapper');
            var link = wrapper.querySelector('.nav-link');
            if (!submenu) return;

            var closeTimer = null;

            function openMenu() {
                if (closeTimer) {
                    clearTimeout(closeTimer);
                    closeTimer = null;
                }
                loadLazyImages(submenu);
                submenu.removeAttribute('hidden');
                submenu.style.setProperty('display', 'block', 'important');
                submenu.style.setProperty('visibility', 'visible', 'important');
                submenu.style.setProperty('opacity', '1', 'important');
                wrapper.classList.add('open', 'is-open');
                if (link) link.setAttribute('aria-expanded', 'true');
            }

            function scheduleClose() {
                if (closeTimer) clearTimeout(closeTimer);
                closeTimer = setTimeout(function() {
                    submenu.setAttribute('hidden', '');
                    submenu.style.setProperty('display', 'none', 'important');
                    wrapper.classList.remove('open', 'is-open');
                    if (link) link.setAttribute('aria-expanded', 'false');
                }, 300); // 300ms grace period so mouse moves smoothly across megamenu
            }

            // ── Desktop Hover Handlers with 300ms Grace Period ──
            wrapper.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 992) openMenu();
            });
            wrapper.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 992) scheduleClose();
            });
            submenu.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 992) openMenu();
            });
            submenu.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 992) scheduleClose();
            });

            // ── Mobile Accordion Toggle Handlers ──
            if (link) {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        var href = link.getAttribute('href');
                        // 1. Cửa Hàng (Shop) -> Mở trực tiếp trang Cửa hàng
                        if (link.id === 'nav-title-shop' || (href && href.indexOf('/translators/') !== -1)) {
                            if (href && href !== '#' && !href.startsWith('javascript:')) {
                                window.location.href = href;
                            }
                            return;
                        }

                        // 2. Các mục khác -> Toggle Accordion
                        e.preventDefault();
                        e.stopPropagation();

                        var isOpen = wrapper.classList.contains('open') || wrapper.classList.contains('is-open');

                        if (isOpen) {
                            if (closeTimer) clearTimeout(closeTimer);
                            submenu.setAttribute('hidden', '');
                            submenu.style.setProperty('display', 'none', 'important');
                            wrapper.classList.remove('open', 'is-open');
                            if (link) link.setAttribute('aria-expanded', 'false');
                        } else {
                            wrappers.forEach(function(w) { 
                                w.classList.remove('open', 'is-open');
                                var sub = w.querySelector('.megamenu-childs-wrapper');
                                var lk = w.querySelector('.nav-link');
                                if (sub) {
                                    sub.setAttribute('hidden', '');
                                    sub.style.setProperty('display', 'none', 'important');
                                }
                                if (lk) lk.setAttribute('aria-expanded', 'false');
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
