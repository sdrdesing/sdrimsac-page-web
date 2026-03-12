<style>
.driverall-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 36px;
    margin: 40px auto 0 auto;
    max-width: 1200px;
    padding: 0 16px 40px 16px;
    justify-content: center;
}
.herramientas-card {
    background: #fff;
    border-radius: 20px;
    border: 3px solid #2a2eec;
    box-shadow: 0 4px 24px rgba(42,46,236,0.08);
    padding: 32px 18px 24px 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: box-shadow 0.2s, border-color 0.2s;
    min-height: 420px;
    position: relative;
}
.herramientas-card:hover {
    box-shadow: 0 8px 32px rgba(42,46,236,0.18);
    border-color: #3a2fff;
    transform: translateY(-4px) scale(1.02);
}
.herramientas-card h3 {
    color: #2a2eec;
    font-size: 1.35rem;
    margin-bottom: 12px;
    font-weight: 800;
    text-align: center;
    letter-spacing: 1px;
    background: #f4f7ff;
    border-radius: 8px;
    padding: 4px 0;
    width: 100%;
}
.herramientas-card p {
    font-size: 1.05rem;
    color: #222;
    margin-bottom: 18px;
    text-align: center;
    min-height: 60px;
    line-height: 1.5;
}
.herramientas-card img {
    width: 180px;
    height: 120px;
    object-fit: contain;
    margin-bottom: 22px;
    border-radius: 12px;
    background: #f4f7ff;
    box-shadow: 0 2px 8px rgba(42,46,236,0.07);
    padding: 8px;
}
.herramientas-card .btns-row {
    display: flex;
    gap: 16px;
    margin-top: auto;
    width: 100%;
    justify-content: center;
}
.btn-herramienta {
    background: #2a2eec;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 10px 28px;
    font-size: 1.08rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 2px 8px rgba(42,46,236,0.07);
    letter-spacing: 0.5px;
}
.btn-herramienta:hover {
    background: #3a2fff;
    box-shadow: 0 4px 16px rgba(42,46,236,0.13);
}
@media (max-width: 900px) {
    .driverall-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }
    .herramientas-card {
        min-height: 380px;
    }
}
@media (max-width: 600px) {
    .driverall-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .herramientas-card {
        min-height: 340px;
        padding: 18px 8px 16px 8px;
    }
    .herramientas-card img {
        width: 110px;
        height: 70px;
    }
}
</style>
<div class="driverall-grid">
    <div class="herramientas-card">
        <h3>LAN</h3>
        <p>Un driver LAN es un software que permite a un sistema operativo comunicarse con una tarjeta de red (NIC) para establecer y mantener conexiones en una red local (LAN).</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_11_-700x309.webp" alt="LAN">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnLan">SELECCIONAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>AUDIO</h3>
        <p>Software que permite al sistema operativo interactuar con el hardware de audio, como tarjetas de sonido o altavoces. En esencia, actúa como un intermediario.</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_12_-700x309.webp" alt="AUDIO">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnAudio">SELECCIONAR</a>
           
        </div>
    </div>
    <div class="herramientas-card">
        <h3>USB</h3>
        <p>Software que permite que el sistema operativo de una computadora se comunique con un dispositivo USB. Es como un traductor, que facilita la transferencia de datos.</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_13_-700x309.webp" alt="USB">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnUsb">SELECCIONAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>APOLLO LAKE</h3>
        <p>Apollo Lake es una generación de procesadores INTEL de bajo consumo, sucesora de Braswell, y basada en la arquitectura Goldmont, diseñada para All in One, Mini PCs, Portátiles</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_14_-700x309.webp" alt="APOLLO LAKE">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnApolloLake">VISUALIZAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BAY TRAIL</h3>
        <p>Bay Trail es una generación de procesadores INTEL de bajo consumo, y basada en la arquitectura Silvermont, diseñada para All in One, Mini PCs, Portátiles</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_15_-700x309.webp" alt="BAY TRAIL">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnBayTrail">VISUALIZAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BRASWELL</h3>
        <p>Braswell es una generación de procesadores INTEL de bajo consumo,sucesora de Bay Trail, y basada en la arquitectura Airmont, diseñado para All in One, Mini PCs, Portátiles</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_16_-700x309.webp" alt="BRASWELL">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnBraswell">VISUALIZAR</a>
        </div>
    </div>
    <div class="herramientas-card">
        <h3>GEMINI LAKE</h3>
        <p>Gemini Lake es una generación de procesadores INTEL de bajo consumo, sucesora de Apollo Lake, y basada en la arquitectura Goldmont Plus, diseñado para All in One, Mini PCs, Portátiles</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/04/Diseno-sin-titulo-_17_-700x309.webp" alt="GEMINI LAKE">
        <div class="btns-row">
            <a href="#" class="btn-herramienta" id="btnGeminiLake">VISUALIZAR</a>
        </div>
    </div>

</div>
<?php include __DIR__ . '/modalDriver/modalLan.php'; ?>
<?php include __DIR__ . '/modalDriver/modalAudio.php'; ?>
<?php include __DIR__ . '/modalDriver/modalUsb.php'; ?>
<?php include __DIR__ . '/modalDriver/modalApolloLake.php'; ?>
<?php include __DIR__ . '/modalDriver/modalBayTrail.php'; ?>
<?php include __DIR__ . '/modalDriver/modalBraswell.php'; ?>
<?php include __DIR__ . '/modalDriver/modalGeminiLake.php'; ?>

