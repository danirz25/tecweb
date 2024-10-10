<?php
// Conexión a la base de datos
$link = new mysqli('localhost', 'root', 'DaPaRuniel25!', 'marketzone');
if ($link->connect_errno) {
    die('Error en la conexión: ' . $link->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = !empty($_POST['detalles']) ? $_POST['detalles'] : null;
    $unidades = $_POST['unidades'];

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $imagen_ruta = 'img/' . $imagen_nombre;
        move_uploaded_file($imagen_temp, $imagen_ruta);
    } else {
        // Imagen por defecto si no se carga ninguna
        $imagen_ruta = 'img/default.png';
    }

    // Consulta SQL para actualización o inserción
    if (!empty($id)) {
        // Actualizar producto existente
        $stmt = $link->prepare("UPDATE productos SET nombre=?, marca=?, modelo=?, precio=?, detalles=?, unidades=?, imagen=? WHERE id=?");
        $stmt->bind_param("sssdsisi", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen_ruta, $id);
    } else {
        // Insertar un nuevo producto
        $stmt = $link->prepare("INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdsis", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen_ruta);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Producto actualizado/agregado con éxito";
    } else {
        echo "Error al procesar el producto: " . $stmt->error;
    }

    $stmt->close();
}

$link->close();
?>
