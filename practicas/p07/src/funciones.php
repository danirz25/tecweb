<?php

function esMultiploDe5y7($num) {
    if ($num % 5 == 0 && $num % 7 == 0) {
        return 'El número ' . $num . ' SÍ es múltiplo de 5 y 7.';
    } else {
        return 'El número ' . $num . ' NO es múltiplo de 5 y 7.';
    }


// Comprobación de la variable $_GET
if (isset($_GET['numero'])) {
    $num = $_GET['numero'];
    echo '<h3>R= ' . esMultiploDe5y7($num) . '</h3>';

}
}

// Ejercicio 2: Generación repetitiva de 3 números aleatorios hasta obtener el patrón impar, par, impar
function generarSecuenciaImparParImpar() {
    $matriz = []; // Matriz para almacenar las secuencias
    $iteraciones = 0; // Contador de iteraciones
    $totalNumerosGenerados = 0; // Contador de números generados

    do {
        // Generar 3 números aleatorios
        $num1 = rand(1, 1000); // Puedes ajustar el rango si lo deseas
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);

        // Incrementar el contador de números generados
        $totalNumerosGenerados += 3;

        // Verificar el patrón: impar, par, impar
        $patronCorrecto = ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);

        // Almacenar la secuencia en la matriz
        $matriz[] = [$num1, $num2, $num3];

        // Incrementar el contador de iteraciones
        $iteraciones++;
    } while (!$patronCorrecto); // Repetir hasta que el patrón sea correcto

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumerosGenerados' => $totalNumerosGenerados
    ];
}
?>