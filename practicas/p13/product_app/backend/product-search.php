<?php
    use myapi\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $products = new Products("root", "DaPaRuniel25!", "marketzone");
    if(isset($_GET['search'])) {
        $products->search($_GET['search']);
    }
    echo $products->getData();
?>