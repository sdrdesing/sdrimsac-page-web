<footer class="footer-modern">
    <div class="footer-bg"></div>
    <div class="footer-content">
        <div class="footer-col footer-logo-desc">
            <img src="assets/img/logoSdrimsac.png" alt="SDRIMSAC Logo" class="footer-logo-img">
            <div class="footer-desc">
                <strong>SDRIMSAC SOLUTIONS</strong> es una empresa de especialización en el mundo tecnológico <span title="💻">💻</span> (informática) que desarrolla Sistemas de Facturación Electrónica personalizados.
            </div>
        </div>
        <div class="footer-col footer-services">
            <h4>Servicios <span title="🛠️">🛠️</span></h4>
            <ul>
                <li><span title="🧾">🧾</span> Facturación Electrónica</li>
                <li><span title="🌐">🌐</span> Páginas Web</li>
                <li><span title="🏬">🏬</span> Tiendas Virtuales</li>
                <li><span title="📈">📈</span> Marketing Digital</li>
                <li><span title="📹">📹</span> Instalación de cámaras de seguridad</li>
                <li><span title="🔆">🔆</span> Instalación de Luminarias Solares</li>
            </ul>
        </div>
        <div class="footer-col footer-info">
            <h4>Información <span title="ℹ️">ℹ️</span></h4>
            <ul>
                <li><span title="📞">📞</span> +51 995 764 963</li>
                <li><span title="✉️">✉️</span> contacto@sdrimsac.com</li>
                <li><span title="🌐">🌐</span> www.sdrimsac.com</li>
                <li><span title="📍">📍</span> Jr. Miguel Grau 224 - Pichanaqui - Chanchamayo - Junín</li>
            </ul>
        </div>
    </div>
    <div class="footer-copy">
        Copyright © <?php echo date("Y"); ?> Todos los Derechos Reservados Sdrimsac Solutions.
    </div>
</footer>
<style>
.footer-modern {
    position: relative;
    background: #232c47;
    color: #fff;
    padding: 0;
    overflow: hidden;
}
.footer-bg {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url('assets/img/banner_nosotros.jpg') center/cover no-repeat;
    opacity: 0.18;
    z-index: 1;
}
.footer-content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    gap: 48px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 48px 24px 24px 24px;
}
.footer-col {
    flex: 1;
    min-width: 220px;
}
.footer-logo-img {
    display: block;
    margin: 0 auto 16px auto;
    height: 90px;
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.footer-desc {
    text-align: center;
    font-size: 1rem;
    color: #e0e6f6;
    margin-top: 8px;
}
.footer-services h4, .footer-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 12px;
}
.footer-services ul, .footer-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.footer-services li, .footer-info li {
    font-size: 1rem;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.footer-copy {
    position: relative;
    z-index: 2;
    text-align: center;
    font-size: 0.95rem;
    color: #cfd8e3;
    padding: 16px 0 8px 0;
    border-top: 1px solid #2a355a;
    margin-top: 0;
}
@media (max-width: 900px) {
    .footer-content {
        flex-direction: column;
        gap: 24px;
        padding: 32px 12px 12px 12px;
    }
    .footer-col {
        min-width: 0;
    }
    .footer-logo-img {
        height: 70px;
    }
}
</style>