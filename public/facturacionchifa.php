<?php
// Plantilla básica para Tiendas Virtuales
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tiendas Virtuales - SDRIMSAC</title>
<link rel="stylesheet" href="assets/css/facturacionchifa.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>


<!-- BANNER -->
<div class="page-banner">
    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1400&q=80" alt="Tiendas Virtuales SDRIM">
    <div class="page-banner-overlay">
        <h1>Aplicativo para Facturación Electrónica - Chifa</h1>
        <p>Sdrim S.A.C.:Servicios:Facturación Electrónica para Chifa</p>
    </div>
</div>
<link rel="stylesheet" href="assets/css/facturacionchifa.css">

<section class="chifa-main">
    <div class="chifa-img-top">
        <img src="assets/img/Chifa.png" alt="Chifa" class="chifa-img-large">
    </div>
    <div class="chifa-desc">
        <h2>DESARROLLO DE FACTURACIÓN ELECTRÓNICA</h2>
        <p>El servicio de desarrollo de facturación electrónica para NEGOCIO – CHIFA busca simplificar y agilizar el proceso de emisión de facturas, garantizando la legalidad y la eficiencia en la gestión financiera del restaurante. Esto no solo facilita el cumplimiento de las obligaciones fiscales, sino que también mejora la experiencia del cliente al proporcionar facturas electrónicas claras y precisas.</p>
    </div>
    <div class="chifa-img-mid">
        <img src="assets/img/Mesa-Caja.png" alt="Mesa Caja" class="chifa-img-mid">
    </div>
    <div class="chifa-manual">
        <div class="manual-blocks">
            <div class="manual-columns">
                <div class="manual-col">
                    <div class="manual-icon"><i class="fa-solid fa-user-gear"></i></div>
                    <div class="manual-title">ADMINISTRADOR</div>
                    <ul class="manual-list">
                        <li>Mantenimiento de Usuarios, Clientes, Categorías, Marcas, Registro de número de Cuentas de Banco</li>
                        <li>Compras y Listado de Compras</li>
                        <li>Creación de Recetas, Productos y Servicios</li>
                        <li>Creación de Promoción/Ofertas</li>
                        <li>Ventas Administrativas (Factura, Boletas y Notas de Venta) Envíos de Factura, Boleta directos a SUNAT</li>
                        <li>Anulación de comprobantes (Interno y Externo) - Nota de Crédito</li>
                        <li>Ingresos y Gastos de Efectivo</li>
                        <li>Reporte de Caja</li>
                        <li>Reporte de Cierre de Caja por Establecimiento y Turno</li>
                        <li>Reporte de Ganancia</li>
                        <li>Reporte de Stock de Productos</li>
                        <li>Reporte Productos Vendidos</li>
                        <li>Reporte Valorizado</li>
                        <li>Reporte de Stock Mínimo</li>
                        <li>Reporte de Métodos de Pago</li>
                        <li>Reporte de Kardex</li>
                        <li>Contabilidad (Compras y Ventas)</li>
                    
                        <li>Unión de mesas</li>
                        <li>Cancelación de orden (con PIN de seguridad y motivo de cancelación)</li>
                        <li>Emisión de documentos por Variación, sin afectar el Stock de platos y productos</li>
                        <li>Ventas aparcadas</li>
                        <li>Emisión de Factura con IGV</li>
                        <li>Ingresos y Gastos de Efectivo</li>
                        <li>Envío de Facturas y Boletas directo a SUNAT</li>
                        <li>Anulación de comprobantes (Interno y Externo) Notas de Crédito</li>
                        <li>Reporte de ventas diarias en pdf más documento Excel con stock de productos</li>
                    </ul>
                </div>
                <div class="manual-col">
                    <div class="manual-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="manual-title">MOZO</div>
                    <ul class="manual-list">
                        <li>Toma de pedidos por mesa (individual o pagos en grupo)</li>
                        <li>Envíos directos a cocina a través de Pantalla o impresión de comandas con ticketera</li>
                        <li>Unión de mesas</li>
                        <li>Cambio de órdenes de mesa</li>
                        <li>Check en pedido listo</li>
                    </ul>
                </div>
            </div>
            <div class="manual-bottom-blocks">
                <div class="manual-bottom-col">
                    <div class="manual-icon-bottom"><i class="fa-solid fa-thumbtack"></i></div>
                    <div class="manual-title-bottom">COCINA</div>
                    <ul class="manual-list-bottom">
                        <li>Recepción de pedidos con Pc (sonido), Laptop, Tablet y/o Ticket</li>
                        <li>Check en pedido listo.</li>
                    </ul>
                </div>
                <div class="manual-bottom-col">
                    <div class="manual-icon-bottom"><i class="fa-solid fa-table-cells"></i></div>
                    <div class="manual-title-bottom">BARRA</div>
                    <ul class="manual-list-bottom">
                        <li>Recepción de pedidos con Pc, Laptop, Tablet, Pantalla y/o Ticket.</li>
                        <li>Pedido listo</li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include("includes/footer.php"); ?>
</body>
</html>
