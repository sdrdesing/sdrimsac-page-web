<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Instalacion Luminarias - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/instalacionluminarias.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php include("includes/header.php"); ?>

<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Instalacion Luminarias SDRIM">
    <div class="page-banner-overlay">
        <h1>Instalacion Luminarias</h1>
        <p>Sdrim S.A.C.:Servicios:Instalación de Luminarias Solares </p>
    </div>
</div>
<div class="luminarias-container">
    <!-- Introducción y lista -->
    <div class="luminarias-intro">
        <div class="luminarias-intro-card">
            <h2>Descubre sobre Luminarias Solares</h2>
            <p>Nuestro servicio de instalación de luminarias solares y paneles solares ofrece una solución sostenible y eficiente para la iluminación y la generación de energía. Nos enorgullece ser líderes en la adopción de tecnologías limpias y renovables, y nuestro objetivo es proporcionar a nuestros clientes una fuente de iluminación y energía confiable y respetuosa con el medio ambiente.</p>
            <div class="luminarias-list-grid">
                <ul>
                    <li><i class="fa-solid fa-circle-check"></i> Evaluación y Diseño Personalizado</li>
                    <li><i class="fa-solid fa-circle-check"></i> Selección de Luminarias Eficientes</li>
                    <li><i class="fa-solid fa-circle-check"></i> Instalación profesional</li>
                </ul>
                <ul>
                    <li><i class="fa-solid fa-circle-check"></i> Eficiencia Energética</li>
                    <li><i class="fa-solid fa-circle-check"></i> Mantenimiento y soporte</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Beneficios -->
    
    <div class="luminarias-beneficios-card">
        <div class="luminarias-beneficios-title">BENEFICIOS DE LUMINARIAS SOLARES</div>
        <div class="luminarias-beneficios-desc">"Las luminarias solares no solo iluminan tu espacio, sino que también reducen el consumo energético, minimizan tu huella de carbono y te guían hacia un futuro más sostenible y ecológico."</div>
        <div class="luminarias-beneficios-grid">
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">🔧</span>
                </div>
                <div class="servicio-body">
                    <h3>Instalación Profesional</h3>
                    <p>Nuestro equipo de instaladores certificados lleva a cabo la instalación de paneles solares con precisión y de acuerdo con las normativas locales. Nos aseguramos de que el sistema funcione de manera óptima para maximizar la generación de energía.</p>
                </div>
            </div>
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">💸</span>
                </div>
                <div class="servicio-body">
                    <h3>Reducción de Gastos</h3>
                    <p>Al no depender de la electricidad, se eliminan los costos de consumo energético y también los gastos relacionados con el tendido de cables y mantenimiento de infraestructura eléctrica.</p>
                </div>
            </div>
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">💡</span>
                </div>
                <div class="servicio-body">
                    <h3>Ahorro Energético</h3>
                    <p>Las luminarias solares aprovechan la energía del sol, lo que reduce o elimina la necesidad de electricidad proveniente de la red eléctrica.</p>
                </div>
            </div>
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">🛡️</span>
                </div>
                <div class="servicio-body">
                    <h3>Mayor Seguridad</h3>
                    <p>Al no depender de cables, se minimizan los riesgos asociados a cortocircuitos, sobrecargas o electrocuciones.</p>
                </div>
            </div>
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">🔋</span>
                </div>
                <div class="servicio-body">
                    <h3>Autonomía</h3>
                    <p>Estas luminarias suelen estar equipadas con baterías que almacenan la energía solar durante el día, permitiendo que funcionen de noche o en días nublados.</p>
                </div>
            </div>
            <div class="servicio-card luminaria-card">
                <div class="luminaria-img">
                    <span class="emoji">🛠️</span>
                </div>
                <div class="servicio-body">
                    <h3>Bajo Mantenimiento</h3>
                    <p>Las luminarias solares requieren poco mantenimiento, ya que no tienen componentes eléctricos complejos como las luminarias convencionales.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Galería de imágenes -->
    
        <div style="background: #f7f8fa; border-radius: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 40px 0; width: 100%; display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu1.jpg" alt="Luminaria solar 1" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu2.jpg" alt="Luminaria solar 2" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu3.jpg" alt="Luminaria solar 3" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu4.jpg" alt="Luminaria solar 4" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu5.jpg" alt="Luminaria solar 5" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
            <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.10); padding: 12px; display: flex; flex-direction: column; align-items: center; width: 190px;">
                <img src="assets/img/ilu6.jpg" alt="Luminaria solar 6" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px;">
                <div style="margin-top: 8px; font-size: 14px; color: #333;"></div>
            </div>
        </div>
</div>

<!-- Preguntas Frecuentes -->
<section class="luminarias-faq-section">
    <div class="luminarias-faq-card">
        <div class="luminarias-faq-title">Preguntas Frecuentes</div>
        <div class="luminarias-faq-content">
            <div class="luminarias-faq-list">
                <details open>
                    <summary>¿Qué son las luminarias solares?</summary>
                    <p>Las luminarias solares son dispositivos de iluminación que utilizan la energía solar para cargar sus baterías y proporcionar luz, eliminando la necesidad de conexión a la red.</p>
                </details>
                <details>
                    <summary>¿Cómo funcionan las luminarias solares?</summary>
                    <p>Captan la energía solar mediante paneles fotovoltaicos, la almacenan en baterías y la utilizan para alimentar las luces LED durante la noche.</p>
                </details>
                <details>
                    <summary>¿Necesitan estar directamente expuestos al sol para funcionar?</summary>
                    <p>Para un rendimiento óptimo, sí. Sin embargo, pueden funcionar en días nublados gracias a la energía almacenada.</p>
                </details>
                <details>
                    <summary>¿Qué tipo de mantenimiento requieren las luminarias solares?</summary>
                    <p>Requieren limpieza periódica de los paneles y revisión ocasional de las baterías.</p>
                </details>
                <details>
                    <summary>¿Son resistentes al agua y a las inclemencias del tiempo?</summary>
                    <p>Sí, están diseñadas para ser resistentes al agua y a condiciones climáticas adversas.</p>
                </details>
            </div>
            <div class="luminarias-faq-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLuuQ1kGLx_GfaoZprbzEcHFGlMVjdci5dVmmN4so44Q&s" alt="Panel solar y luminaria solar">
            </div>
        </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>

</body>
</html>
