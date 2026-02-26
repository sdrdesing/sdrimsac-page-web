function toggleSocial(){
    let menu = document.getElementById("socialMenu");

    if(menu.style.display === "flex"){
        menu.style.display = "none";
    }else{
        menu.style.display = "flex";
    }
}

// Dropdown toggle for header menu (click / touch)
document.addEventListener('DOMContentLoaded', function(){
    // Notificación campanita: mostrar/ocultar panel
    var notiBell = document.getElementById('notiBell');
    var notiPanel = document.getElementById('notiPanel');
    if(notiBell && notiPanel){
        notiBell.addEventListener('click', function(e){
            e.stopPropagation();
            notiPanel.style.display = (notiPanel.style.display === 'block') ? 'none' : 'block';
        });
        // Cerrar al hacer clic fuera
        document.addEventListener('click', function(e){
            if(notiPanel.style.display === 'block' && !notiBell.contains(e.target)){
                notiPanel.style.display = 'none';
            }
        });
        // Accesibilidad: cerrar con Escape
        document.addEventListener('keydown', function(e){
            if(e.key === 'Escape') notiPanel.style.display = 'none';
        });
        // Botón para ocultar notificación (limpia la sesión)
        var ocultarBtn = document.getElementById('ocultarNotiBtn');
        if(ocultarBtn){
            ocultarBtn.addEventListener('click', function(){
                fetch('ocultar_noti.php', {method:'POST'}).then(()=>{
                    notiPanel.style.display = 'none';
                    location.reload();
                });
            });
        }
    }
    const dropdownToggles = document.querySelectorAll('.dropdown > a');

    dropdownToggles.forEach(toggle => {
        // make keyboard accessible
        toggle.setAttribute('role','button');
        toggle.setAttribute('aria-haspopup','true');
        toggle.setAttribute('aria-expanded','false');

        toggle.addEventListener('click', function(e){
                const parent = this.parentElement;
                const href = this.getAttribute('href') || '';
                // Determine if the link actually targets a different page.
                let isSamePage = false;
                try {
                    const url = new URL(href, window.location.href);
                    isSamePage = (url.pathname === window.location.pathname && url.search === window.location.search && url.hash !== '');
                } catch(err){
                    // if URL parsing fails (relative hash or '#'), treat as same page
                    isSamePage = (href === '#' || href === '' || href.startsWith('#'));
                }

                // If href is '#' or a same-page anchor, toggle the submenu instead of navigating.
                if(href === '#' || href === '' || href.startsWith('#') || isSamePage){
                    // Close other open dropdowns
                    document.querySelectorAll('.dropdown.open').forEach(d => {
                        if(d !== parent) d.classList.remove('open');
                    });

                    parent.classList.toggle('open');
                    const expanded = parent.classList.contains('open');
                    this.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                    e.preventDefault();
                } else {
                    // The link points to another page. Some environments may still prevent default
                    // (e.g., other scripts). For a robust experience, explicitly navigate on a
                    // normal left-click without modifier keys.
                    if(e.button === 0 && !e.ctrlKey && !e.metaKey && !e.shiftKey && !e.altKey){
                        // Allow the browser to handle absolute/relative hrefs correctly
                        window.location.href = href;
                        e.preventDefault();
                    }
                    // If user used Ctrl/Cmd click or middle-click, do nothing so the browser opens in a new tab/window.
                }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e){
        if(!e.target.closest('.navbar')){
            document.querySelectorAll('.dropdown.open').forEach(d => d.classList.remove('open'));
            document.querySelectorAll('.dropdown > a[aria-expanded]')
                .forEach(a => a.setAttribute('aria-expanded','false'));
            document.querySelectorAll('.dropdown-sub.open').forEach(d => d.classList.remove('open'));
            document.querySelectorAll('.dropdown-sub > a[aria-expanded]')
                .forEach(a => a.setAttribute('aria-expanded','false'));
        }
    });

    // =============================
// CARRUSEL (SE AGREGA SIN CAMBIAR TU CÓDIGO)
// =============================
// CARRUSEL PRO (cards con peek)
// =============================
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

  // centra la tarjeta activa para que se vea “peek” en ambos lados
  const centerOffset = Math.max(0, (visibleW - slideW) / 2);

  multiCarouselIndex = index;

  const x = (multiCarouselIndex * step) - centerOffset;
  track.style.transform = `translateX(${-x}px)`;
}

// Para que onclick del HTML funcione
window.moveMultiCarousel = function(delta){
  const slides = document.querySelectorAll('.carousel-multi-slide');
  if (slides.length === 0) return;

  let next = multiCarouselIndex + delta;
  if (next < 0) next = slides.length - 1;
  if (next >= slides.length) next = 0;

  showMultiCarousel(next);
};

// iniciar
showMultiCarousel(0);
setInterval(() => window.moveMultiCarousel(1), 5000);

// recalcular al redimensionar
window.addEventListener('resize', () => showMultiCarousel(multiCarouselIndex));

    // Hover delay: keep submenu visible for a short time after mouse leaves so user
    // can move the cursor to nested items without it disappearing immediately.
    const HIDE_DELAY = 350; // ms

    document.querySelectorAll('.dropdown').forEach(drop => {
        drop._leaveTimer = null;
        drop.addEventListener('mouseenter', function(){
            if(this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            this.classList.add('hover-open');
        });
        drop.addEventListener('mouseleave', function(){
            const el = this;
            if(el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(()=>{ el.classList.remove('hover-open'); el._leaveTimer = null; }, HIDE_DELAY);
        });
    });

    // Apply the same behavior to nested dropdown-sub elements (for the sub-submenu)
    document.querySelectorAll('.dropdown-sub').forEach(drop => {
        drop._leaveTimer = null;
        drop.addEventListener('mouseenter', function(){
            if(this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            this.classList.add('hover-open');
        });
        drop.addEventListener('mouseleave', function(){
            const el = this;
            if(el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(()=>{ el.classList.remove('hover-open'); el._leaveTimer = null; }, HIDE_DELAY);
        });
    });

    // Also keep sub-submenu visible while the mouse is over it (prevent gaps)
    document.querySelectorAll('.sub-submenu').forEach(sub => {
        sub._leaveTimer = null;
        sub.addEventListener('mouseenter', function(){
            if(this._leaveTimer) { clearTimeout(this._leaveTimer); this._leaveTimer = null; }
            // ensure parent stays open while cursor over sub-submenu
            const parent = this.closest('.dropdown-sub');
            if(parent) parent.classList.add('hover-open');
        });
        sub.addEventListener('mouseleave', function(){
            const el = this;
            const parent = el.closest('.dropdown-sub');
            if(el._leaveTimer) clearTimeout(el._leaveTimer);
            el._leaveTimer = setTimeout(()=>{
                if(parent) parent.classList.remove('hover-open');
                el._leaveTimer = null;
            }, HIDE_DELAY);
        });
    });

    // Toggle nested Facturación submenu on click (useful for touch devices)
    const nestedToggles = document.querySelectorAll('.dropdown-sub > a');
    nestedToggles.forEach(toggle => {
        toggle.setAttribute('role','button');
        toggle.setAttribute('aria-haspopup','true');
        toggle.setAttribute('aria-expanded','false');

        toggle.addEventListener('click', function(e){
            const parent = this.parentElement;
            const href = this.getAttribute('href') || '';

            // If it's an in-page anchor or hash, toggle submenu instead of navigating
            if(href === '#' || href === '' || href.startsWith('#') || href.toLowerCase().includes('facturacion')){
                // close other nested opens
                document.querySelectorAll('.dropdown-sub.open').forEach(d => { if(d !== parent) d.classList.remove('open'); });
                parent.classList.toggle('open');
                const expanded = parent.classList.contains('open');
                this.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                e.preventDefault();
            } else {
                // navigate normally
                if(e.button === 0 && !e.ctrlKey && !e.metaKey && !e.shiftKey && !e.altKey){
                    window.location.href = href;
                    e.preventDefault();
                }
            }
        });
    });
});