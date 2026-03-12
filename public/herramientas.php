<?php include("includes/header.php"); ?>

<style>
/* =========================
   HERRAMIENTAS SDRIMSAC
========================= */

/* Banner */
.page-banner {
    position: relative;
    width: 100%;
    height: 260px;
    overflow: hidden;
    margin-bottom: 26px;
}

.page-banner img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    filter: brightness(0.42) saturate(0.8);
}

.page-banner-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(10,20,60,0.45), rgba(10,15,30,0.35));
    text-align: center;
    padding: 0 20px;
}

.page-banner-overlay h1 {
    margin: 0 0 10px;
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.02em;
}

.page-banner-overlay p {
    margin: 0;
    color: rgba(255,255,255,0.88);
    font-size: 1rem;
    line-height: 1.7;
}

/* Contenedor principal */
.herramientas-main {
    max-width: 1300px;
    margin: 0 auto 50px;
    padding: 0 18px;
}

/* Barra de menú */
.herramientas-menu-bar {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
    background: linear-gradient(135deg, #2d3fbf, #5564de);
    padding: 10px 14px;
    border-radius: 20px;
    box-shadow: 0 12px 28px rgba(31, 42, 138, 0.20);
    margin-bottom: 16px;
}

.herramientas-menu-bar a {
    text-decoration: none;
}

.btn-herramientas-menu {
    border: 1px solid rgba(255,255,255,0.16);
    background: rgba(255,255,255,0.08);
    color: #fff;
    padding: 12px 20px;
    border-radius: 14px;
    font-size: 0.98rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s ease;
    backdrop-filter: blur(6px);
}

.btn-herramientas-menu:hover {
    background: rgba(255,255,255,0.16);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
}

.btn-herramientas-menu .icon {
    margin-right: 6px;
}

/* texto debajo del menú */
.herramientas-menu-info {
    text-align: center;
    margin: 12px 0 24px;
}

.herramientas-menu-info p {
    margin: 0;
    color: #334155;
    font-size: 1rem;
    line-height: 1.6;
}

/* bloque principal de contenido */
.herramientas-content {
    min-height: 280px;
}

/* errores */
.herramientas-error {
    background: #fff1f2;
    color: #b42318;
    border: 1px solid #fecdd3;
    border-radius: 16px;
    padding: 18px 20px;
    font-weight: 700;
    text-align: center;
    box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
}

/* =========================
   PORTADA INTERNA HERRAMIENTAS
========================= */

.herramientas-home {
    background: #ffffff;
    border: 1px solid rgba(0,0,0,0.06);
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    padding: 34px 28px;
    margin-top: 10px;
}

.herramientas-home-head {
    text-align: center;
    margin-bottom: 28px;
}

.herramientas-home-head h2 {
    margin: 0 0 10px;
    font-size: clamp(1.6rem, 2.5vw, 2.2rem);
    font-weight: 800;
    color: #1f2a8a;
    letter-spacing: -0.02em;
}

.herramientas-home-head p {
    max-width: 760px;
    margin: 0 auto;
    font-size: 1rem;
    line-height: 1.7;
    color: #5b6475;
}

.herramientas-home-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 28px;
}

.herramienta-home-card {
    display: flex;
    flex-direction: column;
    gap: 12px;
    text-decoration: none;
    background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
    border: 1px solid rgba(31, 42, 138, 0.08);
    border-radius: 18px;
    padding: 22px 18px;
    box-shadow: 0 8px 22px rgba(15, 23, 42, 0.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.herramienta-home-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 32px rgba(15, 23, 42, 0.10);
    border-color: rgba(31, 42, 138, 0.20);
}

.herramienta-home-icon {
    width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    font-size: 1.6rem;
    background: linear-gradient(135deg, #eef2ff, #dbe6ff);
    color: #1f2a8a;
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);
}

.herramienta-home-card h3 {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 800;
    color: #0f172a;
}

.herramienta-home-card p {
    margin: 0;
    font-size: 0.92rem;
    line-height: 1.65;
    color: #5b6475;
    flex: 1;
}

.herramienta-home-card span {
    font-size: 0.9rem;
    font-weight: 800;
    color: #1f2a8a;
}

.herramientas-home-help {
    background: linear-gradient(135deg, #f8fbff, #eef4ff);
    border: 1px solid rgba(31, 42, 138, 0.08);
    border-left: 4px solid #4f46e5;
    border-radius: 16px;
    padding: 18px 20px;
}

.herramientas-home-help h4 {
    margin: 0 0 8px;
    font-size: 1rem;
    font-weight: 800;
    color: #1f2a8a;
}

.herramientas-home-help p {
    margin: 0;
    color: #4b5563;
    line-height: 1.7;
    font-size: 0.95rem;
}

/* responsive */
@media (max-width: 1100px) {
    .herramientas-home-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .herramientas-menu-bar {
        padding: 12px;
    }

    .btn-herramientas-menu {
        width: 100%;
        text-align: center;
    }

    .herramientas-menu-bar a {
        width: 100%;
    }
}

@media (max-width: 640px) {
    .herramientas-home {
        padding: 22px 16px;
        border-radius: 18px;
    }

    .herramientas-home-grid {
        grid-template-columns: 1fr;
    }

    .herramientas-home-head p {
        font-size: 0.95rem;
    }

    .page-banner {
        height: 220px;
    }

    .page-banner img {
        height: 220px;
    }
}
</style>

<!-- BANNER ADICIONAL -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&q=80" alt="Herramientas Digitales">
    <div class="page-banner-overlay">
        <h1>Herramientas Digitales</h1>
        <p>Todo lo que necesitas para tu facturación electrónica</p>
    </div>
</div>

<div class="herramientas-main">
    <!-- Menú principal siempre visible -->
    <div class="herramientas-menu-bar">
        <a href="herramientas.php?seccion=programas">
            <button class="btn-herramientas-menu">
                <span class="icon">💻</span> Programas
            </button>
        </a>
        <a href="herramientas.php?seccion=drivers_ticketera">
            <button class="btn-herramientas-menu">
                <span class="icon">🖨️</span> Drivers Ticketera
            </button>
        </a>
        <a href="herramientas.php?seccion=sistema">
            <button class="btn-herramientas-menu">
                <span class="icon">⚙️</span> Sistema
            </button>
        </a>
        <a href="herramientas.php?seccion=driver_all_in_one">
            <button class="btn-herramientas-menu">
                <span class="icon">🖥️</span> Driver All in One
            </button>
        </a>
    </div>

    <div class="herramientas-menu-info">
        <p>✨ Selecciona una categoría para ver las herramientas disponibles. ✨</p>
    </div>

    <div class="herramientas-content">
    <?php
    // Detectar la sección y herramienta seleccionada
    $seccion = $_GET['seccion'] ?? null;
    $herramienta = $_GET['herramienta'] ?? null;

    if (!$seccion) {
        ?>
        <div class="herramientas-home">
            <div class="herramientas-home-head">
                
                <p>
                    Accede rápidamente a programas, drivers y utilitarios necesarios para instalar,
                    configurar y mantener tu sistema funcionando correctamente.
                </p>
            </div>

            <div class="herramientas-home-grid">
                <a href="herramientas.php?seccion=programas" class="herramienta-home-card">
                    <div class="herramienta-home-icon">💻</div>
                    <h3>Programas</h3>
                    <p>Instaladores, aplicaciones y utilitarios esenciales para tu sistema.</p>
                    
                </a>

                <a href="herramientas.php?seccion=drivers_ticketera" class="herramienta-home-card">
                    <div class="herramienta-home-icon">🖨️</div>
                    <h3>Drivers Ticketera</h3>
                    <p>Controladores para impresoras térmicas y equipos de impresión.</p>
                    
                </a>

                <a href="herramientas.php?seccion=sistema" class="herramienta-home-card">
                    <div class="herramienta-home-icon">⚙️</div>
                    <h3>Sistema</h3>
                    <p>Herramientas técnicas para configuración, soporte y mantenimiento.</p>
                
                </a>

                <a href="herramientas.php?seccion=driver_all_in_one" class="herramienta-home-card">
                    <div class="herramienta-home-icon">🖥️</div>
                    <h3>Driver All in One</h3>
                    <p>Paquetes completos para instalación rápida de múltiples componentes.</p>
                    
                </a>
            </div>

            <div class="herramientas-home-help">
                <h4>Recomendación</h4>
                <p>
                    Selecciona primero una categoría para ver las herramientas disponibles. Si no estás seguro
                    de cuál usar, empieza por <strong>Programas</strong> o <strong>Driver All in One</strong>.
                </p>
            </div>
        </div>
        <?php
    } else if ($seccion && !$herramienta) {
        // Mostrar menú de la sección
        $menuFile = "herramientas/menus/{$seccion}.php";
        if (file_exists($menuFile)) {
            include $menuFile;
        } else {
            echo '<div class="herramientas-error">Sección no encontrada.</div>';
        }
    } else if ($seccion && $herramienta) {
        // Mostrar herramienta específica
        $toolFile = "herramientas/{$seccion}/{$herramienta}.php";
        if (file_exists($toolFile)) {
            include $toolFile;
        } else {
            echo '<div class="herramientas-error">Herramienta no encontrada.</div>';
        }
    }
    ?>
    </div>
</div>

<?php include("includes/social.php"); ?>
<?php include("includes/footer.php"); ?>