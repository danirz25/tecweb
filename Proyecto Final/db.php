<?php
$host = 'localhost';
$user = 'root';
$password = 'DaPaRuniel25!';
$database = 'hambre_cero';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
