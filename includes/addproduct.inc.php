<?php
    include_once 'dbh.inc.php';

    $product_name = $_POST['product-name'];
    $product_prize = $_POST['product-prize'];
    $product_type = $_POST['product-type'];

    if (strlen($product_name) > 0 || $product_prize > 0 || $product_type > 0) {
        $sql_add_into = "INSERT INTO product (`product_name`, `product_prize`, `product_type`) VALUES ('$product_name', $product_prize, $product_type);";
        $result = mysqli_query($conn, $sql_add_into);
    }

    header('Location: ../index.php?addproduct=success');
?>