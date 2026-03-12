document.addEventListener('DOMContentLoaded', function () {
    const botonesRubros = document.querySelectorAll('.rubro-btn');
    const carruselTodos = document.getElementById('carruselTodos');
    const carruselRubros = document.getElementById('carruselRubros');
    const gridRubros = document.querySelector('#carruselRubros .empresas-grid-rubros');
    const cardsRubros = document.querySelectorAll('#carruselRubros .empresa-card');

    if (!botonesRubros.length || !carruselTodos || !carruselRubros || !gridRubros) return;

    function limpiarClones() {
        gridRubros.querySelectorAll('.clone-card').forEach(el => el.remove());
    }

    function resetRubros() {
        carruselRubros.classList.remove('modo-centrado');

        gridRubros.style.display = 'flex';
        gridRubros.style.flexWrap = 'nowrap';
        gridRubros.style.alignItems = 'center';
        gridRubros.style.justifyContent = 'flex-start';
        gridRubros.style.width = 'max-content';
        gridRubros.style.margin = '0';
        gridRubros.style.animation = 'moverRubros 28s linear infinite';
        gridRubros.style.transform = 'translateX(0)';
    }

    function mostrarRubro(rubro) {
        botonesRubros.forEach(btn => {
            btn.classList.remove('activo', 'active');
            if (btn.dataset.rubro === rubro) {
                btn.classList.add('activo', 'active');
            }
        });

        limpiarClones();
        resetRubros();

        if (rubro === 'todos') {
            carruselTodos.style.display = 'block';
            carruselRubros.style.display = 'none';

            cardsRubros.forEach(card => {
                card.style.display = 'none';
            });
            return;
        }

        carruselTodos.style.display = 'none';
        carruselRubros.style.display = 'block';

        const visibles = [];

        cardsRubros.forEach(card => {
            if (card.dataset.rubro === rubro) {
                card.style.display = 'flex';
                visibles.push(card);
            } else {
                card.style.display = 'none';
            }
        });

        if (visibles.length <= 5) {
            carruselRubros.classList.add('modo-centrado');
        } else {
            visibles.forEach(card => {
                const clone = card.cloneNode(true);
                clone.classList.add('clone-card');
                clone.style.display = 'flex';
                gridRubros.appendChild(clone);
            });
        }
    }

    botonesRubros.forEach(boton => {
        boton.addEventListener('click', function (e) {
            e.preventDefault();
            mostrarRubro(this.dataset.rubro);
        });
    });

    mostrarRubro('todos');
});