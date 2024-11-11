<?php
    use myapi\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $products = new Products("root", "DaPaRuniel25!", "marketzone");
    $products->list();
    echo $products->getData();
?>