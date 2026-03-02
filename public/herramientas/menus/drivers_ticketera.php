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
    width: 60px;
    height: 50px;
    object-fit: contain;
    margin-bottom: 12px;
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
        <h3>EPSON TM-U220</h3>
        <p>Driver para impresoras de tickets Epson TM-U220, ampliamente utilizadas en puntos de venta y sistemas de facturación.</p>
        <img src="assets/img/epson.png" alt="Epson TM-U220">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BIXOLON SRP-350</h3>
        <p>Driver para impresoras térmicas Bixolon SRP-350, ideales para impresión rápida de tickets y recibos en comercios.</p>
        <img src="assets/img/bixolon.png" alt="Bixolon SRP-350">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS-80</h3>
        <p>Driver genérico para impresoras POS-80, compatibles con una amplia gama de impresoras térmicas de 80mm.</p>
        <img src="assets/img/pos80.png" alt="POS-80">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>HASAR</h3>
        <p>Driver para impresoras fiscales y de tickets Hasar, utilizadas en soluciones de facturación electrónica y puntos de venta.</p>
        <img src="assets/img/hasar.png" alt="Hasar">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>RONGTA</h3>
        <p>Driver para impresoras térmicas Rongta, reconocidas por su compatibilidad y rendimiento en comercios y restaurantes.</p>
        <img src="assets/img/rongta.png" alt="Rongta">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>POS DRIVER ADVANCE</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca ADVANCE, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora.</p>
        <img src="assets/img/advance.png" alt="Advance">
        <div class="btns-row">
            <button class="btn-herramienta" onclick="document.getElementById('modalAdvance').classList.add('active')">SELECCIONAR</button>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <!-- Tarjeta POS DRIVER VILLACORP dentro del grid -->
    <div class="herramientas-card">
        <h3>POS DRIVER VILLACORP</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca VILLACORP, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora.</p>
        <img src="assets/img/villacorp.png" alt="Villacorp">
        <div class="btns-row">
            <button class="btn-herramienta" id="btnVillacorp">SELECCIONAR</button>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <!-- Tarjeta POS DRIVER 3NSTAR con botón SELECCIONAR que abre un modal con los modelos y botones de descarga, igual al ejemplo de la imagen -->
    <div class="herramientas-card">
        <h3>POS DRIVER 3NSTAR</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca 3NSTART, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora.</p>
        <img src="assets/img/3nstar.png" alt="3nStar">
        <div class="btns-row">
            <button class="btn-herramienta" id="btn3nstar">SELECCIONAR</button>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <!-- Tarjeta POS DRIVER LOGIC con botón SELECCIONAR que abre un modal centrado con la opción SP 700, y que el modal muestre la imagen de la marca en la parte superior, igual al ejemplo de la imagen -->
    <div class="herramientas-card">
        <h3>POS DRIVER LOGIC</h3>
        <p>Es un driver de impresora POS que es compatible con cualquier impresora de ticketera térmica de la marca logic, es un programa de software que actúa de intermediario entre el sistema operativo y la impresora</p>
        <img src="assets/img/star.png" alt="Star Micronics">
        <div class="btns-row">
            <button class="btn-herramienta" id="btnLogic">SELECCIONAR</button>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
</div>
<!-- Modal Advance -->
<div id="modalAdvance">
    <div class="modal-content-advance">
        <button class="close-modal-advance" onclick="document.getElementById('modalAdvance').classList.remove('active')">&times;</button>
        <h2>Seleccione el modelo de la Ticketera</h2>
        <div class="advance-models-grid">
            <div class="advance-model-card">
                <span>ADV7011N</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
            <div class="advance-model-card">
                <span>ADV8009N</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
            <div class="advance-model-card">
                <span>ADV8010N</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
            <div class="advance-model-card">
                <span>ADV9010N</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Villacorp (fuera del grid, al final del archivo) -->
<div id="modalVillacorp" style="display:none;">
    <div class="modal-content-advance">
        <button class="close-modal-advance" onclick="closeVillacorpModal()">&times;</button>
        <h2>Drivers de Villacorp</h2>
        <div class="advance-models-grid" style="grid-template-columns: 1fr 1fr;">
            <div class="advance-model-card" style="min-width:180px;">
                <span>Etiquetadora</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
            <div class="advance-model-card" style="min-width:180px;">
                <span>Ticketera</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal 3nStar (fuera del grid, al final del archivo) -->
<div id="modal3nstar" style="display:none;">
    <div class="modal-content-advance">
        <button class="close-modal-advance" onclick="close3nstarModal()">&times;</button>
        <h2>Drivers de 3nStart</h2>
        <div class="advance-models-grid" style="grid-template-columns: 1fr 1fr;">
            <div class="advance-model-card"><span>RPI007 / RPI007E</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT001</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT004</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT005 / RPT005E</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT006 S/B/W</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT008</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT010</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
            <div class="advance-model-card"><span>RPT015</span><a href="#" class="btn-herramienta">DESCARGAR</a></div>
        </div>
    </div>
</div>
<!-- Modal Logic (fuera del grid, al final del archivo) -->
<div id="modalLogic" style="display:none;">
    <div class="modal-content-advance">
        <button class="close-modal-advance" onclick="closeLogicModal()">&times;</button>
        <img src="assets/img/star.png" alt="Star Micronics" style="width:120px; margin-bottom:10px; margin-top:10px;">
        <h2 style="margin-bottom:18px;">DRIVER STAR</h2>
        <div class="advance-models-grid" style="grid-template-columns: 1fr;">
            <div class="advance-model-card" style="min-width:220px;">
                <span>SP 700</span>
                <a href="#" class="btn-herramienta">DESCARGAR</a>
            </div>
        </div>
    </div>
</div>
<style>
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
