<?php
require_once __DIR__ . '/../../config/database.php';

// Obtener categorías para el select
$categorias = [];
$qcat = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
if($qcat && $qcat->num_rows){
    while($row = $qcat->fetch_assoc()){
        $categorias[] = $row;
    }
}

// Procesar formulario antes de enviar cualquier HTML
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombrep = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $stock = intval($_POST['stock']);
    $category_id = isset($_POST['category_id']) && intval($_POST['category_id']) > 0 ? intval($_POST['category_id']) : 8;

    // Mantener imagen actual si no se sube una nueva
    $imagen = isset($_POST['imagen_actual']) ? $conn->real_escape_string($_POST['imagen_actual']) : '';

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['imagen']['tmp_name'];
        $nombre_archivo = basename($_FILES['imagen']['name']);
        $ruta_destino_absoluta = dirname(__DIR__) . '/assets/img/' . $nombre_archivo;
        $ruta_relativa = 'assets/img/' . $nombre_archivo;

        if(move_uploaded_file($tmp_name, $ruta_destino_absoluta)) {
            $imagen = $ruta_relativa;
        }
    }

    if(!empty($_POST['id'])){
        $idup = intval($_POST['id']);
        $sql = "UPDATE productos 
                SET nombre='$nombrep',
                    descripcion='$descripcion',
                    precio=$precio,
                    stock=$stock,
                    imagen='$imagen',
                    category_id=$category_id
                WHERE id=$idup";

        if(!$conn->query($sql)) {
            echo "<div style='color:red;'>Error al actualizar: " . $conn->error . "</div>";
        } else {
            header('Location: productos.php');
            exit;
        }
    } else {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen, category_id)
                VALUES ('$nombrep', '$descripcion', $precio, $stock, '$imagen', $category_id)";

        if(!$conn->query($sql)) {
            echo "<div style='color:red;'>Error al insertar: " . $conn->error . "</div>";
        } else {
            header('Location: productos.php');
            exit;
        }
    }
}

// Admin check
include __DIR__ . '/includes/header_admin.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$producto = [
    'nombre' => '',
    'descripcion' => '',
    'precio' => 0,
    'stock' => 0,
    'imagen' => '',
    'category_id' => 8
];

if($id){
    $q = $conn->query("SELECT * FROM productos WHERE id=$id LIMIT 1");
    if($q && $q->num_rows) {
        $producto = $q->fetch_assoc();
    }
}
?>

<?php if($id): ?>
<link rel="stylesheet" href="assets/css/editar_producto.css">
<section class="editar-producto-section">
    <h2>Editar Producto</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="imagen_actual" value="<?= htmlspecialchars($producto['imagen']) ?>">

        <label>Nombre<br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </label>

        <label>Descripción<br>
            <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        </label>

        <label>Precio (S/)<br>
            <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required>
        </label>

        <label>Stock<br>
            <input type="number" name="stock" value="<?= htmlspecialchars($producto['stock']) ?>" required>
        </label>

        <label>Categoría<br>
            <select name="category_id" required>
                <option value="">Seleccione categoría</option>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= (isset($producto['category_id']) && intval($producto['category_id']) === intval($cat['id'])) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <?php if(!empty($producto['imagen'])): ?>
            <div style="margin:10px 0;">
                <p>Imagen actual:</p>
                <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen actual" style="max-width:120px; border:1px solid #ddd; padding:4px;">
            </div>
        <?php endif; ?>

        <label>Imagen (archivo)<br>
            <div class="custom-file-input-wrapper">
                <input type="file" name="imagen" accept="image/*" onchange="document.getElementById('file-label-editar').textContent = this.files[0]?.name || 'Sin archivos seleccionados';">
                <span class="custom-file-label" id="file-label-editar">Sin archivos seleccionados</span>
            </div>
        </label>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</section>

<?php else: ?>
<link rel="stylesheet" href="assets/css/producto_form.css">
<section class="producto-form-section">
    <h2>Nuevo Producto</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="imagen_actual" value="">

        <label>Nombre<br>
            <input type="text" name="nombre" value="" required>
        </label>

        <label>Descripción<br>
            <textarea name="descripcion"></textarea>
        </label>

        <label>Precio (S/)<br>
            <input type="number" step="0.01" name="precio" value="0" required>
        </label>

        <label>Stock<br>
            <input type="number" name="stock" value="0" required>
        </label>

        <label>Categoría<br>
            <select name="category_id" required>
                <option value="">Seleccione categoría</option>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= intval($cat['id']) === 8 ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Imagen (archivo)<br>
            <input type="file" name="imagen" accept="image/*">
        </label>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</section>
<?php endif; ?>