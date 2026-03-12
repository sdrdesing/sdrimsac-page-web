<link rel="stylesheet" href="css/programas.css">
<style>
body {
    background: #f4f7ff;
}
.programas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 36px;
    margin: 40px auto 0 auto;
    max-width: 1200px;
    padding: 0 16px 40px 16px;
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
    width: 90px;
    height: 90px;
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
    .programas-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }
    .herramientas-card {
        min-height: 380px;
    }
}
@media (max-width: 600px) {
    .programas-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .herramientas-card {
        min-height: 340px;
        padding: 18px 8px 16px 8px;
    }
    .herramientas-card img {
        width: 70px;
        height: 70px;
    }
}
</style>
<div class="programas-grid">
    <div class="herramientas-card">
        <h3>RU-FUS</h3>
        <p>Rufus es un software gratuito y de código abierto que permite crear unidades USB de arranque. Es utilizado principalmente para instalar sistemas operativos como Windows o Linux.</p>
        <img src="https://img.utdstc.com/icon/dfb/617/dfb617fea19c1ab8515ad34dfdc3dc352a975899b3ee5bfb7c1e77c1ebd79237:200" alt="Rufus">
        <div class="btns-row">
            <a href="https://apps.microsoft.com/detail/9pc3h3v7q9ch?hl=es-ES&gl=AR" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
           
        </div>
    </div>
    <div class="herramientas-card">
        <h3>WINRAR</h3>
        <p>Es un programa de compresión de archivos que permite comprimir archivos y carpetas en formatos como RAR y ZIP, una amplia variedad de formatos de archivo comprimido.</p>
        <img src="https://i0.wp.com/unaaldia.hispasec.com/wp-content/uploads/2021/10/winrar-2-1280x450-1.png?fit=1280%2C450&ssl=1" alt="Winrar">
        <div class="btns-row">
            <a href="https://winrar.es/descargas" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>SHANA ENCODER</h3>
        <p>Programa de conversión multimedia que permite a los usuarios convertir archivos de video y audio entre diferentes formatos. Ofrece una interfaz intuitiva.</p>
        <img src="https://cdn.neowin.com/news/images/uploaded/2021/03/1616755936_shanaencoder_story.jpg" alt="Shana Encoder">
        <div class="btns-row">
            <a href="https://sourceforge.net/projects/shanaencoder/files/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>GOOGLE CHROME</h3>
        <p>Google Chrome es un navegador web desarrollado por Google, conocido por su velocidad, simplicidad y seguridad. Ofrece una experiencia de navegación rápida y eficiente.</p>
        <img src="https://play-lh.googleusercontent.com/QRRGW2tMZ4-FNw0XWk6WWiXHaQCGxuwM-92HrBhlA4WOd_AGmjVmQkiHyAqQjW2yByc" alt="Google Chrome">
        <div class="btns-row">
            <a href="https://www.google.com/intl/es_es/chrome/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>BRAVE BROWSER</h3>
        <p>Brave es un navegador web centrado en la privacidad y la velocidad. Bloquea anuncios y rastreadores de forma predeterminada, lo que mejora la experiencia de navegación del usuario.</p>
        <img src="https://cdn.aptoide.com/imgs/d/7/7/d77b3890aa94c7d7e4548e6f25f76700_icon.png" alt="Brave Browser">
        <div class="btns-row">
            <a href="https://brave.com/es/download/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>EXCEL INFO</h3>
        <p>Son secuencias de instrucciones grabadas en el lenguaje de programación similar al VBA que ejecutan automáticamente una serie de comandos o acciones.</p>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuxQ3-MAtYV_Fdm-Gaq-UGTN_HMEEnT-x4MA&s" alt="Excel Info">
        <div class="btns-row">
            <a href="https://www.exceleinfo.com/descarga-exceleinfo-add-in-recomendado/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
            
        </div>
    </div>
    <div class="herramientas-card">
        <h3>TELEGRAM DESKTOP</h3>
        <p>Es la versión para computadoras de la popular aplicación de mensajería instantánea y con funciones adicionales adaptadas a las necesidades de los usuarios de PC.</p>
        <img src="https://img.utdstc.com/icon/b75/d81/b75d81093dad86d9f66f2149281a0e9808150a819f6183913aacf8f2c499d666:200" alt="Telegram Desktop">
        <div class="btns-row">
            <a href="https://desktop.telegram.org/" class="btn-herramienta" target="_blank" rel="noopener">DESCARGAR</a>
           
        </div>
    </div>
</div>
