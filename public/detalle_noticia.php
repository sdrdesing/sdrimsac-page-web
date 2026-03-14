<?php
include("includes/header.php");

// Obtener el ID de la noticia
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Noticias reales
$noticias = [
    1 => [
        "titulo" => "SUNAT posterga la obligación del SIRE para principales contribuyentes (enero 2026)",
        "contenido" => "
            <h3>¿Qué es el SIRE?</h3>
            <p>El Sistema Integrado de Registros Electrónicos (SIRE) es una plataforma de SUNAT para llevar el Registro de Ventas e Ingresos y el Registro de Compras de manera digital.</p>

            <h3>¿Por qué se postergó?</h3>
            <p>SUNAT decidió postergar la obligación para principales contribuyentes debido a la necesidad de adecuar sistemas y brindar mayor tiempo para capacitación.</p>

            <ul>
                <li>La nueva fecha de inicio es enero 2026.</li>
                <li>La medida busca evitar errores y facilitar la transición digital.</li>
            </ul>

            <h3>Contexto</h3>
            <p>El SIRE es parte de la transformación digital tributaria en Perú. Según la SUNAT, más de 10,000 empresas serán beneficiadas con la prórroga.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Capacitar al personal en el uso del SIRE.</li>
                <li>Actualizar sistemas contables.</li>
                <li>Consultar con asesores tributarios.</li>
            </ul>

            <blockquote>“La prórroga permitirá una mejor adaptación tecnológica y evitará sanciones por errores involuntarios.” — SUNAT</blockquote>

            <div class='detalle-links'>
                <h3>Enlaces útiles</h3>
                <a href='https://www.sunat.gob.pe/' target='_blank'>SUNAT Oficial</a>
                <a href='https://www.sunat.gob.pe/legislacion/' target='_blank'>Normas y legislación</a>
                <a href='https://www.sunat.gob.pe/sire/' target='_blank'>Guía SIRE</a>
            </div>
        ",
        "fecha" => "24 junio 2025",
        "img" => "https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80",
        "categoria" => "SUNAT",
        "resumen" => "La SUNAT postergó la obligación del SIRE para determinados principales contribuyentes, trasladando el inicio hasta enero de 2026."
    ],
    2 => [
        "titulo" => "¿Qué es un CPE y por qué es clave para tu negocio?",
        "contenido" => "
            <h3>¿Qué es un CPE?</h3>
            <p>El Comprobante de Pago Electrónico (CPE) es el documento que acredita la venta de bienes o servicios en formato digital.</p>

            <h3>Ventajas del CPE</h3>
            <ul>
                <li>Facilita la fiscalización y control tributario.</li>
                <li>Permite la emisión y almacenamiento digital.</li>
                <li>Reduce costos y tiempos de gestión.</li>
            </ul>

            <h3>Ejemplo real</h3>
            <p>Una empresa de alimentos que emite CPE puede automatizar su facturación y reducir errores.</p>

            <h3>¿Cómo validar un CPE?</h3>
            <p>Debes revisar que el sistema esté autorizado por SUNAT y que el documento cumpla con los requisitos legales.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Verifica el estado del CPE en SUNAT.</li>
                <li>Guarda copias digitales seguras.</li>
                <li>Consulta con tu proveedor de software.</li>
            </ul>

            <div class='detalle-links'>
                <h3>Recursos</h3>
                <a href='https://cpe.sunat.gob.pe/' target='_blank'>Consulta CPE SUNAT</a>
                <a href='https://www.sunat.gob.pe/cpe/manual' target='_blank'>Manual CPE</a>
            </div>
        ",
        "fecha" => "21 noviembre 2024",
        "img" => "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80",
        "categoria" => "Facturación",
        "resumen" => "Conoce qué es un CPE, por qué es clave para tu negocio y cómo mejora la gestión documental."
    ],
    3 => [
        "titulo" => "Cómo consultar la validez de una factura o boleta electrónica en SUNAT (paso a paso)",
        "contenido" => "
            <h3>Paso a paso para consultar validez</h3>
            <ol>
                <li>Ingresa a la web de SUNAT.</li>
                <li>Selecciona la opción de consulta de comprobantes electrónicos.</li>
                <li>Introduce el RUC, tipo de documento, serie, número, fecha e importe.</li>
                <li>Verifica el resultado y descarga el comprobante si es válido.</li>
            </ol>

            <h3>¿Por qué es importante?</h3>
            <p>Permite asegurar la autenticidad de los documentos y evitar fraudes.</p>

            <h3>Contexto</h3>
            <p>En Perú, la consulta de validez es obligatoria para auditorías y procesos de devolución.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Realiza la consulta periódicamente.</li>
                <li>Guarda los comprobantes válidos.</li>
                <li>Reporta cualquier inconsistencia a SUNAT.</li>
            </ul>

            <div class='detalle-links'>
                <h3>Recursos</h3>
                <a href='https://www.sunat.gob.pe/ol-ti-itconsulta/' target='_blank'>Consulta oficial SUNAT</a>
                <a href='https://www.sunat.gob.pe/faq' target='_blank'>Preguntas frecuentes SUNAT</a>
            </div>
        ",
        "fecha" => "Actualizado 2024 - 2025",
        "img" => "https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=1200&q=80",
        "categoria" => "Guía",
        "resumen" => "Aprende a verificar la validez de un comprobante electrónico con los datos oficiales de SUNAT."
    ],
    4 => [
        "titulo" => "OSE vs PSE: diferencias y cuál conviene para tu empresa",
        "contenido" => "
            <h3>¿Qué es OSE?</h3>
            <p>Operador de Servicios Electrónicos (OSE) es una entidad que valida los comprobantes electrónicos antes de enviarlos a SUNAT.</p>

            <h3>¿Qué es PSE?</h3>
            <p>Proveedor de Servicios Electrónicos (PSE) es quien brinda soluciones para emitir y gestionar CPE.</p>

            <ul>
                <li>OSE: Validación y constancia de SUNAT.</li>
                <li>PSE: Emisión, firma digital y seguridad.</li>
            </ul>

            <h3>Ejemplo real</h3>
            <p>Una empresa que emite más de 1000 comprobantes al mes puede beneficiarse de un OSE.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Evalúa el costo y soporte de cada opción.</li>
                <li>Consulta con tu contador.</li>
                <li>Lee experiencias de otros usuarios.</li>
            </ul>

            <div class='detalle-links'>
                <h3>Recursos</h3>
                <a href='https://ose.sunat.gob.pe/' target='_blank'>Más sobre OSE</a>
                <a href='https://www.sunat.gob.pe/pse/' target='_blank'>Más sobre PSE</a>
            </div>
        ",
        "fecha" => "25 septiembre 2025",
        "img" => "https://images.unsplash.com/photo-1556155092-490a1ba16284?w=1200&q=80",
        "categoria" => "Tecnología",
        "resumen" => "Descubre las diferencias entre OSE y PSE y cuál puede ajustarse mejor a las necesidades de tu empresa."
    ],
    5 => [
        "titulo" => "Validación de XML (UBL 2.1): cómo evitar rechazos antes de enviar a SUNAT",
        "contenido" => "
            <h3>¿Qué es UBL 2.1?</h3>
            <p>Es el estándar de estructura XML para facturas y boletas electrónicas en Perú.</p>

            <h3>¿Cómo evitar rechazos?</h3>
            <ul>
                <li>Revisar la estructura y campos obligatorios.</li>
                <li>Usar el servicio BETA de SUNAT para pruebas.</li>
                <li>Corregir errores antes de enviar el documento real.</li>
            </ul>

            <h3>Ejemplo real</h3>
            <p>Una empresa que envió facturas con campos incompletos tuvo que corregir y reemitir para evitar sanciones.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Consulta la guía técnica de SUNAT.</li>
                <li>Solicita asesoría si tienes dudas.</li>
            </ul>

            <div class='detalle-links'>
                <h3>Recursos</h3>
                <a href='https://www.sunat.gob.pe/guia-ubl/' target='_blank'>Guía UBL SUNAT</a>
                <a href='https://www.sunat.gob.pe/servicio-beta/' target='_blank'>Servicio BETA SUNAT</a>
            </div>
        ",
        "fecha" => "Guías técnicas vigentes",
        "img" => "https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=1200&q=80",
        "categoria" => "Técnico",
        "resumen" => "Aprende cómo validar XML UBL 2.1 y reducir errores antes del envío a SUNAT."
    ],
    6 => [
        "titulo" => "Verificar autenticidad e integridad de XML: herramienta oficial de SUNAT",
        "contenido" => "
            <h3>¿Por qué verificar el XML?</h3>
            <p>Garantiza que el documento electrónico no ha sido alterado y es válido ante SUNAT.</p>

            <h3>Ejemplo real</h3>
            <p>Un cliente detectó una alteración en el XML y pudo evitar un fraude gracias a la herramienta oficial.</p>

            <h3>Recomendaciones</h3>
            <ul>
                <li>Verifica todos los documentos antes de enviarlos.</li>
                <li>Guarda los XML validados.</li>
                <li>Consulta con SUNAT ante dudas.</li>
            </ul>

            <div class='detalle-links'>
                <h3>Recursos</h3>
                <a href='https://verificadorxml.sunat.gob.pe/' target='_blank'>Verificador XML SUNAT</a>
                <a href='https://www.sunat.gob.pe/xml/manual' target='_blank'>Manual XML SUNAT</a>
            </div>
        ",
        "fecha" => "Herramienta oficial",
        "img" => "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80",
        "categoria" => "Herramienta",
        "resumen" => "Conoce cómo validar autenticidad e integridad de XML con herramientas oficiales."
    ]
];

if (isset($noticias[$id])) {
    $noticia = $noticias[$id];

    $relacionadas = [];
    foreach ($noticias as $key => $item) {
        if ($key != $id && count($relacionadas) < 3) {
            $relacionadas[$key] = $item;
        }
    }

    echo '
    <style>
        :root{
            --dn-primary:#18376b;
            --dn-primary-2:#2f62d6;
            --dn-primary-dark:#0d2557;
            --dn-text:#0f172a;
            --dn-soft:#475569;
            --dn-muted:#64748b;
            --dn-bg:#f4f7fb;
            --dn-white:#ffffff;
            --dn-line:rgba(15,23,42,.08);
            --dn-shadow:0 10px 30px rgba(15,23,42,.08);
            --dn-shadow-hover:0 18px 40px rgba(15,23,42,.14);
            --dn-radius-xl:28px;
            --dn-radius-lg:22px;
            --dn-radius-md:16px;
        }

        body{
            background:var(--dn-bg);
        }

        .detalle-banner{
            position:relative;
            width:100%;
            min-height:360px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            background:#18376b;
        }

        .detalle-banner::before{
            content:"";
            position:absolute;
            inset:0;
            background:
                linear-gradient(135deg, rgba(9,34,86,.95), rgba(24,55,107,.93), rgba(47,98,214,.90));
        }

        .detalle-banner::after{
            content:"";
            position:absolute;
            inset:0;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.10), transparent 22%),
                radial-gradient(circle at 85% 30%, rgba(255,255,255,.08), transparent 20%),
                radial-gradient(circle at 70% 80%, rgba(255,255,255,.06), transparent 18%);
        }

        .detalle-banner-content{
            position:relative;
            z-index:2;
            text-align:center;
            color:#fff;
            max-width:1000px;
            padding:40px 20px;
        }

        .detalle-chip{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:10px 18px;
            border-radius:999px;
            background:rgba(255,255,255,.14);
            border:1px solid rgba(255,255,255,.22);
            font-size:.92rem;
            font-weight:700;
            margin-bottom:18px;
            backdrop-filter:blur(6px);
        }

        .detalle-banner-content h1{
            margin:0 0 12px;
            font-size:clamp(2.2rem,4vw,3.5rem);
            line-height:1.1;
            font-weight:800;
            letter-spacing:-.02em;
            color:#fff;
        }

        .detalle-banner-content p{
            margin:0 auto;
            max-width:760px;
            color:rgba(255,255,255,.92);
            font-size:1.05rem;
            line-height:1.8;
        }

        .detalle-wrapper{
            width:min(1280px, calc(100% - 40px));
            margin:-70px auto 70px;
            display:grid;
            grid-template-columns:minmax(0, 2fr) 340px;
            gap:30px;
            align-items:start;
            position:relative;
            z-index:3;
        }

        .detalle-main{
            background:#fff;
            border-radius:28px;
            padding:30px;
            box-shadow:0 18px 45px rgba(15,23,42,.10);
            border:1px solid rgba(255,255,255,.65);
        }

        .detalle-main img{
            width:100%;
            max-height:460px;
            object-fit:cover;
            border-radius:20px;
            display:block;
            margin-bottom:26px;
            box-shadow:0 12px 28px rgba(0,0,0,.08);
        }

        .detalle-meta{
            display:flex;
            flex-wrap:wrap;
            gap:12px;
            align-items:center;
            margin-bottom:18px;
            font-size:13px;
            font-weight:800;
            text-transform:uppercase;
            letter-spacing:.05em;
        }

        .detalle-categoria{
            color:var(--dn-primary);
            background:#eef3ff;
            padding:8px 14px;
            border-radius:999px;
        }

        .detalle-fecha{
            color:var(--dn-muted);
        }

        .detalle-main h2{
            font-size:clamp(2rem,4vw,3rem);
            line-height:1.14;
            margin:0 0 18px;
            color:var(--dn-primary-dark);
            font-weight:800;
            letter-spacing:-.02em;
        }

        .detalle-resumen{
            background:linear-gradient(180deg, #f8fbff, #eef3ff);
            border:1px solid #dfe8ff;
            border-radius:18px;
            padding:18px 20px;
            margin-bottom:26px;
            color:#334155;
            line-height:1.8;
            font-size:1rem;
        }

        .detalle-main h3,
        .detalle-main h4{
            color:var(--dn-primary);
            margin-top:28px;
            margin-bottom:12px;
            font-size:1.22rem;
            font-weight:800;
        }

        .detalle-main p,
        .detalle-main li{
            font-size:1rem;
            line-height:1.9;
            color:#334155;
        }

        .detalle-main ul,
        .detalle-main ol{
            padding-left:24px;
        }

        .detalle-main blockquote{
            margin:26px 0;
            padding:18px 20px;
            border-left:4px solid var(--dn-primary);
            background:#f7faff;
            border-radius:14px;
            color:#334155;
            font-style:italic;
            line-height:1.8;
        }

        .detalle-links{
            margin-top:26px;
            padding:22px;
            background:#f8fafc;
            border:1px solid var(--dn-line);
            border-radius:18px;
        }

        .detalle-links a{
            display:inline-block;
            margin:10px 10px 0 0;
            padding:10px 14px;
            border-radius:12px;
            background:#eef3ff;
            color:var(--dn-primary);
            text-decoration:none;
            font-weight:700;
            transition:.2s ease;
        }

        .detalle-links a:hover{
            background:var(--dn-primary);
            color:#fff;
        }

        .detalle-actions{
            display:flex;
            flex-wrap:wrap;
            gap:12px;
            margin-top:30px;
        }

        .detalle-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:12px 18px;
            border-radius:12px;
            text-decoration:none;
            font-weight:800;
            transition:.2s ease;
        }

        .detalle-btn-primary{
            background:linear-gradient(135deg, var(--dn-primary), var(--dn-primary-2));
            color:#fff;
            box-shadow:0 10px 24px rgba(24,55,107,.18);
        }

        .detalle-btn-secondary{
            background:#eef3ff;
            color:var(--dn-primary);
        }

        .detalle-btn:hover{
            transform:translateY(-2px);
        }

        .detalle-sidebar{
            display:flex;
            flex-direction:column;
            gap:18px;
            position:sticky;
            top:18px;
        }

        .sidebar-box{
            background:#fff;
            border-radius:22px;
            box-shadow:0 14px 34px rgba(15,23,42,.08);
            border:1px solid var(--dn-line);
            padding:22px 20px;
        }

        .sidebar-title{
            margin:0 0 14px;
            font-size:1.15rem;
            font-weight:800;
            color:var(--dn-primary-dark);
        }

        .sidebar-list{
            list-style:none;
            margin:0;
            padding:0;
            display:grid;
            gap:14px;
        }

        .sidebar-list li{
            border-bottom:1px solid rgba(15,23,42,.08);
            padding-bottom:14px;
        }

        .sidebar-list li:last-child{
            border-bottom:none;
            padding-bottom:0;
        }

        .sidebar-list a{
            text-decoration:none;
            color:#334155;
            font-weight:700;
            line-height:1.6;
            transition:.2s ease;
        }

        .sidebar-list a:hover{
            color:var(--dn-primary);
        }

        .sidebar-help{
            background:linear-gradient(135deg, #173a70, #244b85);
            color:#fff;
        }

        .sidebar-help .sidebar-title,
        .sidebar-help p{
            color:#fff;
        }

        .sidebar-help-btn{
            display:inline-flex;
            width:100%;
            justify-content:center;
            align-items:center;
            padding:12px 16px;
            border-radius:12px;
            background:#fff;
            color:var(--dn-primary);
            font-weight:800;
            text-decoration:none;
            margin-top:10px;
        }

        .detalle-relacionadas{
            width:min(1280px, calc(100% - 40px));
            margin:0 auto 90px;
        }

        .detalle-relacionadas h3{
            color:var(--dn-primary-dark);
            font-size:2rem;
            margin-bottom:24px;
            font-weight:800;
        }

        .rel-grid{
            display:grid;
            grid-template-columns:repeat(3, minmax(0,1fr));
            gap:24px;
        }

        .rel-card{
            background:#fff;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 12px 30px rgba(15,23,42,.08);
            border:1px solid var(--dn-line);
            transition:.25s ease;
        }

        .rel-card:hover{
            transform:translateY(-5px);
            box-shadow:var(--dn-shadow-hover);
        }

        .rel-card img{
            width:100%;
            height:210px;
            object-fit:cover;
            display:block;
        }

        .rel-body{
            padding:20px;
        }

        .rel-body h4{
            margin:0 0 10px;
            font-size:1.08rem;
            color:var(--dn-text);
            line-height:1.45;
            font-weight:800;
        }

        .rel-body p{
            margin:0 0 14px;
            color:var(--dn-soft);
            font-size:.95rem;
            line-height:1.75;
        }

        .rel-link{
            text-decoration:none;
            font-weight:800;
            color:var(--dn-primary);
        }

        .noticia-vacia{
            width:min(800px, calc(100% - 40px));
            margin:60px auto;
            background:#fff;
            border-radius:24px;
            padding:30px;
            box-shadow:var(--dn-shadow);
            text-align:center;
        }

        @media (max-width: 1024px){
            .detalle-wrapper{
                grid-template-columns:1fr;
                margin-top:-40px;
            }

            .detalle-sidebar{
                position:relative;
                top:0;
            }

            .rel-grid{
                grid-template-columns:1fr;
            }
        }

        @media (max-width: 768px){
            .detalle-banner{
                min-height:300px;
            }

            .detalle-banner-content h1{
                font-size:2rem;
            }

            .detalle-wrapper{
                width:min(100% - 24px, 1280px);
                margin-top:-30px;
            }

            .detalle-main{
                padding:20px;
            }

            .detalle-main h2{
                font-size:1.9rem;
            }
        }
    </style>';

    echo '
    <section class="detalle-banner">
        <div class="detalle-banner-content">
            <span class="detalle-chip">' . $noticia["categoria"] . '</span>
            <h1>' . $noticia["titulo"] . '</h1>
            <p>Noticias, actualizaciones y contenido útil sobre facturación electrónica, SUNAT y tecnología para empresas.</p>
        </div>
    </section>

    <div class="detalle-wrapper">
        <main class="detalle-main">
            <img src="' . $noticia["img"] . '" alt="Imagen noticia principal">

            <div class="detalle-meta">
                <span class="detalle-categoria">' . $noticia["categoria"] . '</span>
                <span class="detalle-fecha">Fecha: ' . $noticia["fecha"] . '</span>
            </div>

            <h2>' . $noticia["titulo"] . '</h2>

            <div class="detalle-resumen">
                <strong>Resumen:</strong> ' . $noticia["resumen"] . '
            </div>

            ' . preg_replace('/<div class=\'detalle-links\'>[\s\S]*?<\/div>/', '', $noticia["contenido"]) . '

            <div class="detalle-actions">
                <a href="blog.php" class="detalle-btn detalle-btn-secondary">← Volver al blog</a>
            </div>
        </main>

        <aside class="detalle-sidebar">
            <div class="sidebar-box">
                <h4 class="sidebar-title">Más noticias</h4>
                <ul class="sidebar-list">';
                    foreach ($noticias as $key => $item) {
                        if ($key != $id) {
                            echo '<li><a href="detalle_noticia.php?id=' . $key . '">' . $item["titulo"] . '</a></li>';
                        }
                    }
    echo '      </ul>
            </div>

            <div class="sidebar-box">
                <h4 class="sidebar-title">Resumen rápido</h4>
                <p style="margin:0;color:#475569;line-height:1.8;">Contenido actualizado sobre SUNAT, comprobantes electrónicos, validación de documentos y transformación digital para empresas.</p>
            </div>

            <!-- Se eliminó el bloque de ayuda -->
        </aside>
    </div>

    <section class="detalle-relacionadas">
        <h3>Artículos relacionados</h3>
        <div class="rel-grid">';
            foreach ($relacionadas as $key => $item) {
                echo '
                <article class="rel-card">
                    <img src="' . $item["img"] . '" alt="Imagen relacionada">
                    <div class="rel-body">
                        <h4>' . $item["titulo"] . '</h4>
                        <p>' . $item["resumen"] . '</p>
                        <a class="rel-link" href="detalle_noticia.php?id=' . $key . '">Leer artículo →</a>
                    </div>
                </article>';
            }
    echo '
        </div>
    </section>';
} else {
    echo '
    <style>
        .noticia-vacia{
            width:min(800px, calc(100% - 40px));
            margin:60px auto;
            background:#fff;
            border-radius:24px;
            padding:30px;
            box-shadow:0 10px 30px rgba(15,23,42,.08);
            text-align:center;
        }
        .detalle-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:12px 18px;
            border-radius:12px;
            text-decoration:none;
            font-weight:800;
            background:linear-gradient(135deg, #18376b, #2f62d6);
            color:#fff;
        }
    </style>
    <div class="noticia-vacia">
        <h2>Noticia no encontrada</h2>
        <p>La publicación que buscas no existe o fue movida.</p>
        <a href="blog.php" class="detalle-btn">Volver al blog</a>
    </div>';
}

include("includes/footer.php");
?>