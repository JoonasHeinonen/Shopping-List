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
        <article>
            <div class="form-box">
                <div style="text-align:center">
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                    <span class="hole"></span>
                </div>
                <h3>Shopping List Of The Day</h3>
                <?php
                    $sum = 0;

                    // The code where to print out all the products with their prizes
                    $sql_select_all = "SELECT * FROM product;";
                    $result = mysqli_query($conn, $sql_select_all);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<ul><div class='item-in-list'>";
                            echo "  <li><p>" . $row['product_name'] . ", " . $row['product_prize'] . " €</p>";
                            echo "<button class='delete-button'><b>X</b></button></li><button class='overline-button'><b>-</b></button>";
                            echo "</div></ul>";
                        }
                    }
                    
                    // This is the code where the total prize is calculated
                    $sql_for_total = "SELECT SUM(product_prize) AS total_prize FROM product;";
                    $result_for_total = mysqli_query($conn, $sql_for_total);
                    $row = mysqli_fetch_assoc($result_for_total); 
                    $sum = $row['total_prize'];

                    echo "<p id='total-prize'>The total prize of these <b>" . $resultCheck ."</b> items would be <b>" . $sum . "</b> euros.</p>";

                    
                ?>
            </div>

            <div class="form-box" id="submit-box">
                <form action="includes/addproduct.inc.php" method="POST">
                    <h3>Submit a new product!</h3>
                    <input type="text" name="product-name" placeholder="The name of the product..."><br>
                    <input type="number" name="product-prize" step="0.01" placeholder="The price of the product..."><br>
                    <input type="number" name="product-type" placeholder="Product type..."><br>
                    <button type="submit" id="submit-button" name="submit">Submit!</button>'
                </form>
            </div>
        </article>
    <body>
</html>