-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2026 a las 22:41:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdrimsac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 1,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `session_id` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `usuario_id`, `id_producto`, `nombre_producto`, `precio`, `imagen`, `cantidad`, `fecha_agregado`, `id_usuario`, `session_id`) VALUES
(272, 16, 64, ' Lectores de código de barra / Lector de código de barras 1D y 2D inalámbrico con soporte – VLA-1100', 250.00, 'assets/img/Lector-de-codigo-de-barras-1D-y-2D-inalambrico-con-soporte-VLA-1100DW-300x300.png', 1, '2026-03-10 21:24:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_noticias`
--

CREATE TABLE `comentarios_noticias` (
  `id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `codigo_compra` varchar(32) NOT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `estado` enum('pendiente','validada','rechazada') DEFAULT 'pendiente',
  `notificado` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT 0.00,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `whatsapp_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `whatsapp_url`) VALUES
(1, 'https://sdrimsac.com/nosotros/'),
(2, 'http://localhost/sdrimsac-page-web/public/admin/administracion.php?seccion=configuracion'),
(3, 'http://localhost/sdrimsac-page-web/public/admin/administracion.php?seccion=configuracion'),
(4, 'http://localhost/sdrimsac-page-web/public/admin/administracion.php?seccion=configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leads_contacto`
--

CREATE TABLE `leads_contacto` (
  `id` int(11) NOT NULL,
  `tipo_doc` enum('DNI','RUC') NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `nombres` varchar(120) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `razon_social` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `api_estado` varchar(30) DEFAULT NULL,
  `api_raw` longtext DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL,
  `contenido` text DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `resumen`, `contenido`, `imagen`, `fecha`) VALUES
(1, 'Nueva funcionalidad en SDRIMSAC', 'Descubre la nueva herramienta de facturación electrónica que agiliza tus procesos.', NULL, 'https://mifact.net/wp-content/uploads/2025/05/punto-de-venta-mifact.png', '2026-03-05 11:46:14'),
(2, 'Actualización de seguridad', 'Mejoramos la protección de tus datos con cifrado avanzado.', NULL, 'https://img.innovaciondigital360.com/wp-content/uploads/2022/09/09151410/cifrado.jpg', '2026-03-05 11:46:14'),
(3, 'Evento de capacitación', 'Participa en nuestro webinar gratuito sobre facturación digital.', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSFnNMz-2Q3tZl5pjmlZBwghYNMw0gzX3pLA&s', '2026-03-05 11:46:14'),
(4, 'SUNAT publica nueva normativa de facturación electrónica', 'La SUNAT anunció cambios en la emisión de comprobantes electrónicos para 2026.', NULL, 'https://elcomercio.pe/resizer/j1kiqm9zcYXYAy-GiSHyPc68lhI=/980x528/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/PYHKDADK2VG5RKONEW3XRARP4Y.jpg', '2026-03-05 12:13:57'),
(5, 'Empresas peruanas aceleran la digitalización', 'El 95% de las empresas ya emiten comprobantes electrónicos, según reporte oficial.', NULL, 'https://www.peruweek.pe/wp-content/uploads/2019/03/comprobantes-electr%C3%B3nicos.png', '2026-03-05 12:13:57'),
(6, 'Webinar SUNAT: Cambios en la facturación electrónica', 'Expertos explican los nuevos requisitos y cómo afectan a las empresas peruanas.', NULL, 'https://www.esan.edu.pe/images/blog/20220527/8HD4kM.png', '2026-03-05 12:13:57'),
(7, 'Facturación electrónica: Beneficios para PYMEs', 'La digitalización permite mayor control, ahorro y acceso a financiamiento.', NULL, 'https://idbinvest.org/sites/default/files/styles/size936x656/public/2023-12/bancos_0.jpg.webp?itok=ksdlUy_x', '2026-03-05 12:13:57'),
(8, 'SUNAT lanza app móvil para emitir facturas electrónicas', 'La nueva aplicación permite emitir comprobantes desde cualquier dispositivo móvil.', NULL, 'https://mifact.net/wp-content/uploads/2025/03/home-mifact-1-1024x679.png', '2026-03-05 12:13:57'),
(9, 'SUNAT: Nueva plataforma digital para facturación electrónica', 'La SUNAT lanzó una nueva plataforma que facilita la emisión de comprobantes electrónicos para todos los contribuyentes.', NULL, 'https://lacamara.pe/wp-content/uploads/2023/08/FOTO-1.jpg', '2026-03-05 12:16:06'),
(10, 'Perú avanza en la digitalización de la facturación', 'El país se posiciona como líder en Latinoamérica en la adopción de facturación electrónica.', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4oaTLEos1WDbXhliVCZxaRAvzU7NtoaRzBA&s', '2026-03-05 12:16:06'),
(11, 'SUNAT ofrece capacitaciones gratuitas sobre facturación digital', 'Los cursos online buscan ayudar a empresas y emprendedores a adaptarse a la nueva normativa.', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu6dPiARemTdmCobgN1936bBHv3W2if9XvGQ&s', '2026-03-05 12:16:06'),
(12, 'PYMEs peruanas reducen costos con facturación electrónica', 'La digitalización de comprobantes permite mayor eficiencia y ahorro en la gestión empresarial.', NULL, 'https://www.emprenderalia.com/wp-content/uploads/digitalizacion-documentos.jpg', '2026-03-05 12:16:06'),
(13, 'Nueva app móvil para emitir facturas electrónicas', 'La SUNAT presentó una aplicación que permite emitir comprobantes desde cualquier dispositivo móvil.', NULL, 'https://www.isiore.com.pe/wp-content/uploads/2021/08/022802_904685.jpg', '2026-03-05 12:16:06'),
(14, 'SUNAT amplía plazos para la adopción de facturación electrónica', 'Las microempresas tendrán más tiempo para adaptarse a la nueva normativa digital.', NULL, 'https://www.esan.edu.pe/images/blog/20250123/fY7sBd.png', '2026-03-05 12:16:06'),
(15, 'Facturación electrónica: Tendencias para 2026', 'La automatización y la integración con sistemas contables marcan el futuro de la facturación digital.', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYfHhDxT4PRGN261nTeqLVC-g1qzgBzdK3YA&s', '2026-03-05 12:16:06'),
(16, 'SUNAT: Nueva plataforma digital para facturación electrónica', 'La SUNAT lanzó una nueva plataforma que facilita la emisión de comprobantes electrónicos para todos los contribuyentes.', NULL, 'https://imgmedia.larepublica.pe/1000x590/larepublica/original/2025/02/06/67a4f3c18d24644cf626927e.webp', '2026-03-05 12:16:39'),
(17, 'Perú avanza en la digitalización de la facturación', 'El país se posiciona como líder en Latinoamérica en la adopción de facturación electrónica.', NULL, 'https://www.inteligente.pe/baner/software-de-gestion-integrado.jpg', '2026-03-05 12:16:39'),
(18, 'SUNAT ofrece capacitaciones gratuitas sobre facturación digital', 'Los cursos online buscan ayudar a empresas y emprendedores a adaptarse a la nueva normativa.', NULL, 'https://gestion.pe/resizer/szwipZSGWhTr06hKly71t40HMtE=/1200x900/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/47AXRYSTKRHQDNFEL5IXMFRCWI.jpg', '2026-03-05 12:16:39'),
(19, 'PYMEs peruanas reducen costos con facturación electrónica', 'La digitalización de comprobantes permite mayor eficiencia y ahorro en la gestión empresarial.', NULL, 'https://welcome.atlasgov.com/static/9a23dad564bea1836af85fca28f0d7e7/Digitalizacion-de-documentos-en-las-empresas-en-que-consiste.webp', '2026-03-05 12:16:39'),
(20, 'Nueva app móvil para emitir facturas electrónicas', 'La SUNAT presentó una aplicación que permite emitir comprobantes desde cualquier dispositivo móvil.', NULL, 'https://facturaperu.com.pe/wp-content/uploads/2023/03/celularmcokup2-copia-scaled.jpg', '2026-03-05 12:16:39'),
(21, 'SUNAT amplía plazos para la adopción de facturación electrónica', 'Las microempresas tendrán más tiempo para adaptarse a la nueva normativa digital.', NULL, 'https://s3.noticiastrabajo.huffingtonpost.es/cdn/posts/45329/registro-horario-digital-facturacion-electronica-240169-1200-675.jpg', '2026-03-05 12:16:39'),
(22, 'Facturación electrónica: Tendencias para 2026', 'La automatización y la integración con sistemas contables marcan el futuro de la facturación digital.', NULL, 'https://media.licdn.com/dms/image/v2/D4E12AQG6ue24Cqda-Q/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1672266194316?e=2147483647&v=beta&t=Xueqz9aQmyzIiukm5oy5F6QP2hcccpwpxU2OPGyKzyU', '2026-03-05 12:16:39'),
(23, 'SUNAT amplía plazos para la adopción de facturación electrónica', 'Las microempresas tendrán más tiempo para adaptarse a la nueva normativa digital.', 'La SUNAT ha establecido, a través de la Resolución de Superintendencia N.º 000003-2023/SUNAT, la ampliación del plazo para el envío de facturas electrónicas y notas de crédito/débito vinculadas a 3 días calendario, contados desde el día siguiente de su emisión. Esta medida busca facilitar a los emisores electrónicos la validación y transmisión de los comprobantes, ajustándose a la realidad operativa del sistema', 'https://www.businessempresarial.com.pe/wp-content/uploads/2023/07/Mercaderia-Traslado-III.jpg', '2026-03-05 12:16:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `codigo_compra` varchar(32) NOT NULL,
  `metodo_pago` varchar(60) NOT NULL,
  `recibo` varchar(64) NOT NULL,
  `leida` tinyint(1) DEFAULT 0,
  `fecha` datetime DEFAULT current_timestamp(),
  `tipo` varchar(32) DEFAULT NULL,
  `codigo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `cliente` varchar(150) DEFAULT NULL,
  `metodo` varchar(60) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `codigo_pago` varchar(64) DEFAULT NULL,
  `metodo` varchar(60) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `vistas` int(11) DEFAULT 0,
  `vendidos` int(11) DEFAULT 0,
  `favoritos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `views`, `vistas`, `vendidos`, `favoritos`) VALUES
(10, 'La All In One Villacorp 23.8″ FHD IPS ', 'All In One Villacorp 23.8″ FHD IPS Corei3 8GB, 256BG SSD M.2 -12va Generación', 320.00, 5, '', 0, 0, 0, 0),
(11, '	Caja de 20 Rollos Papel Térmico 80mmX80mm – Contómetros', '', 110.00, 3, 'assets/img/productos_imagenes_5_XgiPk.jpg', 0, 0, 0, 0),
(12, '	Caja de 50 Rollos Papel Térmico de 80mmX80mm – Contómetros', '', 270.00, 1, 'assets/img/productos_imagenes_5_XgiPk.jpg', 0, 0, 0, 0),
(13, '	Gaveta de monedas y billetes KR330 con interfaz RJ11 – VILLACORP', 'La Gaveta de monedas y billetes KR330 de VILLACORP es perfecta para el manejo de efectivo en comercios, gracias a su interfaz RJ11 que facilita la conexión a sistemas de punto de venta. Con compartimentos bien organizados para monedas y billetes, garantiza una gestión eficiente y segura del dinero. Su diseño compacto y duradero la convierte en una opción ideal para cualquier negocio.', 240.00, 2, '', 0, 0, 0, 0),
(14, '	Caja de 20 Rollos Papel Térmico de 58X40mm – Contómetros', 'Esta caja contiene 20 rollos de papel térmico de 58×40 mm, ideal para contómetros y sistemas de impresión térmica. Su diseño asegura impresiones nítidas y de alta calidad, perfectas para registros precisos y eficientes. Ideal para entornos comerciales y de servicios, garantiza un rendimiento confiable y duradero.', 75.00, 6, '', 0, 0, 0, 0),
(15, '	Impresora térmica de etiquetas 100mm – interfaz USB', '', 600.00, 4, 'https://casemotions.pe/wp-content/uploads/2024/07/N14_000.jpg', 0, 0, 0, 0),
(16, '	Impresora térmica de etiquetas 100mm – interfaz USB+LAN/RED/ETHERNET + Soporte para rollos de etiqu', 'Especificaciones:\r\nMarca: VILLACORP\r\nModelo: ZY910\r\nGarantía: 1 año\r\nCorte de papel: Desgarro manual\r\nVelocidad de impresión: 152mm/s\r\nEstado: nuevo\r\nInterfaz: USB\r\nCampos de aplicación: Restaurant, Supermercado, Venta al por menor y mayor, Almacén, Logística, Biblioteca, Farmacia, Bancos, Minimarket, Grifos y demás puntos de venta', 600.00, 5, '', 0, 0, 0, 0),
(17, '	Impresora térmica de etiquetas 80mm – interfaz USB', 'Importante:\r\nPapel con sensor de luz automático, impresión precisa\r\nSDRAM de 8 MB, memoria FLASH de 8 MB\r\nSoporte externo opcional para soportar rollos de papel grandes\r\nAncho de etiqueta ajustable 20 mm-85 mm', 500.00, 3, '', 0, 0, 0, 0),
(18, 'Lector de código de barras 1D y 2D inalámbrico con soporte – VLA-1100DW', 'Inicio / Lectores de código de barra / Lector Portátil de código de barras 1D y QR 2D + Bluetooth – VLA-3200DB\r\nS/ 250.00\r\n\r\nEl lector portátil de código de barras VLA-3200DB es compatible con códigos 1D y QR 2D, y cuenta con conectividad Bluetooth para una fácil sincronización con dispositivos móviles. Su diseño ergonómico permite un uso cómodo y eficiente, ideal para entornos de venta y gestión de inventarios. Su portabilidad y rendimiento garantizan una lectura rápida y precisa en cualquier lugar.', 250.00, 5, 'assets/img/large-lector21678310386.png', 0, 0, 0, 0),
(19, '	Lector de código de barras Bluetooth 1D y 2D inalámbrico con soporte – VLA-1100DB', 'Características:\r\nBluetooth/2,4G/modo con cable, 3 modos para la opción.\r\nAdmite la lectura de códigos de barras desde la pantalla.\r\nProcesador ARM de 32 bits y velocidad de escaneo de 500 escaneos/seg.\r\nPotente capacidad de decodificación, escaneo rápido de códigos de barras 1D/2D.\r\nAdmite dispositivo portátil/continuo/autoinducción, 3 modos para la opción\r\nSoporte para teléfonos inteligentes/tabletas/computadoras; Compatible para Windows/Android/IOS.\r\nBatería incorporada de 1800 mAh, puede admitir 20 horas de escaneo continuo y 2 meses en espera después de 4 horas de carga completa.\r\nAdmite activar o desactivar el sonido, ocultar/agregar prefijos/sufijos personalizados, eliminar caracteres, agregar teclas de teclado (TAB, CR&LF, etc.)\r\nCampos de aplicación: Restaurant, Supermercado, Venta al por menor y mayor, Almacén, Logística, Biblioteca, Farmacia, Bancos, Minimarket, Grifos y demás puntos de venta.', 280.00, 8, 'assets/img/imageUrl_1.jpg', 0, 0, 0, 1),
(20, 'Lector de escritorio omnidireccional de código de barras 1D y QR 2D – VLA-9200D', '\r\nEl lector de escritorio omnidireccional VLA-9200D es compatible con códigos de barras 1D y QR 2D, ofreciendo una rápida y precisa lectura. Su diseño compacto y fácil de usar lo hace ideal para entornos comerciales y de retail. Perfecto para optimizar procesos de venta y gestión de inventarios, garantiza eficiencia en cada escaneo.', 330.00, 5, 'assets/img/lector de escritorio.jpg', 0, 0, 0, 0),
(21, 'Lector Portátil de código de barras 1D y QR 2D + Bluetooth – VLA-3200DB', '', 250.00, 4, 'assets/img/lector de codigo.webp', 0, 0, 1, 0),
(39, 'Impresoras de Etiquetas / Impresora térmica de etiquetas 100mm – interfaz USB', 'Especificaciones:\r\nMarca: VILLACORP\r\nModelo: ZY910\r\nGarantía: 1 año\r\nCorte de papel: Desgarro manual\r\nVelocidad de impresión: 152mm/s\r\nEstado: nuevo\r\nInterfaz: USB\r\nCampos de aplicación: Restaurant, Supermercado, Venta al por menor y mayor, Almacén, Logística, Biblioteca, Farmacia, Bancos, Minimarket, Grifos y demás puntos de venta', 600.00, 3, 'assets/img/Impresora-termica.png', 0, 0, 0, 0),
(40, ' Impresoras de Etiquetas / Impresora térmica de etiquetas 100mm – interfaz USB+LAN/RED/ETHERNET + So', 'Importante:\r\nInducción automática, prueba de posicionamiento, sin carbono, sin cinta, sin tinta\r\nCabezal de impresión profesional resistente al desgaste, diseñado para imprimir\r\nPuede imprimir continuamente durante 12 horas todos los días con una longitud de impresión de 30 KM.\r\nImpresión sin preocupaciones, teléfonos móviles y pequeños programas pueden imprimir fácilmente.', 700.00, 3, 'assets/img/Impresora-termica-de-etiqueta.png', 0, 0, 0, 0),
(41, ' Papel térmico y etiquetas / Papel de 1mil Etiquetas Térmico Directo 100x70mm – 1 Columna', 'El Papel de 1 mil Etiquetas Térmico Directo 100x70mm – 1 Columna es un rollo de etiquetas autoadhesivas diseñado para impresoras térmicas. Cada etiqueta mide 100x70mm y no requiere tinta, ya que utiliza tecnología de impresión térmica directa, lo que las hace ideales para aplicaciones de etiquetado en logística, inventarios y productos. Este formato de 1 columna ofrece un alto rendimiento y calidad para un etiquetado eficiente y preciso.', 0.00, 4, 'assets/img/Diseno-_29_-300x300.webp', 0, 0, 1, 0),
(42, ' Computadoras / PC ALL IN ONE 15″ TOUCH (TÁCTIL) – VILLACORP T600 – 8GB/128GB SSD', 'El PC All in One Villacorp T600 de 15″ cuenta con pantalla táctil, 8 GB de RAM y un SSD de 128 GB. Su diseño compacto y elegante lo convierte en una solución ideal para espacios reducidos, ofreciendo un rendimiento ágil y eficiente. Perfecto para tareas diarias, navegación y entretenimiento, combina funcionalidad y estilo en un solo dispositivo.', 2800.00, 0, 'assets/img/PC-ALL-IN-ONE-15-TOUCH-TACTIL-VILLACORP-T600-8GB-128GB-SSD-300x300.png', 0, 0, 2, 0),
(43, ' Impresoras Térmicas / Ticketera – Impresora Térmica 80mm Interfaz USB', 'La Ticketera – Impresora Térmica de 80mm con interfaz USB es perfecta para la impresión rápida de recibos y tickets. Su conexión USB facilita la integración con sistemas de punto de venta, mientras que su diseño compacto y eficiente asegura un rendimiento confiable. Ideal para restaurantes, tiendas y cualquier negocio que necesite una solución de impresión ágil y de alta calidad. Compatible con diversos sistemas operativos, ofrece versatilidad y facilidad de uso.\r\n\r\nImprime solo de una computadora o laptop', 410.00, 0, 'assets/img/Impresora-termica-de-etiqueta.png', 0, 0, 0, 0),
(44, ' Impresoras Térmicas / Ticketera – Impresora Térmica 80mm Interfaz USB + Bluetooth', 'La Ticketera – Impresora Térmica de 80mm es perfecta para imprimir recibos y tickets de manera rápida y eficiente. Con conectividad USB y Bluetooth, se integra fácilmente con dispositivos móviles y sistemas de punto de venta. Su diseño compacto y su alta velocidad de impresión la hacen ideal para negocios como restaurantes y tiendas. Además, su compatibilidad con diversos sistemas operativos garantiza una experiencia de uso versátil y sin complicaciones.\r\n\r\nImprime de una computadora o laptop y celular o tablet', 470.00, 39, 'assets/img/Ticketera-Impresora-Termica-80mm-Interfaz-USB-Bluetooth-300x300.jpg', 0, 0, 11, 0),
(45, 'Papel térmico y etiquetas / Papel Etiquetas Térmico Directo – 1 rollo 100x50mm 1 colum – mil etiquet', 'Este rollo de papel etiquetas térmico directo mide 100×50 mm y contiene mil etiquetas en una sola columna. Ideal para impresiones rápidas y sin tinta, es perfecto para etiquetar productos, envíos e inventarios. Su alta calidad garantiza claridad y durabilidad, facilitando una identificación eficaz en diversos entornos.', 70.00, 50, 'assets/img/Papel-Etiquetas-Termico-Directo-1-rollo-100x50mm-1-colum-mil-etiquetas-300x300.png', 0, 0, 0, 0),
(46, 'Papel térmico y etiquetas / Papel Etiquetas Térmico Directo – 1 rollo 30x20mm 2 colum – 2mil etiquet', 'Este rollo de papel etiquetas térmico directo mide 30×20 mm y contiene 2,000 etiquetas distribuidas en dos columnas. Perfecto para impresiones rápidas y sin tinta, es ideal para etiquetar productos, envíos y gestionar inventarios. Su calidad asegura una impresión nítida y duradera, facilitando una identificación efectiva en diversas aplicaciones.', 35.00, 10, 'assets/img/Papel-Etiquetas-Termico-Directo-1-rollo-30x20mm-2-colum-2mil-etiquetas-300x300.png', 0, 0, 10, 0),
(47, 'Papel térmico y etiquetas / Papel Etiquetas Térmico Directo – 1 rollo 80x80mm 1 colum – mil etiqueta', 'Este rollo de papel etiquetas térmico directo mide 80×80 mm y contiene mil etiquetas en una sola columna. Diseñado para impresiones rápidas y sin necesidad de tinta, es ideal para etiquetar productos, envíos y organización de inventarios. Su calidad asegura una impresión clara y duradera, facilitando la identificación en cualquier entorno.', 60.00, 1, 'assets/img/Papel-Etiquetas-Termico-Directo-1-rollo-80x80mm-1-colum-mil-etiquetas-300x300.png', 0, 0, 4, 0),
(48, 'Impresoras Térmicas / Ticketera – Impresora Térmica Portátil 58x40mm Interfaz USB + Bluetooth', 'La Ticketera – Impresora Térmica Portátil es una solución ideal para quienes necesitan imprimir tickets de forma rápida y eficiente. Con un tamaño compacto de 58×40 mm, esta impresora cuenta con conectividad USB y Bluetooth, permitiendo una fácil conexión a dispositivos móviles y computadoras. Su diseño portátil la hace perfecta para uso en ferias, restaurantes o eventos, ofreciendo impresión de alta calidad y rendimiento en cualquier lugar. ¡Haz que tus transacciones sean más rápidas y profesionales!\r\n\r\nImprime de celulares o tablets por Bluetooth', 220.00, 7, 'assets/img/Ticketera-Impresora-Termica-Portatil-58x40mm-Interfaz-USB-Bluetooth-300x300.png', 0, 0, 3, 0),
(49, ' Papel térmico y etiquetas / Papel de 1mil Etiquetas Térmico Directo 60x40mm – 1 Columna', 'El Papel de 1mil Etiquetas Térmico Directo 60x40mm – 1 Columna es un papel especializado para impresoras térmicas directas, sin necesidad de tinta. Sus etiquetas de 60x40mm son versátiles y adecuadas para una amplia variedad de aplicaciones, como etiquetado de productos, logística y envíos, ofreciendo impresiones rápidas y claras.', 40.00, 3, 'assets/img/Diseno-sin-titulo-45-300x300.webp', 0, 0, 2, 0),
(50, 'Impresoras Térmicas / Ticketera – Impresora Térmica 80mm Interfaz USB + Wifi', 'La Ticketera – Impresora Térmica de 80mm es una solución eficiente para la impresión de recibos y tickets. Con conectividad USB y Wi-Fi, permite una fácil integración en cualquier sistema de punto de venta. Su diseño compacto y rápido tiempo de impresión garantizan un rendimiento óptimo, mientras que su compatibilidad con múltiples sistemas operativos la convierte en una opción versátil para negocios de cualquier tamaño. Ideal para restaurantes, tiendas y servicios de atención al cliente.\r\n\r\nImprime de computadoras o laptops y celulares o tablets por WiFi', 520.00, 2, 'assets/img/Ticketera-Impresora-Termica-80mm-Interfaz-USB-Wifi-300x300.jpg', 0, 0, 8, 0),
(51, 'Papel térmico y etiquetas / Caja de 50 Rollos Papel Térmico de 80mmX80mm – Contómetros', 'Esta caja contiene 50 rollos de papel térmico de 80×80 mm, ideales para contómetros y sistemas de impresión térmica. Proporcionan impresiones claras y de alta calidad, perfectas para registros precisos en entornos comerciales. Su diseño asegura un rendimiento confiable y duradero, optimizando la eficiencia en cualquier operación.', 260.00, 2, 'assets/img/Caja-de-50-Rollos-Papel-Termico-de-80mmX80mm-Contometros-300x300.jpg', 0, 0, 6, 0),
(61, 'Papel térmico y etiquetas / Caja de 20 Rollos Papel Térmico de 58X40mm – Contómetros', 'Esta caja contiene 20 rollos de papel térmico de 58×40 mm, ideal para contómetros y sistemas de impresión térmica. Su diseño asegura impresiones nítidas y de alta calidad, perfectas para registros precisos y eficientes. Ideal para entornos comerciales y de servicios, garantiza un rendimiento confiable y duradero.', 75.00, 50, 'assets/img/Caja-de-20-Rollos-Papel-Termico-de-58X40mm-Contometros-300x300.jpg', 0, 0, 0, 0),
(62, 'Papel térmico y etiquetas / Caja de 20 Rollos Papel Térmico 80mmX80mm – Contómetros', 'Esta caja incluye 20 rollos de papel térmico de 80×80 mm, perfectos para contómetros y sistemas de impresión térmica. Ofrecen impresiones claras y de alta calidad, ideales para registros precisos en entornos comerciales. Su diseño garantiza un rendimiento confiable y duradero, facilitando un uso eficiente en cualquier operación.', 110.00, 20, 'assets/img/Caja-de-20-Rollos-Papel-Termico-80mmX80mm-Contometros-300x300.jpg', 0, 0, 0, 0),
(63, ' Lectores de código de barra / Lector de código de barras Bluetooth 1D y 2D inalámbrico con soporte ', 'Características:\r\nBluetooth/2,4G/modo con cable, 3 modos para la opción.\r\nAdmite la lectura de códigos de barras desde la pantalla.\r\nProcesador ARM de 32 bits y velocidad de escaneo de 500 escaneos/seg.\r\nPotente capacidad de decodificación, escaneo rápido de códigos de barras 1D/2D.\r\nAdmite dispositivo portátil/continuo/autoinducción, 3 modos para la opción\r\nSoporte para teléfonos inteligentes/tabletas/computadoras; Compatible para Windows/Android/IOS.\r\nBatería incorporada de 1800 mAh, puede admitir 20 horas de escaneo continuo y 2 meses en espera después de 4 horas de carga completa.\r\nAdmite activar o desactivar el sonido, ocultar/agregar prefijos/sufijos personalizados, eliminar caracteres, agregar teclas de teclado (TAB, CR&LF, etc.)\r\nCampos de aplicación: Restaurant, Supermercado, Venta al por menor y mayor, Almacén, Logística, Biblioteca, Farmacia, Bancos, Minimarket, Grifos y demás puntos de venta.', 280.00, 60, 'assets/img/Lector-de-codigo-de-barras-Bluetooth-1D-y-2D-inalambrico-con-soporte-VLA-1100DB-300x300.png', 0, 0, 0, 0),
(64, ' Lectores de código de barra / Lector de código de barras 1D y 2D inalámbrico con soporte – VLA-1100', 'Características:\r\n\r\nVenta directa, alto rendimiento a bajo precio.\r\nCon receptor mini USB, conecta y reproduce.\r\nAdmite la lectura de códigos de barras desde la pantalla.\r\nPotente capacidad de decodificación, escaneo rápido de códigos de barras 1D/2D.\r\nBatería de gran capacidad, batería de iones de litio de 1800 MAH.\r\nConexión inalámbrica de 2,4 GHz y conexión por cable USB, 2 modos para la opción.\r\nAdmite dispositivo portátil/continuo/inducción automática, 3 modos para la opción.\r\nDistancia de comunicación inalámbrica 2.4G al aire libre 100 m, interior 80 m.\r\nAdmite conexión con computadora, computadora portátil. Sistema operativo compatible para Linux,\r\nWindows XP, 7,8,10.\r\nCampos de aplicación: Restaurant, Supermercado, Venta al por menor y mayor, Almacén, Logística, Biblioteca, Farmacia, Bancos, Minimarket, Grifos y demás puntos de venta.', 250.00, 10, 'assets/img/Lector-de-codigo-de-barras-1D-y-2D-inalambrico-con-soporte-VLA-1100DW-300x300.png', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`, `email`, `password`, `is_admin`, `is_blocked`) VALUES
(9, 'gema vasquez', '', '122@gmail.com', '$2y$10$E95R4PJcofqLy4cGbH2IierJX.A1LRsxeNB9lJMmgrGgyjc4V7Lwy', 0, 0),
(11, 'maria', '', '123@gmail.com', '$2y$10$kCVEs7RgjXt8wLS5YpC50enPn4IJzFwTnCeSgjUNtEhdWNviV4YE2', 0, 0),
(13, 'admin', '', 'admin@correo.com', '$2y$10$TFYk.DT/QWvyQAwZWWhvOus3G.ZkxXZ5/sn2FMmjrDNjkksOz.q0u', 1, 0),
(16, 'gema vasquez', '', 'rosa@gmail.com', '$2y$10$5A4zQan0BRZgJHVD388VKubDMAdVTeeSApZWbLjdVx1la00l/HNd6', 0, 0),
(39, 'juan', '', 'juan@gmail.com', '$2y$10$9cbfKok.GwIe4xwYyNh8Jezyhc8mxra9rp2MqC2Rf85hAmyfA6ENK', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `idx_carrito_usuario_id` (`usuario_id`),
  ADD KEY `idx_carrito_session_id` (`session_id`);

--
-- Indices de la tabla `comentarios_noticias`
--
ALTER TABLE `comentarios_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_compras_codigo` (`codigo_compra`),
  ADD KEY `idx_compras_usuario` (`usuario_id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_producto` (`usuario_id`,`producto_id`);

--
-- Indices de la tabla `leads_contacto`
--
ALTER TABLE `leads_contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_leads_dni` (`dni`),
  ADD KEY `idx_leads_ruc` (`ruc`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_notif_usuario` (`usuario_id`),
  ADD KEY `idx_notif_codigo_compra` (`codigo_compra`),
  ADD KEY `idx_notif_leida` (`leida`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pagos_usuario` (`usuario_id`),
  ADD KEY `idx_pagos_codigo` (`codigo_pago`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT de la tabla `comentarios_noticias`
--
ALTER TABLE `comentarios_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT de la tabla `leads_contacto`
--
ALTER TABLE `leads_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;


  -- --------------------------------------------------------
-- Categorías de productos
-- --------------------------------------------------------

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Lector de código de barra', 1),
(2, 'Contómetro y papel de etiquetas', 1),
(3, 'Impresora de etiquetas - Impresora de ticket', 1),
(4, 'Computadoras - Tablet', 1),
(5, 'Gaveta de dinero', 1);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
