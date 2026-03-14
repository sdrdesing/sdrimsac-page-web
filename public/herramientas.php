<?php include("includes/header.php"); ?>

<style>
/* =========================
   HERRAMIENTAS SDRIMSAC
   ESTILO PROFESIONAL
========================= */

:root{
    --hz-primary: #1A3A6B;
    --hz-primary-dark: #122b4d;
    --hz-primary-soft: #edf3fb;
    --hz-primary-soft-2: #f6f9fe;
    --hz-accent: #2f5ea8;
    --hz-accent-light: #dfe9f8;
    --hz-text: #0f172a;
    --hz-text-soft: #475569;
    --hz-muted: #64748b;
    --hz-white: #ffffff;
    --hz-bg: #f4f7fb;
    --hz-line: rgba(15, 23, 42, 0.08);
    --hz-shadow: 0 12px 34px rgba(15, 23, 42, 0.08);
    --hz-shadow-hover: 0 18px 40px rgba(15, 23, 42, 0.14);
    --hz-radius-xl: 28px;
    --hz-radius-lg: 22px;
    --hz-radius-md: 16px;
    --hz-radius-sm: 12px;
}

*{
    box-sizing: border-box;
}

body{
    background: linear-gradient(180deg, #f6f9fd 0%, #ffffff 100%);
    color: var(--hz-text);
}

/* =========================
   BANNER PRINCIPAL
========================= */
.page-banner{
    position: relative;
    width: 100%;
    min-height: 390px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 34px;
    background: var(--hz-primary);
}

.page-banner img{
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.38) saturate(0.88);
}

.page-banner::before{
    content: "";
    position: absolute;
    inset: 0;
    background:
        linear-gradient(135deg, rgba(13, 32, 60, 0.92), rgba(26, 58, 107, 0.88), rgba(47, 94, 168, 0.80));
    z-index: 1;
}

.page-banner::after{
    content: "";
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 18% 18%, rgba(255,255,255,0.10), transparent 24%),
        radial-gradient(circle at 82% 28%, rgba(255,255,255,0.08), transparent 22%),
        radial-gradient(circle at 70% 78%, rgba(255,255,255,0.06), transparent 18%);
    z-index: 1;
}

.page-banner-overlay{
    position: relative;
    z-index: 2;
    max-width: 980px;
    text-align: center;
    padding: 36px 20px;
}

.page-banner-chip{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 18px;
    border-radius: 999px;
    background: rgba(255,255,255,0.14);
    border: 1px solid rgba(255,255,255,0.22);
    color: #fff;
    font-size: 0.92rem;
    font-weight: 700;
    margin-bottom: 18px;
    backdrop-filter: blur(6px);
}

.page-banner-overlay h1{
    margin: 0 0 14px;
    font-size: clamp(2.2rem, 4vw, 3.7rem);
    font-weight: 800;
    color: #fff;
    line-height: 1.08;
    letter-spacing: -0.02em;
}

.page-banner-overlay p{
    margin: 0 auto;
    max-width: 760px;
    color: rgba(255,255,255,0.92);
    font-size: 1.04rem;
    line-height: 1.8;
}

/* =========================
   CONTENEDOR PRINCIPAL
========================= */
.herramientas-main{
    width: min(1320px, calc(100% - 40px));
    margin: 0 auto 70px;
}

/* =========================
   TARJETA SUPERIOR
========================= */
.herramientas-top-card{
    background: var(--hz-white);
    border: 1px solid var(--hz-line);
    border-radius: var(--hz-radius-xl);
    box-shadow: var(--hz-shadow);
    padding: 28px;
    margin-bottom: 24px;
    overflow: hidden;
    position: relative;
}

.herramientas-top-card::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(90deg, var(--hz-primary), var(--hz-accent));
}

.herramientas-top-grid{
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 30px;
    align-items: center;
}

.herramientas-top-text h2{
    margin: 0 0 12px;
    font-size: clamp(1.8rem, 3vw, 2.7rem);
    font-weight: 800;
    color: var(--hz-primary);
    line-height: 1.15;
    letter-spacing: -0.02em;
}

.herramientas-top-text p{
    margin: 0 0 20px;
    color: var(--hz-text-soft);
    font-size: 1rem;
    line-height: 1.8;
    max-width: 680px;
}

.herramientas-top-points{
    display: grid;
    gap: 12px;
}

.herramientas-top-point{
    display: flex;
    align-items: center;
    gap: 12px;
    background: var(--hz-primary-soft-2);
    border: 1px solid rgba(26, 58, 107, 0.08);
    border-radius: 14px;
    padding: 13px 16px;
}

.herramientas-top-point .icon{
    width: 36px;
    height: 36px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--hz-accent-light);
    color: var(--hz-primary);
    font-size: 1rem;
    font-weight: 800;
    flex-shrink: 0;
}

.herramientas-top-point span:last-child{
    color: #243041;
    font-weight: 600;
    font-size: 0.96rem;
}

.herramientas-top-visual{
    position: relative;
    min-height: 300px;
    border-radius: 24px;
    overflow: hidden;
    background: linear-gradient(135deg, #e8f0fb, #f7faff);
    border: 1px solid rgba(26, 58, 107, 0.08);
}

.herramientas-top-visual img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.herramientas-top-badge{
    position: absolute;
    top: 18px;
    left: 18px;
    background: rgba(255,255,255,0.94);
    color: var(--hz-primary);
    border: 1px solid rgba(26, 58, 107, 0.10);
    border-radius: 999px;
    padding: 8px 14px;
    font-size: 0.78rem;
    font-weight: 800;
    letter-spacing: 0.05em;
}

/* =========================
   BARRA DE MENÚ
========================= */
.herramientas-menu-bar{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 14px;
    background: linear-gradient(135deg, #163463, #1A3A6B, #2f5ea8);
    padding: 14px;
    border-radius: 22px;
    box-shadow: 0 16px 34px rgba(26, 58, 107, 0.18);
    margin-bottom: 14px;
}

.herramientas-menu-bar a{
    text-decoration: none;
}

.btn-herramientas-menu{
    border: 1px solid rgba(255,255,255,0.16);
    background: rgba(255,255,255,0.10);
    color: #fff;
    padding: 14px 20px;
    border-radius: 16px;
    font-size: 0.98rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s ease;
    backdrop-filter: blur(6px);
    min-width: 220px;
}

.btn-herramientas-menu:hover{
    background: rgba(255,255,255,0.18);
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.12);
}

.btn-herramientas-menu .icon{
    margin-right: 8px;
}

/* =========================
   TEXTO BAJO MENÚ
========================= */
.herramientas-menu-info{
    text-align: center;
    margin: 12px 0 26px;
}

.herramientas-menu-info p{
    margin: 0;
    color: #425168;
    font-size: 1rem;
    line-height: 1.7;
}

/* =========================
   CONTENIDO DINÁMICO
========================= */
.herramientas-content{
    min-height: 280px;
}

/* =========================
   ERRORES
========================= */
.herramientas-error{
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
   PORTADA INTERNA
========================= */
.herramientas-home{
    background: var(--hz-white);
    border: 1px solid rgba(0,0,0,0.06);
    border-radius: var(--hz-radius-xl);
    box-shadow: var(--hz-shadow);
    padding: 36px 30px;
    margin-top: 10px;
}

.herramientas-home-head{
    text-align: center;
    margin-bottom: 30px;
}

.herramientas-home-head .mini-chip{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 16px;
    border-radius: 999px;
    background: var(--hz-primary-soft);
    border: 1px solid rgba(26, 58, 107, 0.10);
    color: var(--hz-primary);
    font-size: 0.88rem;
    font-weight: 700;
    margin-bottom: 14px;
}

.herramientas-home-head h2{
    margin: 0 0 12px;
    font-size: clamp(1.7rem, 2.6vw, 2.4rem);
    font-weight: 800;
    color: var(--hz-primary);
    letter-spacing: -0.02em;
}

.herramientas-home-head p{
    max-width: 760px;
    margin: 0 auto;
    font-size: 1rem;
    line-height: 1.8;
    color: #5b6475;
}

.herramientas-home-grid{
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
    margin-bottom: 28px;
}

.herramienta-home-card{
    display: flex;
    flex-direction: column;
    gap: 12px;
    text-decoration: none;
    background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
    border: 1px solid rgba(31, 42, 138, 0.08);
    border-radius: 20px;
    padding: 24px 20px;
    box-shadow: 0 8px 22px rgba(15, 23, 42, 0.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.herramienta-home-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 16px 32px rgba(15, 23, 42, 0.10);
    border-color: rgba(26, 58, 107, 0.22);
}

.herramienta-home-icon{
    width: 62px;
    height: 62px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    font-size: 1.7rem;
    background: linear-gradient(135deg, #eef2ff, #dbe6ff);
    color: var(--hz-primary);
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.7);
}

.herramienta-home-card h3{
    margin: 0;
    font-size: 1.08rem;
    font-weight: 800;
    color: #0f172a;
}

.herramienta-home-card p{
    margin: 0;
    font-size: 0.94rem;
    line-height: 1.7;
    color: #5b6475;
    flex: 1;
}

.herramienta-home-card span{
    font-size: 0.92rem;
    font-weight: 800;
    color: var(--hz-primary);
}

.herramientas-home-help{
    background: linear-gradient(135deg, #f8fbff, #eef4ff);
    border: 1px solid rgba(31, 42, 138, 0.08);
    border-left: 4px solid var(--hz-accent);
    border-radius: 18px;
    padding: 18px 20px;
}

.herramientas-home-help h4{
    margin: 0 0 8px;
    font-size: 1rem;
    font-weight: 800;
    color: var(--hz-primary);
}

.herramientas-home-help p{
    margin: 0;
    color: #4b5563;
    line-height: 1.8;
    font-size: 0.95rem;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 1100px){
    .herramientas-top-grid{
        grid-template-columns: 1fr;
    }

    .herramientas-home-grid{
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px){
    .page-banner{
        min-height: 310px;
    }

    .herramientas-main{
        width: min(100% - 24px, 1320px);
    }

    .herramientas-menu-bar{
        padding: 12px;
    }

    .btn-herramientas-menu{
        width: 100%;
        text-align: center;
        min-width: unset;
    }

    .herramientas-menu-bar a{
        width: 100%;
    }

    .herramientas-top-card,
    .herramientas-home{
        padding: 22px 16px;
    }
}

@media (max-width: 640px){
    .herramientas-home-grid{
        grid-template-columns: 1fr;
    }

    .herramientas-home-head p,
    .herramientas-menu-info p{
        font-size: 0.95rem;
    }

    .page-banner-overlay h1{
        font-size: 1.95rem;
    }

    .page-banner-overlay p{
        font-size: 0.95rem;
    }
}
</style>

<!-- BANNER PROFESIONAL -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&q=80" alt="Herramientas Digitales">
    <div class="page-banner-overlay">
        <span class="page-banner-chip">Centro de soporte SDRIMSAC</span>
        <h1>Herramientas Digitales</h1>
        <p>Programas, drivers y recursos técnicos para instalar, configurar y mantener tu sistema funcionando correctamente.</p>
    </div>
</div>

<div class="herramientas-main">

    <!-- PORTADA SUPERIOR -->
    <div class="herramientas-top-card">
        <div class="herramientas-top-grid">
            <div class="herramientas-top-text">
                <h2>Todo en un solo lugar para una instalación más rápida y segura</h2>
                <p>
                    Accede a recursos preparados para facilitar la configuración de tu sistema.
                    Encuentra programas, drivers de impresión, utilitarios técnicos y paquetes completos
                    para dejar tu entorno listo de manera profesional.
                </p>

                <div class="herramientas-top-points">
                    <div class="herramientas-top-point">
                        <span class="icon">✓</span>
                        <span>Instalación más ordenada y profesional</span>
                    </div>
                    <div class="herramientas-top-point">
                        <span class="icon">✓</span>
                        <span>Acceso rápido a controladores y utilitarios</span>
                    </div>
                    <div class="herramientas-top-point">
                        <span class="icon">✓</span>
                        <span>Compatibilidad con impresoras y herramientas comunes</span>
                    </div>
                </div>
            </div>

            <div class="herramientas-top-visual">
                <span class="herramientas-top-badge">RECURSOS TÉCNICOS</span>
                <img src="assets/img/imgindex.jpg" alt="Soporte técnico SDRIMSAC">
            </div>
        </div>
    </div>

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
        <p>Selecciona una categoría para acceder rápidamente a las herramientas disponibles.</p>
    </div>

    <div class="herramientas-content">
    <?php
    $seccion = $_GET['seccion'] ?? null;
    $herramienta = $_GET['herramienta'] ?? null;

    if (!$seccion) {
        ?>
        <div class="herramientas-home">
            <div class="herramientas-home-head">
                <span class="mini-chip">Acceso rápido</span>
                <h2>Centro de herramientas técnicas</h2>
                <p>
                    Encuentra programas, drivers y utilitarios necesarios para instalar,
                    configurar y mantener tu sistema funcionando correctamente.
                </p>
            </div>

            <div class="herramientas-home-grid">
                <a href="herramientas.php?seccion=programas" class="herramienta-home-card">
                    <div class="herramienta-home-icon">💻</div>
                    <h3>Programas</h3>
                    <p>Instaladores, aplicaciones y utilitarios esenciales para el funcionamiento del sistema.</p>
                    <span>Ver categoría →</span>
                </a>

                <a href="herramientas.php?seccion=drivers_ticketera" class="herramienta-home-card">
                    <div class="herramienta-home-icon">🖨️</div>
                    <h3>Drivers Ticketera</h3>
                    <p>Controladores para impresoras térmicas y equipos de impresión compatibles.</p>
                    <span>Ver categoría →</span>
                </a>

                <a href="herramientas.php?seccion=sistema" class="herramienta-home-card">
                    <div class="herramienta-home-icon">⚙️</div>
                    <h3>Sistema</h3>
                    <p>Herramientas técnicas para configuración, soporte y mantenimiento del entorno.</p>
                    <span>Ver categoría →</span>
                </a>

                <a href="herramientas.php?seccion=driver_all_in_one" class="herramienta-home-card">
                    <div class="herramienta-home-icon">🖥️</div>
                    <h3>Driver All in One</h3>
                    <p>Paquetes completos para una instalación más rápida y centralizada.</p>
                    <span>Ver categoría →</span>
                </a>
            </div>

            <div class="herramientas-home-help">
                <h4>Recomendación</h4>
                <p>
                    Si no estás seguro de qué instalar primero, comienza por <strong>Programas</strong> o
                    <strong>Driver All in One</strong> para una configuración más rápida.
                </p>
            </div>
        </div>
        <?php
    } else if ($seccion && !$herramienta) {
        $menuFile = "herramientas/menus/{$seccion}.php";
        if (file_exists($menuFile)) {
            include $menuFile;
        } else {
            echo '<div class="herramientas-error">Sección no encontrada.</div>';
        }
    } else if ($seccion && $herramienta) {
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