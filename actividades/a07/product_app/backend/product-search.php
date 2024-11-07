<?php
namespace backend;

require_once 'myapi/Products.php';

$products = new \backend\myapi\Productos('root', 'DaPaRuniel25!', 'marketzone');
$products->search('Snoopy'); // Reemplaza 'Producto' con el término de búsqueda
echo $products->getData();
?>