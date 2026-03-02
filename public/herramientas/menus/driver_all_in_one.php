<style>
.driverall-grid {
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
<div class="driverall-grid">
    <div class="herramientas-card">
        <h3>LAN</h3>
        <p>Un driver LAN es un software que permite a un sistema operativo comunicarse con una tarjeta de red (NIC) para establecer y mantener conexiones en una red local (LAN).</p>
        <img src="assets/img/lan.png" alt="LAN">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>AUDIO</h3>
        <p>Software que permite al sistema operativo interactuar con el hardware de audio, como tarjetas de sonido o altavoces. En esencia, actúa como un intermediario.</p>
        <img src="assets/img/audio.png" alt="AUDIO">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>USB</h3>
        <p>Software que permite que el sistema operativo de una computadora se comunique con un dispositivo USB. Es como un traductor, que facilita la transferencia de datos.</p>
        <img src="assets/img/usb.png" alt="USB">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">SELECCIONAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>APOLLO LAKE</h3>
        <p>Apollo Lake es una generación de procesadores INTEL de bajo consumo, sucesora de Braswell, y basada en la arquitectura Goldmont, diseñada para All in One, Mini PCs, Portátiles</p>
        <img src="assets/img/apollo.png" alt="APOLLO LAKE">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">VISUALIZAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BAY TRAIL</h3>
        <p>Bay Trail es una generación de procesadores INTEL de bajo consumo, y basada en la arquitectura Silvermont, diseñada para All in One, Mini PCs, Portátiles</p>
        <img src="assets/img/baytrail.png" alt="BAY TRAIL">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">VISUALIZAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BRASWELL</h3>
        <p>Braswell es una generación de procesadores INTEL de bajo consumo,sucesora de Bay Trail, y basada en la arquitectura Airmont, diseñado para All in One, Mini PCs, Portátiles</p>
        <img src="assets/img/braswell.png" alt="BRASWELL">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">VISUALIZAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>GEMINI LAKE</h3>
        <p>Gemini Lake es una generación de procesadores INTEL de bajo consumo, sucesora de Apollo Lake, y basada en la arquitectura Goldmont Plus, diseñado para All in One, Mini PCs, Portátiles</p>
        <img src="assets/img/gemini.png" alt="GEMINI LAKE">
        <div class="btns-row">
            <a href="#" class="btn-herramienta">VISUALIZAR</a>
            <a href="#" class="btn-herramienta">VER TUTORIAL</a>
        </div>
    </div>
</div>
