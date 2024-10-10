<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Tienda de Juguetes de ensueño: Productos en bodega</h3>

    <?php
    /*
    if (isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }*/

        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', 'DaPaRuniel25!', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        /** Crear una tabla que no devuelve un conjunto de resultados */
        if ($result = $link->query("SELECT * FROM productos ")) {    //WHERE unidades <= $tope
            echo '<table class="table">';
            echo '<thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Modificar</th> <!-- Nueva columna para modificar -->
                    </tr>
                  </thead>';
            echo '<tbody>';
        
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<th scope="row">' . $row['id'] . '</th>';
                echo '<td>' . $row['nombre'] . '</td>';
                echo '<td>' . $row['marca'] . '</td>';
                echo '<td>' . $row['modelo'] . '</td>';
                echo '<td>' . $row['precio'] . '</td>';
                echo '<td>' . $row['unidades'] . '</td>';
                echo '<td>' . utf8_encode($row['detalles']) . '</td>';
                echo '<td><img src="' . $row['imagen'] . '" alt="Imagen del producto" width="150" height="150" /></td>';
                echo '<td><a href="formulario_productos_v2.html?id=' . $row['id'] . '">Modificar</a></td>';
                echo '</tr>';
            }            
//practicas/p10/img2/
            echo '</tbody></table>';
            $result->free();
        }

        $link->close();
    
    ?>

</body>
</html>

