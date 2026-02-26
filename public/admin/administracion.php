<?php
include __DIR__ . '/includes/header_admin.php';
?>
<link rel="stylesheet" href="assets/css/administracion.css">
<section class="admin-section">
    <h2>Administración</h2>
    <p>Aquí podrás gestionar configuraciones, usuarios, permisos y otras opciones administrativas.</p>
    <ul>
        <li><a href="?seccion=usuarios">Gestión de usuarios</a></li>
        <li><a href="?seccion=configuracion">Configuración general</a></li>
        <li><a href="?seccion=permisos">Permisos y roles</a></li>
    </ul>

    <?php
    require_once __DIR__ . '/../../config/database.php';
    $seccion = $_GET['seccion'] ?? '';
    if($seccion === 'usuarios'){
        echo '<div class="admin-box"><h3>Gestión de usuarios</h3>';
        // Listar usuarios
        $q = $conn->query("SELECT id, nombre, email, is_admin, is_blocked FROM usuarios");
        echo '<table style="width:100%;margin-bottom:1em;"><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Bloqueado</th><th>Acción</th></tr>';
        while($r = $q->fetch_assoc()){
            $bloqueado = $r['is_blocked'] ? 'Sí' : 'No';
            $accion = $r['is_blocked']
                ? '<form method="post" style="display:inline;"><input type="hidden" name="id_bloq" value="'.intval($r['id']).'"><button type="submit" name="desbloquear" style="background:#2a2aee;color:#fff;border:none;padding:4px 10px;border-radius:6px;">Desbloquear</button></form>'
                : '<form method="post" style="display:inline;"><input type="hidden" name="id_bloq" value="'.intval($r['id']).'"><button type="submit" name="bloquear" style="background:#b30000;color:#fff;border:none;padding:4px 10px;border-radius:6px;">Bloquear</button></form>';
            echo '<tr><td>'.intval($r['id']).'</td><td>'.htmlspecialchars($r['nombre']).'</td><td>'.htmlspecialchars($r['email']).'</td><td>'.($r['is_admin']?'Admin':'Cliente').'</td><td>'.$bloqueado.'</td><td>'.$accion.'</td></tr>';
        }
        echo '</table>';
        // Formulario de ejemplo para crear usuario
        echo '<form method="post" class="admin-form" style="margin-top:1em;">';
        echo '<label>Nombre: <input type="text" name="nuevo_nombre" required></label> ';
        echo '<label>Email: <input type="email" name="nuevo_email" required></label> ';
        echo '<label>Contraseña: <input type="password" name="nuevo_pass" required></label> ';
        echo '<label>Rol: <select name="nuevo_rol"><option value="0">Cliente</option><option value="1">Admin</option></select></label> ';
        echo '<button type="submit" name="crear_usuario">Crear usuario</button>';
        echo '</form>';
        // Procesar creación
        if(isset($_POST['crear_usuario'])){
            $nombre = $conn->real_escape_string($_POST['nuevo_nombre']);
            $email = $conn->real_escape_string($_POST['nuevo_email']);
            $pass = password_hash($_POST['nuevo_pass'], PASSWORD_DEFAULT);
            $rol = intval($_POST['nuevo_rol']);
            $conn->query("INSERT INTO usuarios (nombre,email,password,is_admin) VALUES ('$nombre','$email','$pass',$rol)");
            echo '<div style="color:green;margin-top:1em;">Usuario creado correctamente. <a href="?seccion=usuarios">Actualizar</a></div>';
        }
        // Procesar bloqueo/desbloqueo
        if(isset($_POST['bloquear']) && isset($_POST['id_bloq'])){
            $id = intval($_POST['id_bloq']);
            $conn->query("UPDATE usuarios SET is_blocked=1 WHERE id=$id");
            echo '<div style="color:#b30000;margin-top:1em;">Usuario bloqueado. <a href="?seccion=usuarios">Actualizar</a></div>';
        }
        if(isset($_POST['desbloquear']) && isset($_POST['id_bloq'])){
            $id = intval($_POST['id_bloq']);
            $conn->query("UPDATE usuarios SET is_blocked=0 WHERE id=$id");
            echo '<div style="color:#2a2aee;margin-top:1em;">Usuario desbloqueado. <a href="?seccion=usuarios">Actualizar</a></div>';
        }
        echo '</div>';
    }
    if($seccion === 'configuracion'){
        echo '<div class="admin-box"><h3>Configuración general</h3>';
        echo '<form method="post">';
        echo '<label>Nombre de la empresa: <input type="text" name="empresa" value="SDRIMSAC"></label><br>';
        echo '<label>Correo de contacto: <input type="email" name="correo" value="contacto@sdrimsac.com"></label><br>';
        echo '<button type="submit" name="guardar_config">Guardar configuración</button>';
        echo '</form>';
        if(isset($_POST['guardar_config'])){
            // Aquí guardarías la configuración en la base de datos o archivo
            echo '<div style="color:green;margin-top:1em;">Configuración guardada (simulado).</div>';
        }
        echo '</div>';
    }
    if($seccion === 'permisos'){
        echo '<div class="admin-box"><h3>Permisos y roles</h3>';
        echo '<p>Gestión de roles y permisos de usuarios (demo):</p>';
        echo '<ul><li>Admin: acceso total</li><li>Cliente: acceso limitado</li></ul>';
        echo '<form method="post">';
        echo '<label>ID usuario: <input type="number" name="id_usuario" min="1"></label> ';
        echo '<label>Rol: <select name="rol"><option value="0">Cliente</option><option value="1">Admin</option></select></label> ';
        echo '<button type="submit" name="cambiar_rol">Cambiar rol</button>';
        echo '</form>';
        if(isset($_POST['cambiar_rol'])){
            $id = intval($_POST['id_usuario']);
            $rol = intval($_POST['rol']);
            $conn->query("UPDATE usuarios SET is_admin=$rol WHERE id=$id");
            echo '<div style="color:green;margin-top:1em;">Rol actualizado correctamente.</div>';
        }
        echo '</div>';
    }
    ?>
</section>

