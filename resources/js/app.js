import './bootstrap';

(function () {
    'use strict';

    /* ---------------- Google Translate: protect proper nouns ---------------- */
    const protectedPhrases = [
        'Philadelphia Full Gospel Assembly',
        'Philadelphia Gospel Assembly',
        'Philadelphia Bible College',
        'Arch Bishop Prof. Yohana Simon Masinga',
        'Arch Bishop Prof. Yohana Masinga',
        'Prof. Yohana Simon Masinga',
        'Prof. Yohana Masinga',
        'Yohana Simon Masinga',
        'Pastor Grace Masinga',
        'Yohana Masinga',
        'Grace Masinga',
        'Philadelphia',
        'RQV2+7QX',
    ].sort((a, b) => b.length - a.length);

    const escapeRegExp = (value) => value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');

    const protectPhrasePattern = new RegExp(
        '(' + protectedPhrases.map(escapeRegExp).join('|') + ')',
        'g'
    );

    const isProtectedNode = (node) => {
        let el = node.parentElement;
        while (el) {
            const tag = el.tagName;
            if (
                tag === 'SCRIPT' ||
                tag === 'STYLE' ||
                tag === 'NOSCRIPT' ||
                tag === 'TEXTAREA' ||
                tag === 'SELECT' ||
                tag === 'OPTION' ||
                tag === 'SVG'
            ) {
                return true;
            }
            if (
                (el.classList && el.classList.contains('notranslate')) ||
                el.id === 'google_translate_element'
            ) {
                return true;
            }
            el = el.parentElement;
        }
        return false;
    };

    const protectProperNouns = () => {
        if (!document.body) return;
        const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT);
        const textNodes = [];
        while (walker.nextNode()) textNodes.push(walker.currentNode);

        textNodes.forEach((node) => {
            const text = node.nodeValue;
            if (!text || !protectPhrasePattern.test(text) || isProtectedNode(node)) return;

            protectPhrasePattern.lastIndex = 0;
            const fragment = document.createDocumentFragment();
            let lastIndex = 0;
            let match;
            while ((match = protectPhrasePattern.exec(text)) !== null) {
                if (match.index > lastIndex) {
                    fragment.appendChild(document.createTextNode(text.slice(lastIndex, match.index)));
                }
                const span = document.createElement('span');
                span.className = 'notranslate';
                span.setAttribute('translate', 'no');
                span.textContent = match[0];
                fragment.appendChild(span);
                lastIndex = match.index + match[0].length;
            }
            if (lastIndex < text.length) {
                fragment.appendChild(document.createTextNode(text.slice(lastIndex)));
            }
            node.parentNode.replaceChild(fragment, node);
        });
    };

    /* ---------------- Google Translate: remove injected banner/popups ---------------- */
    const cleanupTranslateChrome = () => {
        if (!document.body) return;
        document.documentElement.style.setProperty('margin-top', '0px', 'important');
        document.body.style.setProperty('top', '0px', 'important');
        document.body.style.setProperty('position', 'static', 'important');
        document.body.classList.remove('translated-ltr', 'translated-rtl');
        document
            .querySelectorAll(
                '.goog-te-banner-frame, iframe.skiptranslate, #goog-gt-tt, .goog-te-balloon-frame'
            )
            .forEach((el) => {
                el.style.setProperty('display', 'none', 'important');
                el.style.setProperty('visibility', 'hidden', 'important');
            });
    };

    const init = () => {
        protectProperNouns();
        cleanupTranslateChrome();
        window.addEventListener('load', cleanupTranslateChrome);
        if ('MutationObserver' in window) {
            new MutationObserver(cleanupTranslateChrome).observe(document.documentElement, {
                childList: true,
                subtree: true,
            });
        }

        /* ---------------- Sidebar (off-canvas premium nav) ---------------- */
        const sidebar = document.getElementById('site-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openers = document.querySelectorAll('[data-sidebar-open]');
        const closers = document.querySelectorAll('[data-sidebar-close]');

        const setSidebar = (open) => {
            if (!sidebar || !overlay) return;
            sidebar.classList.toggle('is-open', open);
            overlay.classList.toggle('is-open', open);
            sidebar.setAttribute('aria-hidden', open ? 'false' : 'true');
            document.body.style.overflow = open ? 'hidden' : '';
            openers.forEach((btn) => btn.setAttribute('aria-expanded', open ? 'true' : 'false'));
            if (open) {
                const first = sidebar.querySelector('a, button');
                if (first) window.setTimeout(() => first.focus(), 320);
            }
        };

        openers.forEach((btn) =>
            btn.addEventListener('click', () => {
                const isOpen = sidebar && sidebar.classList.contains('is-open');
                setSidebar(!isOpen);
            })
        );
        closers.forEach((btn) => btn.addEventListener('click', () => setSidebar(false)));
        overlay?.addEventListener('click', () => setSidebar(false));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && sidebar && sidebar.classList.contains('is-open')) {
                setSidebar(false);
            }
        });

        sidebar?.querySelectorAll('a').forEach((link) =>
            link.addEventListener('click', () => setSidebar(false))
        );

        /* ---------------- Admin sidebar (off-canvas) ---------------- */
        const adminSidebar = document.getElementById('admin-sidebar');
        const adminOverlay = document.getElementById('admin-overlay');

        const setAdminSidebar = (open) => {
            if (!adminSidebar) return;
            adminSidebar.classList.toggle('is-open', open);
            adminOverlay?.classList.toggle('is-open', open);
            adminSidebar.setAttribute('aria-hidden', open ? 'false' : 'true');
            document.body.style.overflow = open ? 'hidden' : '';
        };

        document.querySelectorAll('[data-admin-sidebar-open]').forEach((btn) =>
            btn.addEventListener('click', () => setAdminSidebar(true))
        );
        document.querySelectorAll('[data-admin-sidebar-close]').forEach((btn) =>
            btn.addEventListener('click', () => setAdminSidebar(false))
        );
        adminOverlay?.addEventListener('click', () => setAdminSidebar(false));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && adminSidebar?.classList.contains('is-open')) {
                setAdminSidebar(false);
            }
        });

        /* ---------------- Sticky header state ---------------- */
        const header = document.getElementById('site-header');
        const onScroll = () => {
            if (!header) return;
            header.classList.toggle('is-scrolled', window.scrollY > 24);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        /* ---------------- Scroll reveal ---------------- */
        const revealEls = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window && revealEls.length) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
            );
            revealEls.forEach((el) => observer.observe(el));
        } else {
            revealEls.forEach((el) => el.classList.add('is-visible'));
        }

        /* ---------------- Animated count-up for stats ---------------- */
        const counters = document.querySelectorAll('[data-count]');
        if ('IntersectionObserver' in window && counters.length) {
            const cObserver = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        const el = entry.target;
                        const target = parseInt(el.dataset.count, 10) || 0;
                        const suffix = el.dataset.suffix || '';
                        const duration = 1400;
                        const start = performance.now();
                        const step = (now) => {
                            const progress = Math.min((now - start) / duration, 1);
                            const eased = 1 - Math.pow(1 - progress, 3);
                            el.textContent = Math.round(eased * target) + suffix;
                            if (progress < 1) requestAnimationFrame(step);
                        };
                        requestAnimationFrame(step);
                        obs.unobserve(el);
                    });
                },
                { threshold: 0.5 }
            );
            counters.forEach((el) => cObserver.observe(el));
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
