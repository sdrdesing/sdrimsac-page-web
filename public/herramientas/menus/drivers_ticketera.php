<style>
/* Modal Xprinter */
#modalXprinter {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
}
#modalXprinter.active, #modalXprinter[style*="display: flex"] {
    display: flex !important;
    justify-content: center;
    align-items: center;
}
</style>
<script>
function openXprinterModal() {
    document.getElementById('modalXprinter').style.display = 'flex';
}
function closeXprinterModal() {
    document.getElementById('modalXprinter').style.display = 'none';
}
window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeXprinterModal();
    }
});
window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalXprinter');
    if (e.target === modal) {
        closeXprinterModal();
    }
});
// Evita el parpadeo solo en el botón SELECCIONAR de POS DRIVER BIENEX
document.addEventListener('DOMContentLoaded', function() {
    var btnBienex = document.getElementById('btnBienex');
    if (btnBienex) {
        btnBienex.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('modalBienex').style.display = 'flex';
        });
    }
});
</script>
<style>
.drivers-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin: 32px auto 0 auto;
    max-width: 900px;
    justify-content: center;
}
@media (max-width: 1000px) {
    .drivers-grid {
        grid-template-columns: repeat(2, 1fr);
        max-width: 600px;
    }
}
@media (max-width: 700px) {
    .drivers-grid {
        grid-template-columns: 1fr;
        max-width: 320px;
    }
}
.herramientas-card {
    background: #fff;
    border-radius: 18px;
    border: 3px solid #18126d;
    box-shadow: 0 2px 12px rgba(24,18,109,0.08);
    padding: 22px 10px 16px 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: box-shadow 0.2s;
    min-height: 300px;
    max-width: 270px;
    margin: 0 auto;
}
.herramientas-card:hover {
    box-shadow: 0 4px 24px rgba(24,18,109,0.18);
    border-color: #3a2fff;
}
.herramientas-card h3 {
    color: #18126d;
    font-size: 1.05rem;
    margin-bottom: 8px;
    font-weight: 700;
    text-align: center;
    min-height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.herramientas-card p {
    font-size: 0.93rem;
    color: #222;
    margin-bottom: 12px;
    text-align: center;
    min-height: 48px;
    max-height: 3.5em;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.herramientas-card img {
    width: 160px;
    height: 90px;
    object-fit: contain;
    margin-bottom: 18px;
    border-radius: 12px;
    background: #f4f7ff;
    box-shadow: 0 2px 8px rgba(24,18,109,0.07);
    padding: 8px;
}
.herramientas-card .btns-row {
    display: flex;
    gap: 8px;
    margin-top: auto;
}
.btn-herramienta {
    background: #18126d;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 7px 13px;
    font-size: 0.93rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    text-decoration: none;
    display: inline-block;
}
.btn-herramienta:hover {
    background: #3a2fff;
}

/* Modal Advance */
#modalAdvance {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
}
#modalAdvance.active {
    display: flex;
}
.modal-content-advance {
    background: #fff;
    border-radius: 18px;
    padding: 32px 32px 24px 32px;
    min-width: 420px;
    max-width: 95vw;
    box-shadow: 0 4px 32px rgba(24,18,109,0.18);
    position: relative;
    text-align: center;
}
.modal-content-advance h2 {
    color: #18126d;
    font-size: 1.35rem;
    margin-bottom: 24px;
    font-weight: 700;
}
.advance-models-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
}
.advance-model-card {
    background: #f6f8ff;
    border-radius: 12px 12px 24px 24px;
    border: 3px solid #3a2fff;
    padding: 18px 0 12px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 2px 8px rgba(24,18,109,0.08);
    position: relative;
}
.advance-model-card:before {
    content: '';
    display: block;
    width: 100%;
    height: 24px;
    background: url('assets/img/ice-drip.png') no-repeat center/cover;
    border-radius: 12px 12px 0 0;
    position: absolute;
    top: 0; left: 0;
}
.advance-model-card span {
    margin-top: 18px;
    font-weight: 700;
    color: #18126d;
    font-size: 1.1rem;
    margin-bottom: 10px;
    z-index: 1;
}
.advance-model-card .btn-herramienta {
    margin-top: 8px;
    z-index: 1;
}
.close-modal-advance {
    position: absolute;
    top: 12px;
    right: 18px;
    font-size: 1.5rem;
    color: #18126d;
    background: none;
    border: none;
    cursor: pointer;
    font-weight: bold;
}
</style>

<div class="drivers-grid">
    <div class="herramientas-card">
        <h3>POS DRIVER CBX</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca CBX, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/03/imagen_2025-03-03_114035992-e1741020060471-768x339.png" alt="CBX">
        <div class="btns-row">
            <a href="herramientas/driver/HPRT-POS-Printer-Driver-v2.7.4.3-1 (4).zip" class="btn-herramienta" download>DESCARGAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER ADVANCE</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca ADVANCE, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_8_-768x339.webp" alt="Advance">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" onclick="document.getElementById('modalAdvance').classList.add('active'); return false;">SELECCIONAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER BIXOLON</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca BIXOLON, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_9_-768x339.webp" alt="Bixolon">
        <div class="btns-row">
            <a href="herramientas/driver/BIXOLON.zip" class="btn-herramienta" download>DESCARGAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER VILLACORP</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca VILLACORP, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="/assets/img/store.png" alt="Villacorp">
        <div class="btns-row">
                  <a href="#" class="btn-herramienta" onclick="document.getElementById('modalVillacorp').style.display = 'flex'; return false;">SELECCIONAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER 3NSTAR</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca 3NSTART, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/05/Diseno-sin-titulo-_19_-768x339.webp" alt="3nStar">
        <div class="btns-row">
                  <a href="#" class="btn-herramienta" onclick="document.getElementById('modal3nstar').style.display = 'flex'; return false;">SELECCIONAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER EPSON</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca EPSON, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/05/Diseno-sin-titulo-_20_-768x339.webp" alt="Epson">
        <div class="btns-row">
                  <a href="#" class="btn-herramienta" onclick="document.getElementById('modalEpson').style.display = 'flex'; return false;">SELECCIONAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER XPRINTER</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca XPRINTER, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/05/Diseno-sin-titulo-_21_-768x339.webp" alt="Xprinter">
        <div class="btns-row">
                  <a href="#" class="btn-herramienta" onclick="document.getElementById('modalXprinter').style.display = 'flex'; return false;">SELECCIONAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER ELITRONIC</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca ELITRONIC, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/05/Diseno-sin-titulo-_22_-768x339.webp" alt="Elitronic">
        <div class="btns-row">
                         <a href="#" class="btn-herramienta" id="btnElitronic">SELECCIONAR</a>

        </div>
    
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER BIENEX</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca BIENEX, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/06/Diseno-sin-titulo-_23_-768x339.webp" alt="Bienex">
        <div class="btns-row">
              <a href="#" class="btn-herramienta" id="btnBienexNuevo">SELECCIONAR</a>
        </div>
        
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER STAR</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca STAR, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/09/Diseno-sin-titulo-_2_-768x339.webp" alt="Star">
        <div class="btns-row">
              <a href="#" class="btn-herramienta" id="btnStar">SELECCIONAR</a>
        </div>
     
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER LOGIC</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca logic, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/09/Diseno-sin-titulo-_2_-768x339.webp" alt="Logic">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" onclick="document.getElementById('modalLogic').style.display = 'flex'; return false;">SELECCIONAR</a>
        </div>
    </div>
</div>
<!-- Modal Advance -->
<?php include __DIR__ . '/modals/modalAdvance.php'; ?>
<!-- Modal Villacorp -->
<?php include __DIR__ . '/modals/modalVillacorp.php'; ?>
<!-- Modal 3nStar -->
<?php include __DIR__ . '/modals/modal3nstar.php'; ?>
<!-- Modal Elitronic -->
<?php include __DIR__ . '/modals/modalElitronic.php'; ?>
<!-- Modal Star -->
<?php include __DIR__ . '/modals/modalStar.php'; ?>
<!-- Modal Bienex Nuevo -->
<?php include __DIR__ . '/modals/modalBienexNuevo.php'; ?>
<!-- Modal Logic -->
<?php include __DIR__ . '/modals/modalLogic.php'; ?>
<!-- Modal Epson -->
<?php include __DIR__ . '/modals/modalEpson.php'; ?>
<!-- Modal Xprinter (fuera del grid, al final del archivo) -->
<?php include __DIR__ . '/modals/modalXprinter.php'; ?>
<style>
/* Modal Epson */
#modalEpson {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
}
#modalEpson.active {
    display: flex;
    justify-content: center;
    align-items: center;
}
#modalVillacorp {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
    /* Forzar centrado vertical y horizontal */
}
#modalVillacorp.active, #modalVillacorp[style*="display: flex"] {
    display: flex !important;
    justify-content: center;
    align-items: center;
}
#modal3nstar {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
}
#modal3nstar.active, #modal3nstar[style*="display: flex"] {
    display: flex !important;
    justify-content: center;
    align-items: center;
}
#modalLogic {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.25);
    justify-content: center;
    align-items: center;
}
#modalLogic.active, #modalLogic[style*="display: flex"] {
    display: flex !important;
    justify-content: center;
    align-items: center;
}
</style>
<script>
// Cerrar modal con Escape
window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.getElementById('modalAdvance').classList.remove('active');
    }
});
// Cerrar modal haciendo click fuera del contenido
window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalAdvance');
    if (e.target === modal) {
        modal.classList.remove('active');
    }
});
// Mostrar modal Villacorp solo al presionar el botón
function openVillacorpModal() {
    document.getElementById('modalVillacorp').style.display = 'flex';
}
function closeVillacorpModal() {
    document.getElementById('modalVillacorp').style.display = 'none';
}
document.getElementById('btnVillacorp').onclick = openVillacorpModal;
// Mostrar modal 3nStar solo al presionar el botón
function open3nstarModal() {
    document.getElementById('modal3nstar').style.display = 'flex';
}
function close3nstarModal() {
    document.getElementById('modal3nstar').style.display = 'none';
}
document.getElementById('btn3nstar').onclick = open3nstarModal;
// Mostrar modal Logic solo al presionar el botón
function openLogicModal() {
    document.getElementById('modalLogic').style.display = 'flex';
}
function closeLogicModal() {
    document.getElementById('modalLogic').style.display = 'none';
}
document.getElementById('btnLogic').onclick = openLogicModal;
// Cerrar modal con Escape y click fuera
window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVillacorpModal();
        close3nstarModal();
        closeLogicModal();
    }
});
window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalVillacorp');
    if (e.target === modal) {
        closeVillacorpModal();
    }
    var modal = document.getElementById('modal3nstar');
    if (e.target === modal) {
        close3nstarModal();
    }
    var modal = document.getElementById('modalLogic');
    if (e.target === modal) {
        closeLogicModal();
    }
});
</script>
