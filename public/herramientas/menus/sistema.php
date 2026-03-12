<style>
.sistema-grid {
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
    width: 150px;
    height: 110px;
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
    .sistema-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }
    .herramientas-card {
        min-height: 380px;
    }
}
@media (max-width: 600px) {
    .sistema-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .herramientas-card {
        min-height: 340px;
        padding: 18px 8px 16px 8px;
    }
    .herramientas-card img {
        width: 90px;
        height: 70px;
    }
}
</style>
<div class="sistema-grid">
    <div class="herramientas-card">
        <h3>JAVA SETUP</h3>
        <p>Java es un lenguaje de programación de alto nivel, orientado a objetos, diseñado para ser independiente de la plataforma y con enfoque en la portabilidad y seguridad</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2024/10/Diseno-sin-titulo-_13_.webp" alt="Java">
        <div class="btns-row">
            <a href="https://www.java.com/es/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
           
        </div>
    </div>
    <div class="herramientas-card">
        <h3>ANYDESK</h3>
        <p>Es un software de escritorio remoto de alto rendimiento que permite compartir sin latencia un control estable y una transmisión de datos rápida y seguro entre dispositivos.</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2024/10/Diseno-sin-titulo-_6_.webp" alt="AnyDesk">
        <div class="btns-row">
            <a href="https://anydesk.com/es/downloads/windows" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>QZ TRAY</h3>
        <p>Es una versión del software QZ Tray,que permite a las aplicaciones web o móviles enviar trabajos de impresión directamente a impresoras locales, por un servidor intermedio.</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2024/10/Diseno-sin-titulo-_12_.webp" alt="QZ Tray">
        <div class="btns-row">
            <a href="https://qz.io/download/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>LIGHTSHOT</h3>
        <p>Es una aplicación ligera y fácil de usar para capturar y editar pantallas en Windows y macOS, ofrece funciones de edición y permite compartir capturas de pantalla de manera rápida</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2024/10/Diseno-sin-titulo-_14_.webp" alt="Lightshot">
        <div class="btns-row">
            <a href="https://lightshot.softonic.com/descargar" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>W.U.B</h3>
        <p>Es un programa que nos permite bloquear las actualizaciones de windows, para evitar que se actualice y ponga mas lento tu pc</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/05/Diseno-sin-titulo-_18_-768x339.webp" alt="WUB">
        <div class="btns-row">
            <a href="https://www.sordum.org/9470/windows-update-blocker-v1-7/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>APK RESTAURANTE</h3>
        <p>Aplicación para android del sistema de facturación</p>
        <img src="https://sdrimsac.com/wp-content/uploads/2025/11/Diseno-sin-titulo-8.png" alt="APK Restaurante">
        <div class="btns-row">
         <a href="/sdrimsac-page-web/public/apk/app-release%20(1).apk" class="btn-herramienta" download>DESCARGAR</a>
            
        </div>
    </div>
</div>
