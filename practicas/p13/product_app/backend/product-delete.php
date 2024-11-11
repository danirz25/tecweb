<?php
    use myapi\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $products = new Products("root", "DaPaRuniel25!", "marketzone");
    if(isset($_POST['id'])) {
        $products->delete($_POST['id']);
    }
    echo $products->getData();
?>