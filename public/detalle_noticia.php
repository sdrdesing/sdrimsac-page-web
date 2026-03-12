<?php

include("includes/header.php");

// Obtener el ID de la noticia
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Noticias reales (puedes ampliar este array)
$noticias = [
    1 => [
        "titulo" => "SUNAT posterga la obligación del SIRE para principales contribuyentes (enero 2026)",
        "contenido" => "<h4>¿Qué es el SIRE?</h4>"
            . "El Sistema Integrado de Registros Electrónicos (SIRE) es una plataforma de SUNAT para llevar el Registro de Ventas e Ingresos y el Registro de Compras de manera digital.<br><br>"
            . "<h4>¿Por qué se postergó?</h4>"
            . "SUNAT decidió postergar la obligación para principales contribuyentes debido a la necesidad de adecuar sistemas y brindar mayor tiempo para capacitación.<br><br>"
            . "<ul><li>La nueva fecha de inicio es enero 2026.</li><li>La medida busca evitar errores y facilitar la transición digital.</li></ul>"
            . "<h4>Contexto</h4>"
            . "El SIRE es parte de la transformación digital tributaria en Perú. Según la SUNAT, más de 10,000 empresas serán beneficiadas con la prórroga.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Capacitar al personal en el uso del SIRE.</li><li>Actualizar sistemas contables.</li><li>Consultar con asesores tributarios.</li></ul>"
            . "<h4>Cita</h4>"
            . "<em>\"La prórroga permitirá una mejor adaptación tecnológica y evitará sanciones por errores involuntarios.\"</em> — SUNAT<br><br>"
            . "<h4>Enlaces útiles</h4>"
            . "<a href='https://www.sunat.gob.pe/'>SUNAT Oficial</a> | <a href='https://www.sunat.gob.pe/legislacion/'>Normas y legislación</a> | <a href='https://www.sunat.gob.pe/sire/'>Guía SIRE</a>",
        "fecha" => "junio 24, 2025",
        "img" => "https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80"
    ],
    2 => [
        "titulo" => "¿Qué es un CPE y por qué es clave para tu negocio?",
        "contenido" => "<h4>¿Qué es un CPE?</h4>"
            . "El Comprobante de Pago Electrónico (CPE) es el documento que acredita la venta de bienes o servicios en formato digital.<br><br>"
            . "<h4>Ventajas del CPE</h4>"
            . "<ul><li>Facilita la fiscalización y control tributario.</li><li>Permite la emisión y almacenamiento digital.</li><li>Reduce costos y tiempos de gestión.</li></ul>"
            . "<h4>Ejemplo real</h4>"
            . "Una empresa de alimentos que emite CPE puede automatizar su facturación y reducir errores.<br><br>"
            . "<h4>¿Cómo validar un CPE?</h4>"
            . "Debes revisar que el sistema esté autorizado por SUNAT y que el documento cumpla con los requisitos legales.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Verifica el estado del CPE en SUNAT.</li><li>Guarda copias digitales seguras.</li><li>Consulta con tu proveedor de software.</li></ul>"
            . "<h4>Recursos</h4>"
            . "<a href='https://cpe.sunat.gob.pe/'>Consulta CPE SUNAT</a> | <a href='https://www.sunat.gob.pe/cpe/manual'>Manual CPE</a>",
        "fecha" => "noviembre 21, 2024",
        "img" => "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80"
    ],
    3 => [
        "titulo" => "Cómo consultar la validez de una factura o boleta electrónica en SUNAT (paso a paso)",
        "contenido" => "<h4>Paso a paso para consultar validez</h4>"
            . "<ol><li>Ingresa a la web de SUNAT.</li><li>Selecciona la opción de consulta de comprobantes electrónicos.</li><li>Introduce el RUC, tipo de documento, serie, número, fecha e importe.</li><li>Verifica el resultado y descarga el comprobante si es válido.</li></ol>"
            . "<h4>¿Por qué es importante?</h4>"
            . "Permite asegurar la autenticidad de los documentos y evitar fraudes.<br><br>"
            . "<h4>Contexto</h4>"
            . "En Perú, la consulta de validez es obligatoria para auditorías y procesos de devolución.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Realiza la consulta periódicamente.</li><li>Guarda los comprobantes válidos.</li><li>Reporta cualquier inconsistencia a SUNAT.</li></ul>"
            . "<h4>Recursos</h4>"
            . "<a href='https://www.sunat.gob.pe/ol-ti-itconsulta/'>Consulta oficial SUNAT</a> | <a href='https://www.sunat.gob.pe/faq'>Preguntas frecuentes SUNAT</a>",
        "fecha" => "actualizado 2024 - 2025",
        "img" => "https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=1200&q=80"
    ],
    4 => [
        "titulo" => "OSE vs PSE: diferencias y cuál conviene para tu empresa",
        "contenido" => "<h4>¿Qué es OSE?</h4>"
            . "Operador de Servicios Electrónicos (OSE) es una entidad que valida los comprobantes electrónicos antes de enviarlos a SUNAT.<br><br>"
            . "<h4>¿Qué es PSE?</h4>"
            . "Proveedor de Servicios Electrónicos (PSE) es quien brinda soluciones para emitir y gestionar CPE.<br><br>"
            . "<ul><li>OSE: Validación y constancia de SUNAT.</li><li>PSE: Emisión, firma digital y seguridad.</li></ul>"
            . "<h4>Ejemplo real</h4>"
            . "Una empresa que emite más de 1000 comprobantes al mes puede beneficiarse de un OSE.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Evalúa el costo y soporte de cada opción.</li><li>Consulta con tu contador.</li><li>Lee experiencias de otros usuarios.</li></ul>"
            . "<h4>Recursos</h4>"
            . "<a href='https://ose.sunat.gob.pe/'>Más sobre OSE</a> | <a href='https://www.sunat.gob.pe/pse/'>Más sobre PSE</a>",
        "fecha" => "septiembre 25, 2025",
        "img" => "https://images.unsplash.com/photo-1556155092-490a1ba16284?w=1200&q=80"
    ],
    5 => [
        "titulo" => "Validación de XML (UBL 2.1): cómo evitar rechazos antes de enviar a SUNAT",
        "contenido" => "<h4>¿Qué es UBL 2.1?</h4>"
            . "Es el estándar de estructura XML para facturas y boletas electrónicas en Perú.<br><br>"
            . "<h4>¿Cómo evitar rechazos?</h4>"
            . "<ul><li>Revisar la estructura y campos obligatorios.</li><li>Usar el servicio BETA de SUNAT para pruebas.</li><li>Corregir errores antes de enviar el documento real.</li></ul>"
            . "<h4>Ejemplo real</h4>"
            . "Una empresa que envió facturas con campos incompletos tuvo que corregir y reemitir para evitar sanciones.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Consulta la guía técnica de SUNAT.</li><li>Solicita asesoría si tienes dudas.</li></ul>"
            . "<h4>Recursos</h4>"
            . "<a href='https://www.sunat.gob.pe/guia-ubl/'>Guía UBL SUNAT</a> | <a href='https://www.sunat.gob.pe/servicio-beta/'>Servicio BETA SUNAT</a>",
        "fecha" => "guías técnicas vigentes",
        "img" => "https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=1200&q=80"
    ],
    6 => [
        "titulo" => "Verificar autenticidad e integridad de XML: herramienta oficial de SUNAT",
        "contenido" => "<h4>¿Por qué verificar el XML?</h4>"
            . "Garantiza que el documento electrónico no ha sido alterado y es válido ante SUNAT.<br><br>"
            . "<h4>Ejemplo real</h4>"
            . "Un cliente detectó una alteración en el XML y pudo evitar un fraude gracias a la herramienta oficial.<br><br>"
            . "<h4>Recomendaciones</h4>"
            . "<ul><li>Verifica todos los documentos antes de enviarlos.</li><li>Guarda los XML validados.</li><li>Consulta con SUNAT ante dudas.</li></ul>"
            . "<h4>Recursos</h4>"
            . "<a href='https://verificadorxml.sunat.gob.pe/'>Verificador XML SUNAT</a> | <a href='https://www.sunat.gob.pe/xml/manual'>Manual XML SUNAT</a>",
        "fecha" => "herramienta oficial",
        "img" => "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80"
    ]
];

if (isset($noticias[$id])) {
    $noticia = $noticias[$id];
    echo '<style>
        .detalle-noticia {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            padding: 32px 24px;
            text-align: left;
        }
        .detalle-noticia img {
            display: block;
            margin: 0 auto 24px auto;
            width: 320px;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.07);
        }
        .detalle-noticia h2 {
            font-size: 2rem;
            margin-bottom: 16px;
            color: #1a237e;
        }
        .detalle-noticia .fecha {
            color: #607d8b;
            font-size: 1rem;
            margin-bottom: 18px;
        }
        .detalle-noticia p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #333;
        }
    </style>';
    echo '<div class="detalle-noticia">';
    echo '<img src="' . $noticia["img"] . '" alt="Imagen noticia">';
    echo '<h2>' . $noticia["titulo"] . '</h2>';
    echo '<div class="fecha"><strong>Fecha:</strong> ' . $noticia["fecha"] . '</div>';
    echo $noticia["contenido"];
    echo '</div>';
} else {
    echo '<p>Noticia no encontrada.</p>';
}

include("includes/footer.php");
 