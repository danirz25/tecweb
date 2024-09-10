<?php
include 'src/funciones.php';
?>

<!DOCTYPE xhtml>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
        <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" required>
        <br>
        <input type="submit" value="Comprobar">
    </form>
    <br>
    <?php
    // Verificación
    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
        // Se llamar a la función del ejercicio 1 en funciones.php
        echo '<h3>' . esMultiploDe5y7($numero) . '</h3>';
    }
    ?>
    <!--
    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb_copia/practicas/p07/funciones.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    -->
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

        <!-- EJERCICIO 2 -->
<h2>Ejercicio 2</h2>
    <p>Generar secuencias de 3 números aleatorios hasta obtener un patrón de impar, par, impar:</p>

    <form action="" method="post">
        <input type="submit" value="Generar Secuencia">
    </form>
    <br>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Llamar a la función del Ejercicio 2
        $resultado = generarSecuenciaImparParImpar();

        // Mostrar la matriz de resultados
        echo '<h3>Secuencias generadas:</h3>';
        foreach ($resultado['matriz'] as $fila) {
            echo implode(', ', $fila) . '<br>';
        }

        // Mostrar el número de iteraciones y la cantidad total de números generados
        echo '<p>Número de iteraciones: ' . $resultado['iteraciones'] . '</p>';
        echo '<p>Cantidad total de números generados: ' . $resultado['totalNumerosGenerados'] . '</p>';
    }
    ?>
</body>
</html>