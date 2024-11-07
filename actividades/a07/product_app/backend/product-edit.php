<?php
namespace backend;

require_once 'myapi/Products.php';

$products = new \backend\myapi\Productos('root', 'DaPaRuniel25!', 'marketzone');
$products->edit((object)['id' => '1', 'name' => 'Producto Editado', 'price' => 150]);
echo $products->getData();
?>
