<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 05 - PHP</title>
</head>
<body>
    <h1>Práctica 05</h1>

           <!-- Ejercicio 1-->
    <h2>Ejercicio 1: Variables válidas</h2>
    <?php
        $_myvar = "Es válida, puede iniciar con guión bajo";
        $_7var = "Es válida, si puede iniciar con guión bajo, puede llevar un número o caracter";
        $myvar = "Es válida, al ser una cadena de caracteres, no hay problema.";
        $var7 = "Es válida, puede llevar caracteres y números (No puede iniciar con número. Por ejemplo: $7var está mal)";
        $_element1 = "Es válida, pues puede iniciar con guión bajo y luego un caracter o número";

        echo "Variables válidas: ";
        echo "<br> \$_myvar: $_myvar";
        echo "<br> \$_7var: $_7var";
        echo "<br> \$myvar: $myvar";
        echo "<br> \$var7: $var7";
        echo "<br> \$_element1: $_element1";

        // Para liberar a las variables se usa unset()
        unset($_myvar, $_7var, $myvar, $var7, $_element1);
    ?>
</body>
</html>
