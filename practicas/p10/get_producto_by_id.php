<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    @$link = new mysqli('localhost', 'root', 'DaPaRuniel25!', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    // Consultar producto por ID
    if ($result = $link->query("SELECT * FROM productos WHERE id = $id")) {
        $producto = $result->fetch_assoc();
        echo json_encode($producto);
    }

    $link->close();
}
?>
