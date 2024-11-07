<?php
namespace backend;

require_once 'myapi/Products.php';

$products = new \backend\myapi\Productos('root', 'DaPaRuniel25!', 'marketzone');
$products->singleByName('NombreProducto'); // Reemplaza 'NombreProducto' con el nombre del producto
echo $products->getData();
?>
