<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping List</title>
    </head>
    <body>
        <h1>Shopping List</h1>
        <?php
            $sum = 0;

            // The code where to print out all the products with their prizes
            $sql = "SELECT * FROM product;";
            $result = mysqli_query($conn, $sql);
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
        ?>
    <body>
</html>