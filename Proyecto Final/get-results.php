<?php
include 'db.php';

// Obtener datos del formulario
$region = $_POST['region'];
$lavar_alimentos = $_POST['lavar_alimentos'];
$origen_alimentos = $_POST['origen_alimentos'];
$consumo_fuera_hogar = $_POST['consumo_fuera'];
$acceso_canasta = $_POST['acceso_canasta'];
$donar_alimentos = $_POST['donar_alimentos'];
$reducir_hambre = $_POST['reducir_hambre'];
$alimentacion_balanceada = $_POST['alimentacion_balanceada'];
$tipo_alimentos = implode(',', $_POST['tipo_alimentos']); // Convertir array a string separado por comas
$orientacion_alimentaria = $_POST['orientacion_alimentaria'];

// Insertar en la tabla
$sql = "INSERT INTO respuestas (
    region, 
    lavar_alimentos, 
    origen_alimentos, 
    consumo_fuera_hogar, 
    acceso_canasta, 
    donar_alimentos, 
    reducir_hambre, 
    alimentacion_balanceada, 
    tipo_alimentos, 
    orientacion_alimentaria
) VALUES (
    '$region', 
    '$lavar_alimentos', 
    '$origen_alimentos', 
    '$consumo_fuera_hogar', 
    '$acceso_canasta', 
    '$donar_alimentos', 
    '$reducir_hambre', 
    '$alimentacion_balanceada', 
    '$tipo_alimentos', 
    '$orientacion_alimentaria'
)";

if ($conn->query($sql) === TRUE) {
    header("Location: agradecimiento.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
