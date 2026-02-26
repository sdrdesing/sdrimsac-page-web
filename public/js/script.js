// Modular script.js for SDRIMSAC

// Social menu toggle
function toggleSocial() {
    const menu = document.getElementById("socialMenu");
    if (!menu) return;
    menu.classList.toggle("is-open");
}

// Cart counter update
function actualizarContadorCarrito() {
    fetch('api_carrito_count.php')
        .then(res => res.json())
        .then(data => {
            const badge = document.querySelector('.cart-count');
            if (badge) badge.textContent = data.count;
        });
}

// FAQ toggle (only on click)
function setupFAQToggle() {
    document.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            if (answer && answer.classList.contains('faq-answer')) {
                answer.classList.toggle('active');
            }
        });
    });
}

// Dropdown menu accessibility and toggle
function setupDropdownMenus() {
    const dropdownToggles = document.querySelectorAll('.dropdown > a');
    dropdownToggles.forEach(toggle => {
        toggle.setAttribute('role', 'button');
        toggle.setAttribute('aria-haspopup', 'true');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.addEventListener('click', function(e) {
            const parent = this.parentElement;
            const href = this.getAttribute('href') || '';
            let isSamePage = false;
            try {
                const url = new URL(href, window.location.href);
                isSamePage = (url.pathname === window.location.pathname && url.search === window.location.search && url.hash !== '');
            } catch (err) {
                isSamePage = (href === '#' || href === '' || href.startsWith('#'));
            }
            if (href === '#' || href === '' || href.startsWith('#') || isSamePage) {
                document.querySelectorAll('.dropdown.open').forEach(d => {
                    if (d !== parent) d.classList.remove('open');
                });
                parent.classList.toggle('open');
                const expanded = parent.classList.contains('open');
                this.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                e.preventDefault();
            } else {
                if (e.button === 0 && !e.ctrlKey && !e.metaKey && !e.shiftKey && !e.altKey) {
                    window.location.href = href;
                    e.preventDefault();
                }
            }
        });
    });
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.navbar')) {
            document.querySelectorAll('.dropdown.open').forEach(d => d.classList.remove('open'));
            document.querySelectorAll('.dropdown > a[aria-expanded]').forEach(a => a.setAttribute('aria-expanded', 'false'));
            document.querySelectorAll('.dropdown-sub.open').forEach(d => d.classList.remove('open'));
            document.querySelectorAll('.dropdown-sub > a[aria-expanded]').forEach(a => a.setAttribute('aria-expanded', 'false'));
        }
    });
}

// Submenu hover delay
function setupHoverDelay() {
    const HIDE_DELAY = 120;
    document.querySelectorAll('.dropdown').forEach(drop => {
        drop._leaveTimer = null;
        drop.addEventListener('mouseenter', function() {
            document.querySelectorAll('.dropdown.hover-open').forEach(d => {
                if (d !== this) d.classList.remove('hover-open');
            });
            if (this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            this.classList.add('hover-open');
        });
        drop.addEventListener('mouseleave', function() {
            const el = this;
            if (el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(() => {
                if (!el.matches(':hover') && !el.querySelector(':hover')) {
                    el.classList.remove('hover-open');
                    el._leaveTimer = null;
                }
            }, HIDE_DELAY);
        });
    });
    document.querySelectorAll('.dropdown-sub').forEach(drop => {
        drop._leaveTimer = null;
        drop.addEventListener('mouseenter', function() {
            if (this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            this.classList.add('hover-open');
        });
        drop.addEventListener('mouseleave', function() {
            const el = this;
            if (el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(() => {
                if (!el.matches(':hover') && !el.querySelector(':hover')) {
                    el.classList.remove('hover-open');
                    el._leaveTimer = null;
                }
            }, HIDE_DELAY);
        });
    });
    document.querySelectorAll('.sub-submenu').forEach(sub => {
        sub._leaveTimer = null;
        sub.addEventListener('mouseenter', function() {
            if (this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            const parent = this.closest('.dropdown-sub');
            if (parent) parent.classList.add('hover-open');
        });
        sub.addEventListener('mouseleave', function() {
            const el = this;
            const parent = el.closest('.dropdown-sub');
            if (el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(() => {
                if (parent) parent.classList.remove('hover-open');
                el._leaveTimer = null;
            }, HIDE_DELAY);
        });
    });
}

// Nested submenu toggle for touch devices
function setupNestedSubmenuToggle() {
    const nestedToggles = document.querySelectorAll('.dropdown-sub > a');
    nestedToggles.forEach(toggle => {
        toggle.setAttribute('role', 'button');
        toggle.setAttribute('aria-haspopup', 'true');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.addEventListener('click', function(e) {
            const parent = this.parentElement;
            const href = this.getAttribute('href') || '';
            if (href === '#' || href === '' || href.startsWith('#') || href.toLowerCase().includes('facturacion')) {
                document.querySelectorAll('.dropdown-sub.open').forEach(d => { if (d !== parent) d.classList.remove('open'); });
                parent.classList.toggle('open');
                const expanded = parent.classList.contains('open');
                this.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                e.preventDefault();
            } else {
                if (e.button === 0 && !e.ctrlKey && !e.metaKey && !e.shiftKey && !e.altKey) {
                    window.location.href = href;
                    e.preventDefault();
                }
            }
        });
    });
}

// Carousel logic
let multiCarouselIndex = 0;
function showMultiCarousel(index) {
    const container = document.querySelector('.carousel-multi-container');
    const track = document.querySelector('.carousel-multi-track');
    const slides = document.querySelectorAll('.carousel-multi-slide');
    if (!container || !track || slides.length === 0) return;
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    const slideW = slides[0].getBoundingClientRect().width;
    const step = slideW + gap;
    const leftPad = parseFloat(getComputedStyle(container).paddingLeft) || 0;
    const rightPad = parseFloat(getComputedStyle(container).paddingRight) || 0;
    const visibleW = container.getBoundingClientRect().width - leftPad - rightPad;
    const centerOffset = Math.max(0, (visibleW - slideW) / 2);
    multiCarouselIndex = index;
    const x = (multiCarouselIndex * step) - centerOffset;
    track.style.transform = `translateX(${-x}px)`;
}
window.moveMultiCarousel = function(delta) {
    const slides = document.querySelectorAll('.carousel-multi-slide');
    if (slides.length === 0) return;
    let next = multiCarouselIndex + delta;
    if (next < 0) next = slides.length - 1;
    if (next >= slides.length) next = 0;
    showMultiCarousel(next);
};

// Initialize all behaviors
document.addEventListener('DOMContentLoaded', function() {
    actualizarContadorCarrito();
    setupFAQToggle();
    setupDropdownMenus();
    setupHoverDelay();
    setupNestedSubmenuToggle();
    showMultiCarousel(0);
    setInterval(() => window.moveMultiCarousel(1), 5000);
    window.addEventListener('resize', () => showMultiCarousel(multiCarouselIndex));
    // Noti bell logic
    const notiBell = document.getElementById('notiBell');
    const notiPanel = document.getElementById('notiPanel');
    if (notiBell && notiPanel) {
        notiBell.addEventListener('click', function(e) {
            e.stopPropagation();
            notiPanel.style.display = (notiPanel.style.display === 'block') ? 'none' : 'block';
        });
        document.addEventListener('click', function(e) {
            if (notiPanel.style.display === 'block' && !notiBell.contains(e.target)) {
                notiPanel.style.display = 'none';
            }
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') notiPanel.style.display = 'none';
        });
        const ocultarBtn = document.getElementById('ocultarNotiBtn');
        if (ocultarBtn) {
            ocultarBtn.addEventListener('click', function() {
                fetch('ocultar_noti.php', { method: 'POST' }).then(() => {
                    notiPanel.style.display = 'none';
                    location.reload();
                });
            });
        }
    }
});