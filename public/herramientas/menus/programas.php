<style>
.programas-grid {
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
<div class="programas-grid">
    <div class="herramientas-card">
        <h3>RU-FUS</h3>
        <p>Rufus es un software gratuito y de código abierto que permite crear unidades USB de arranque. Es utilizado principalmente para instalar sistemas operativos como Windows o Linux.</p>
        <img src="assets/img/rufus.png" alt="Rufus">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>WINRAR</h3>
        <p>Es un programa de compresión de archivos que permite comprimir archivos y carpetas en formatos como RAR y ZIP, una amplia variedad de formatos de archivo comprimido.</p>
        <img src="assets/img/winrar.png" alt="Winrar">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>SHANA ENCODER</h3>
        <p>Programa de conversión multimedia que permite a los usuarios convertir archivos de video y audio entre diferentes formatos. Ofrece una interfaz intuitiva.</p>
        <img src="assets/img/shana.png" alt="Shana Encoder">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>GOOGLE CHROME</h3>
        <p>Google Chrome es un navegador web desarrollado por Google, conocido por su velocidad, simplicidad y seguridad. Ofrece una experiencia de navegación rápida y eficiente.</p>
        <img src="assets/img/chrome.png" alt="Google Chrome">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BRAVE BROWSER</h3>
        <p>Brave es un navegador web centrado en la privacidad y la velocidad. Bloquea anuncios y rastreadores de forma predeterminada, lo que mejora la experiencia de navegación del usuario.</p>
        <img src="assets/img/brave.png" alt="Brave Browser">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>EXCEL INFO</h3>
        <p>Son secuencias de instrucciones grabadas en el lenguaje de programación similar al VBA que ejecutan automáticamente una serie de comandos o acciones.</p>
        <img src="assets/img/excel.png" alt="Excel Info">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>TELEGRAM DESKTOP</h3>
        <p>Es la versión para computadoras de la popular aplicación de mensajería instantánea y con funciones adicionales adaptadas a las necesidades de los usuarios de PC.</p>
        <img src="assets/img/telegram.png" alt="Telegram Desktop">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">DESCARGAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
</div>
