<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'DaPaRuniel25!',
        'marketzone'
    );

    if(!$conexion) {
        die('¡Base de datos sin conexión!');
    }
?>