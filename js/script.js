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

    // If page was opened with a hash related to facturación, open that submenu
    try {
        const h = window.location.hash || '';
        if(h.toLowerCase().includes('facturacion')){
            const parent = document.querySelector('.dropdown-sub');
            if(parent){
                parent.classList.add('open');
                const anchor = parent.querySelector('a');
                if(anchor) anchor.setAttribute('aria-expanded','true');
            }
        }
    } catch(err){ /* ignore */ }

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