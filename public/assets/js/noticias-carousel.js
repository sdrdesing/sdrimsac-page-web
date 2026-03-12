const track = document.querySelector('.noticias-track');
const slides = document.querySelectorAll('.noticia-slide');
const prevBtn = document.querySelector('.noticias-prev');
const nextBtn = document.querySelector('.noticias-next');

let currentIndex = 0;
const visibleSlides = 3;
let autoSlideInterval = null;

function updateCarousel() {
    if (!track || slides.length === 0 || !prevBtn || !nextBtn) return;

    const slideWidth = slides[0].offsetWidth + 32;
    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

    prevBtn.style.display = currentIndex === 0 ? 'none' : 'block';
    nextBtn.style.display = currentIndex >= slides.length - visibleSlides ? 'none' : 'block';
}

if (track && slides.length > 0 && prevBtn && nextBtn) {
    autoSlideInterval = setInterval(() => {
        if (currentIndex < slides.length - visibleSlides) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    }, 4000);

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
            clearInterval(autoSlideInterval);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < slides.length - visibleSlides) {
            currentIndex++;
            updateCarousel();
            clearInterval(autoSlideInterval);
        }
    });

    window.addEventListener('resize', updateCarousel);
    document.addEventListener('DOMContentLoaded', updateCarousel);
}

function setupComentarScroll() {
    const comentarBtns = document.querySelectorAll('.noticia-slide .comentar-btn');

    comentarBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const slide = btn.closest('.noticia-slide');
            const titulo = slide && slide.querySelector('h3') ? slide.querySelector('h3').textContent : '';
            const resumen = slide && slide.querySelector('p') ? slide.querySelector('p').textContent : '';
            const noticiaId = btn.getAttribute('data-id');

            const noticiaBox = document.getElementById('comentarioNoticiaBox');
            if (noticiaBox) {
                noticiaBox.innerHTML = `<strong>${titulo}</strong><br><span style="font-size:1.05em;opacity:.8;">${resumen}</span>`;
            }

            const noticiaIdInput = document.querySelector('#comentarioForm input[name="noticia_id"]');
            if (noticiaIdInput) {
                noticiaIdInput.value = noticiaId || '';
            }

            const comentariosSection = document.getElementById('comentarios');
            if (comentariosSection) {
                comentariosSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', setupComentarScroll);