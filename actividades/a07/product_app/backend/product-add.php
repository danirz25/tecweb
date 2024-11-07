<?php
namespace backend;

require_once 'myapi/Products.php';

$products = new \backend\myapi\Productos('root', 'DaPaRuniel25!', 'marketzone');
$products->add((object)['name' => 'Nuevo Producto', 'price' => 100]);
echo $products->getData();

?>