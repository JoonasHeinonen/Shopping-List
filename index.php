<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping List</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Shopping List</h1>
        <?php
            $sum = 0;

            // The code where to print out all the products with their prizes
            $sql_select_all = "SELECT * FROM product;";
            $result = mysqli_query($conn, $sql_select_all);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['product_name'] . ", " . $row['product_prize'] . " €<br>";
                }
            }
            
            // This is the code where the total prize is calculated
            $sql_for_total = "SELECT SUM(product_prize) AS total_prize FROM product;";
            $result_for_total = mysqli_query($conn, $sql_for_total);
            $row = mysqli_fetch_assoc($result_for_total); 
            $sum = $row['total_prize'];

            echo "The total prize of these <b>" . $resultCheck ."</b> items would be <b>" . $sum . "</b> euros.";

            /* INSERT INTO product (`product_name`, `product_prize`, `product_type`) VALUES ('Juhla Mokka 500g sj', 3.89, 3); */
            $sql_add_into = "INSERT INTO product (`product_name`, `product_prize`, `product_type`) VALUES ('Juhla Mokka 500g sj', 3.89, 3);";
        ?>
        <div class="form-box">
            <form>
                <h3>Submit a new product!</h3>
                <input type="text" name="product-name" placeholder="The name of the product..."><br>
                <input type="number" name="product-prize" step="0.01" placeholder="The price of the product..."><br>
                <input type="number" name="product-type" placeholder="Product type..."><br>
                <button type="submit" class="default-button" name="submit">Submit!</button>
            </form>
        </div>
    <body>
</html>