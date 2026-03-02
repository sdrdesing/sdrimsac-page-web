<style>
.sistema-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 32px;
    margin: 32px 0 0 0;
}
.herramientas-card {
    background: #fff;
    border-radius: 18px;
    border: 3px solid #18126d;
    box-shadow: 0 2px 12px rgba(24,18,109,0.08);
    padding: 28px 18px 18px 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: box-shadow 0.2s;
    min-height: 370px;
}
.herramientas-card:hover {
    box-shadow: 0 4px 24px rgba(24,18,109,0.18);
    border-color: #3a2fff;
}
.herramientas-card h3 {
    color: #18126d;
    font-size: 1.25rem;
    margin-bottom: 10px;
    font-weight: 700;
    text-align: center;
}
.herramientas-card p {
    font-size: 1rem;
    color: #222;
    margin-bottom: 16px;
    text-align: center;
    min-height: 60px;
}
.herramientas-card img {
    width: 80px;
    height: 70px;
    object-fit: contain;
    margin-bottom: 18px;
}
.herramientas-card .btns-row {
    display: flex;
    gap: 12px;
    margin-top: auto;
}
.btn-herramienta {
    background: #18126d;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 8px 18px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    text-decoration: none;
    display: inline-block;
}
.btn-herramienta:hover {
    background: #3a2fff;
}
</style>
<div class="sistema-grid">
    <div class="herramientas-card">
        <h3>JAVA SETUP</h3>
        <p>Java es un lenguaje de programación de alto nivel, orientado a objetos, diseñado para ser independiente de la plataforma y con enfoque en la portabilidad y seguridad</p>
        <img src="assets/img/java.png" alt="Java">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>ANYDESK</h3>
        <p>Es un software de escritorio remoto de alto rendimiento que permite compartir sin latencia un control estable y una transmisión de datos rápida y seguro entre dispositivos.</p>
        <img src="assets/img/anydesk.png" alt="AnyDesk">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>QZ TRAY</h3>
        <p>Es una versión del software QZ Tray,que permite a las aplicaciones web o móviles enviar trabajos de impresión directamente a impresoras locales, por un servidor intermedio.</p>
        <img src="assets/img/qztray.png" alt="QZ Tray">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>LIGHTSHOT</h3>
        <p>Es una aplicación ligera y fácil de usar para capturar y editar pantallas en Windows y macOS, ofrece funciones de edición y permite compartir capturas de pantalla de manera rápida</p>
        <img src="assets/img/lightshot.png" alt="Lightshot">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>W.U.B</h3>
        <p>Es un programa que nos permite bloquear las actualizaciones de windows, para evitar que se actualice y ponga mas lento tu pc</p>
        <img src="assets/img/wub.png" alt="WUB">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>APK RESTAURANTE</h3>
        <p>Aplicación para android del sistema de facturación</p>
        <img src="assets/img/dragonCredito.png" alt="APK Restaurante">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
</div>
