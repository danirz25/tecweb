<?php
/* MySQL Conexion */
$link = mysqli_connect("localhost", "root", "DaPaRuniel25!", "marketzone");

// Chequea conexión
if ($link === false) {
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}

// Recuperar datos del formulario
$id = $_POST['id']; // ID del producto a actualizar
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];

// Inicializar la consulta SQL
$sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades' WHERE id='$id'";

// Ejecutar la actualización del registro
if (mysqli_query($link, $sql)) {
    echo "Registro actualizado.";
} else {
    echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
}

// Cerrar la conexión
mysqli_close($link);
?>
