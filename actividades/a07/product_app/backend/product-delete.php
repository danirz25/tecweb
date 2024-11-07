<?php
namespace backend;

require_once 'myapi/Products.php';

$products = new \backend\myapi\Productos('root', 'DaPaRuniel25!', 'marketzone');
$products->delete('1'); // Reemplaza '1' con el ID del producto a eliminar
echo $products->getData();
?>