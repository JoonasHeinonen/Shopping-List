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
            $sql = "SELECT * FROM product;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['product_name'] . ", " . $row['product_prize'] . " €<br>";
                }
            }
        ?>
    <body>
</html>