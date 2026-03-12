<link rel="stylesheet" href="assets/css/carrusel_empresas.css">

<div class="container mt-5 empresas-seccion">
  <h2 class="empresas-titulo">Empresas que confían en nosotros</h2>

  <div class="empresas-rubros">
    <button type="button" class="rubro-btn activo" data-rubro="todos">Todos</button>
    <button type="button" class="rubro-btn" data-rubro="hoteles">Hoteles - Créditos</button>
    <button type="button" class="rubro-btn" data-rubro="cafeterias">Cafeterías - Pizzería</button>
    <button type="button" class="rubro-btn" data-rubro="ferreterias">Ferreterías</button>
    <button type="button" class="rubro-btn" data-rubro="farmacias">Salud</button>
    <button type="button" class="rubro-btn" data-rubro="restaurante">Restaurante</button>
    <button type="button" class="rubro-btn" data-rubro="restobar">Restobar</button>
    <button type="button" class="rubro-btn" data-rubro="mecanica-repuestos">Mecánica y Repuestos</button>
    <button type="button" class="rubro-btn" data-rubro="centro-comercial">Centro Comercial</button>
    <button type="button" class="rubro-btn" data-rubro="ropas-calzados">Ropas y Calzados</button>
    <button type="button" class="rubro-btn" data-rubro="otros">Otros</button>
  </div>



  <script>
document.addEventListener('DOMContentLoaded', function () {
    const botonesRubros = document.querySelectorAll('.rubro-btn');
    const carruselTodos = document.getElementById('carruselTodos');
    const carruselRubros = document.getElementById('carruselRubros');
    const gridRubros = document.querySelector('#carruselRubros .empresas-grid-rubros');
    const cardsRubros = document.querySelectorAll('#carruselRubros .empresa-card');

    if (!botonesRubros.length || !carruselTodos || !carruselRubros || !gridRubros) {
        console.log('No se encontraron elementos del carrusel');
        return;
    }

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
</script>


  <!-- TODOS: 2 FILAS -->
  <div id="carruselTodos" class="empresas-carrusel-todos">
    <div class="logos-slider fila-derecha">
      <div class="logos-track">
        <div class="empresa-card"><img src="assets/img/3.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/4.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/5.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/6.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/7.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/8.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/9.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/10.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/11.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/12.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/13.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/15.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/18.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/22.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/33.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/35.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/37.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/38.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/39.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/40.png" alt="" class="empresa-logo"></div>

        <div class="empresa-card"><img src="assets/img/3.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/4.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/5.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/6.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/7.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/8.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/9.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/10.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/11.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/12.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/13.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/15.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/18.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/22.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/33.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/35.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/37.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/38.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/39.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/40.png" alt="" class="empresa-logo"></div>
      </div>
    </div>

    <div class="logos-slider fila-izquierda">
      <div class="logos-track">
        <div class="empresa-card"><img src="assets/img/41.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/42.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/43.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/44.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/aquadiel CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Cuadrado IT.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Doble Filo CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/DIVLAB CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Distribuidora Lopez CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Don Bosco Cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/GLACIEL CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Kronos CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Isaac Ferreteria CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Sota Cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/ALIZZE CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Carhuancho CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/logo san fernando cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/salomon CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Nicusi CUADRADO.png" alt="" class="empresa-logo"></div>

        <div class="empresa-card"><img src="assets/img/41.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/42.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/43.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/44.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/aquadiel CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Cuadrado IT.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Doble Filo CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/DIVLAB CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Distribuidora Lopez CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Don Bosco Cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/GLACIEL CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Kronos CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Isaac Ferreteria CUADRADO.jpg" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Sota Cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/ALIZZE CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Carhuancho CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/logo san fernando cuadrado.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/salomon CUADRADO.png" alt="" class="empresa-logo"></div>
        <div class="empresa-card"><img src="assets/img/Nicusi CUADRADO.png" alt="" class="empresa-logo"></div>
      </div>
    </div>
  </div>

  <!-- RUBROS -->
  <div id="carruselRubros" class="empresas-carrusel-rubros" style="display:none;">
    <div class="empresas-grid-rubros">
      <div class="empresa-card" data-rubro="hoteles"><img src="assets/img/8.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="hoteles"><img src="assets/img/40.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="hoteles"><img src="assets/img/36.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="hoteles"><img src="assets/img/Confort cuadrado.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="cafeterias"><img src="assets/img/bLUES BAR CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="cafeterias"><img src="assets/img/43.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="cafeterias"><img src="assets/img/15.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="cafeterias"><img src="assets/img/45.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="cafeterias"><img src="assets/img/real cafe CUADRADO.jpg" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="ferreterias"><img src="assets/img/5.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ferreterias"><img src="assets/img/10.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ferreterias"><img src="assets/img/15.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ferreterias"><img src="assets/img/Isaac Ferreteria CUADRADO.jpg" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ferreterias"><img src="assets/img/Sota Cuadrado.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/CUADRADO red pki.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/48.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/49.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/FarmaLIZCUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/WHATSAPCUADRADOFarmasol.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="farmacias"><img src="assets/img/GruposCuadrado500x500farma.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/28.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/5.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/11.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/26.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/CUADRADO La Taberna.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/La Isla Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restaurante"><img src="assets/img/43.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/Royal BBt1 Logo Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/19.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/24.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/34.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/42.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="restobar"><img src="assets/img/Diol CUADRADO.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="mecanica-repuestos"><img src="assets/img/12.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="mecanica-repuestos"><img src="assets/img/Alineamiento Denis CUADRADO.jpg" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="mecanica-repuestos"><img src="assets/img/el hermano CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="mecanica-repuestos"><img src="assets/img/9.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="mecanica-repuestos"><img src="assets/img/41.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/13.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/25.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/26.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/29.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/47.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/ALIZZE CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/Carhuancho CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/logo san fernando cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/salomon CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/Nicusi CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="centro-comercial"><img src="assets/img/WHATSAP CUADRADO Yolita.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="ropas-calzados"><img src="assets/img/Nayrut Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ropas-calzados"><img src="assets/img/Moda Fashion CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ropas-calzados"><img src="assets/img/4.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ropas-calzados"><img src="assets/img/Logo Cuadrado Stalyn depor.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="ropas-calzados"><img src="assets/img/Logo Cuadrado TD Stalyn.png" class="empresa-logo" alt=""></div>

      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Villa Corp Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Sota Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/MUNDO DE LOS CELULARES CUADRADO.jpg" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Mundo Agricola Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/WHATSAP CUADRADO Grifo BellaVista.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/oro verde CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/CUADRADO Agro Romero.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/6.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/7.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/12.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/10.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/18.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/22.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/33.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/35.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/37.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/38.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/39.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/44.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/aquadiel CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Cuadrado IT.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Doble Filo CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/DIVLAB CUADRADO.jpg" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Distribuidora Lopez CUADRADO.jpg" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Don Bosco Cuadrado.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/GLACIEL CUADRADO.png" class="empresa-logo" alt=""></div>
      <div class="empresa-card" data-rubro="otros"><img src="assets/img/Kronos CUADRADO.png" class="empresa-logo" alt=""></div>
    </div>
  </div>
</div>