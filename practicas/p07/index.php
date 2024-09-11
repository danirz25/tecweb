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

        // Mostrar la matriz de resultados en una tabla simple
        echo '<h3>Secuencias generadas:</h3>';
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        echo '<tr><th>Número 1</th><th>Número 2</th><th>Número 3</th></tr>';
        foreach ($resultado['matriz'] as $fila) {
            echo '<tr>';
            foreach ($fila as $numero) {
                echo '<td>' . $numero . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        // Mostrar el número de iteraciones y la cantidad total de números generados
        echo '<p>Número de iteraciones: ' . $resultado['iteraciones'] . '</p>';
        echo '<p>Números generados en total: ' . $resultado['totalNumerosGenerados'] . '</p>';
    }
    ?>

<h2>Ejercicio 3</h2>
    <p>Encuentra el primer número aleatorio que sea múltiplo de un número dado (vía GET):</p>

    <form action="" method="get">
        <label for="numeroDado">Introduce un número:</label>
        <input type="number" name="numeroDado" id="numeroDado" required>
        <br><br>
        <input type="submit" value="Buscar con while">
    </form>

    <br><br>

    <?php
    if (isset($_GET['numeroDado'])) {
        $numeroDado = $_GET['numeroDado'];

        // Llamar a la función con ciclo while
        $resultadoWhile = encontrarMultiploWhile($numeroDado);

        // Mostrar el resultado del ciclo while
        echo '<h3>Resultado con ciclo while:</h3>';
        echo '<p>Primer múltiplo encontrado: ' . $resultadoWhile['numeroAleatorio'] . '</p>';
        echo '<p>Número de intentos: ' . $resultadoWhile['intentos'] . '</p>';

        // Llamar a la función con ciclo do-while
        $resultadoDoWhile = encontrarMultiploDoWhile($numeroDado);

        // Mostrar el resultado del ciclo do-while
        echo '<h3>Resultado con ciclo do-while:</h3>';
        echo '<p>Primer múltiplo encontrado: ' . $resultadoDoWhile['numeroAleatorio'] . '</p>';
        echo '<p>Número de intentos: ' . $resultadoDoWhile['intentos'] . '</p>';
    }
    ?>


    <h2>Ejercicio 4</h2>
    <p>Generar un arreglo con índices de 97 a 122 y valores correspondientes a letras de la 'a' a la 'z':</p>

     <?php
    // Generar el arreglo con índices y valores ASCII
    $arregloAscii = generarArregloAscii();

    // Mostrar el arreglo en el formato [índice] => valor
    foreach ($arregloAscii as $key => $value) {
        echo '[' . $key . '] => ' . $value . '<br>';
    }
    ?>


<h2>Ejercicio 5</h2>
    <form action="" method="post">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required>
        <br>
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br>
        <input type="submit" value="Verificar">
    </form>
    <br>

    <?php
    if (isset($_POST['edad']) && isset($_POST['sexo'])) {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        echo verificarEdadSexo($edad, $sexo);
    }
    ?>


<h2>Consulta de Vehículos</h2>
    <h3>Buscar por Matrícula</h3>
    <form action="" method="post">
        <label for="matricula">Introduce la matrícula:</label>
        <input type="text" name="matricula" id="matricula">
        <br>
        <input type="submit" name="buscarMatricula" value="Buscar por Matrícula">
    </form>

    <h3>Mostrar Todos los Vehículos</h3>
    <form action="" method="post">
        <input type="submit" name="mostrarTodos" value="Mostrar Todos">
    </form>

    <br>
    <h2>Resultados:</h2>
    <?php
    // Verificar si se ha enviado el formulario de buscar por matrícula
    if (isset($_POST['buscarMatricula']) && !empty($_POST['matricula'])) {
        $matricula = $_POST['matricula'];
        echo '<pre>' . mostrarVehiculoPorMatricula($matricula, $parqueVehicular) . '</pre>';
    }

    // Verificar si se ha enviado el formulario de mostrar todos los vehículos
    if (isset($_POST['mostrarTodos'])) {
        echo '<pre>' . mostrarTodosLosVehiculos($parqueVehicular) . '</pre>';
    }
    ?>

</body>
</html>