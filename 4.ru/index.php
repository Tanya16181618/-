<?php
session_start();
$count = 0;
// connect to database
include "output.php";
$title = "Главная - кофейня «NoPriceCoffee»";
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
$row = select3LatestCakes($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <!-- Example row of columns -->

    <p class="lead text-center text-muted" style="color: #f5f5dc;">Наши хиты</p>
    <div class="row">
        <?php foreach ($row as $product) { ?>
            <div class="col-md-4">
                <a href="cake.php?id=<?php echo $product['номер_товара']; ?>">
                    <img class="img-responsive img-thumbnail" src="./images/<?php echo $product['Фото']; ?>">
                </a>
            </div>
        <?php } ?>
    </div>
<?php
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>
</body>
</html>



