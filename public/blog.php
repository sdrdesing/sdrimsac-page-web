<link rel="stylesheet" href="assets/css/blog.css">

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog - SDRIMSAC</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <?php include(__DIR__ . '/../includes/header.php'); ?>

    <!-- BANNER -->
    <div class="page-banner">
        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Servicios SDRIM">
        <div class="page-banner-overlay">
            <h1>Blog</h1>
            <p>Soluciones integrales de facturación electrónica para tu empresa</p>
        </div>
    </div>

    <!-- SECCIÓN BLOG (contenido actualizado + diseño tipo imagen) -->
    <section class="blog-section">
        <div class="blog-layout">

            <!-- LISTADO -->
            <div class="blog-grid">

                <!-- Card 1 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80" alt="SIRE SUNAT - Registros electrónicos">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            SUNAT posterga la obligación del SIRE para principales contribuyentes (enero 2026)
                        </h3>

                        <p class="post-excerpt">
                            La SUNAT postergó la oportunidad de llevar el Registro de Ventas e Ingresos y el Registro de Compras
                            a través del SIRE para determinados principales contribuyentes, moviendo el inicio hasta el periodo enero 2026.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>junio 24, 2025</span>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80" alt="CPE - Comprobante de pago electrónico">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            ¿Qué es un CPE y por qué es clave para tu negocio?
                        </h3>

                        <p class="post-excerpt">
                            Un Comprobante de Pago Electrónico (CPE) acredita la venta de bienes o servicios y se emite con un sistema
                            informático autorizado. Conoce cómo se valida y qué debes revisar para evitar observaciones.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>noviembre 21, 2024</span>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=1200&q=80" alt="Consulta validez CPE SUNAT">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            Cómo consultar la validez de una factura o boleta electrónica en SUNAT (paso a paso)
                        </h3>

                        <p class="post-excerpt">
                            SUNAT ofrece una consulta oficial para verificar la validez de un comprobante electrónico usando datos del CPE
                            (RUC, tipo, serie-número, fecha e importe). Ideal para control interno y atención al cliente.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>actualizado 2024 - 2025</span>
                    </div>
                </article>

                <!-- Card 4 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?w=1200&q=80" alt="OSE y PSE SUNAT">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            OSE vs PSE: diferencias y cuál conviene para tu empresa
                        </h3>

                        <p class="post-excerpt">
                            En el modelo CPE de Perú, el OSE valida comprobantes y remite información a SUNAT con constancias.
                            El PSE, por su parte, brinda soluciones para emitir y gestionar CPE con firma digital y seguridad.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>septiembre 25, 2025</span>
                    </div>
                </article>

                <!-- Card 5 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=1200&q=80" alt="Validación XML UBL 2.1">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            Validación de XML (UBL 2.1): cómo evitar rechazos antes de enviar a SUNAT
                        </h3>

                        <p class="post-excerpt">
                            SUNAT publica guías técnicas UBL 2.1 para la estructura XML de facturas y boletas. Además existe un servicio
                            BETA para pruebas de estructura XML (no valida consistencia de datos). Úsalo para reducir rechazos.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>guías técnicas vigentes</span>
                    </div>
                </article>

                <!-- Card 6 -->
                <article class="post-card">
                    <div class="post-media">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80" alt="Verificación de XML SUNAT">
                        <span class="post-badge">NOTICIA</span>
                    </div>

                    <div class="post-body">
                        <div class="post-author">
                            <span class="author-avatar" aria-hidden="true"></span>
                        </div>

                        <h3 class="post-title">
                            Verificar autenticidad e integridad de XML: herramienta oficial de SUNAT
                        </h3>

                        <p class="post-excerpt">
                            SUNAT permite verificar la autenticidad e integridad del archivo digital (XML) de facturas, boletas y otros
                            documentos emitidos electrónicamente. Recomendado para auditoría y soporte al cliente.
                        </p>

                        <a href="#" class="post-link">LEER MÁS...</a>
                    </div>

                    <div class="post-footer">
                        <span>herramienta oficial</span>
                    </div>
                </article>

            </div>

            <!-- SIDEBAR -->
            <aside class="blog-sidebar">
                <div class="sidebar-box">
                    <h4 class="sidebar-title">Categorías</h4>
                    <ul class="sidebar-list">
                        <li><a href="#" class="sidebar-link active">Noticia</a></li>
                        <li><a href="#" class="sidebar-link">SUNAT</a></li>
                        <li><a href="#" class="sidebar-link">Guías técnicas</a></li>
                        <li><a href="#" class="sidebar-link">Tutorial</a></li>
                        <li><a href="#" class="sidebar-link">Tecnología</a></li>
                    </ul>
                </div>
            </aside>

        </div>
    </section>

    <?php include(__DIR__ . '/../includes/social.php'); ?>
    <?php include(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>

<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Servicios SDRIM">
    <div class="page-banner-overlay">
        <h1>Blog</h1>
        <p>Soluciones integrales de facturación electrónica para tu empresa</p>
    </div>
</div>


<!-- SECCIÓN ADICIONAL VISUAL - NO MODIFICA EL CÓDIGO ORIGINAL -->
<!-- SECCIÓN BLOG (contenido actualizado + diseño tipo imagen) -->
<section class="blog-section">
    <div class="blog-layout">

        <!-- LISTADO -->
        <div class="blog-grid">

            <!-- Card 1 -->
            <article class="post-card">
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80" alt="SIRE SUNAT - Registros electrónicos">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        SUNAT posterga la obligación del SIRE para principales contribuyentes (enero 2026)
                    </h3>

                    <p class="post-excerpt">
                        La SUNAT postergó la oportunidad de llevar el Registro de Ventas e Ingresos y el Registro de Compras
                        a través del SIRE para determinados principales contribuyentes, moviendo el inicio hasta el periodo enero 2026.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>junio 24, 2025</span>
                </div>
            </article>

            <!-- Card 2 -->
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80" alt="CPE - Comprobante de pago electrónico">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        ¿Qué es un CPE y por qué es clave para tu negocio?
                    </h3>

                    <p class="post-excerpt">
                        Un Comprobante de Pago Electrónico (CPE) acredita la venta de bienes o servicios y se emite con un sistema
                        informático autorizado. Conoce cómo se valida y qué debes revisar para evitar observaciones.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>noviembre 21, 2024</span>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="post-card">
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=1200&q=80" alt="Consulta validez CPE SUNAT">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        Cómo consultar la validez de una factura o boleta electrónica en SUNAT (paso a paso)
                    </h3>

                    <p class="post-excerpt">
                        SUNAT ofrece una consulta oficial para verificar la validez de un comprobante electrónico usando datos del CPE
                        (RUC, tipo, serie-número, fecha e importe). Ideal para control interno y atención al cliente.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>actualizado 2024 - 2025</span>
                </div>
            </article>

            <!-- Card 4 -->
            <article class="post-card">
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?w=1200&q=80" alt="OSE y PSE SUNAT">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        OSE vs PSE: diferencias y cuál conviene para tu empresa
                    </h3>

                    <p class="post-excerpt">
                        En el modelo CPE de Perú, el OSE valida comprobantes y remite información a SUNAT con constancias.
                        El PSE, por su parte, brinda soluciones para emitir y gestionar CPE con firma digital y seguridad.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>septiembre 25, 2025</span>
                </div>
            </article>

            <!-- Card 5 -->
            <article class="post-card">
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=1200&q=80" alt="Validación XML UBL 2.1">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        Validación de XML (UBL 2.1): cómo evitar rechazos antes de enviar a SUNAT
                    </h3>

                    <p class="post-excerpt">
                        SUNAT publica guías técnicas UBL 2.1 para la estructura XML de facturas y boletas. Además existe un servicio
                        BETA para pruebas de estructura XML (no valida consistencia de datos). Úsalo para reducir rechazos.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>guías técnicas vigentes</span>
                </div>
            </article>

            <!-- Card 6 -->
            <article class="post-card">
                <div class="post-media">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80" alt="Verificación de XML SUNAT">
                    <span class="post-badge">NOTICIA</span>
                </div>

                <div class="post-body">
                    <div class="post-author">
                        <span class="author-avatar" aria-hidden="true"></span>
                    </div>

                    <h3 class="post-title">
                        Verificar autenticidad e integridad de XML: herramienta oficial de SUNAT
                    </h3>

                    <p class="post-excerpt">
                        SUNAT permite verificar la autenticidad e integridad del archivo digital (XML) de facturas, boletas y otros
                        documentos emitidos electrónicamente. Recomendado para auditoría y soporte al cliente.
                    </p>

                    <a href="#" class="post-link">LEER MÁS...</a>
                </div>

                <div class="post-footer">
                    <span>herramienta oficial</span>
                </div>
            </article>

        </div>

        <!-- SIDEBAR -->
        <aside class="blog-sidebar">
            <div class="sidebar-box">
                <h4 class="sidebar-title">Categorías</h4>
                <ul class="sidebar-list">
                    <li><a href="#" class="sidebar-link active">Noticia</a></li>
                    <li><a href="#" class="sidebar-link">SUNAT</a></li>
                    <li><a href="#" class="sidebar-link">Guías técnicas</a></li>
                    <li><a href="#" class="sidebar-link">Tutorial</a></li>
                    <li><a href="#" class="sidebar-link">Tecnología</a></li>
                </ul>
            </div>
        </aside>

    </div>
</section>

<?php include(__DIR__ . '/../includes/social.php'); ?>
<?php include(__DIR__ . '/../includes/footer.php'); ?>