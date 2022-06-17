<?php
session_start();
$id = $_GET['id'];

require_once "./functions/database_functions.php";
$conn = db_connect();


$result = selectCakeById($conn, $id);
if (!$result) {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
    echo "Empty cake";
    exit;
}

$title = $row['название'];
require "./template/header.php";
?>
    <!-- Example row of columns -->
    <p style="color: #A64757;" class="lead" style="margin: 25px 0"><a href="cakes.php">Продукция</a> > <?php echo $row['название']; ?></p>
    <div class="row">
        <div class="col-md-3 text-center">
            <img class="img-responsive img-thumbnail" src="./images/<?php echo $row['Фото']; ?>">
        </div>
        <div class="col-md-6">
            <h4>Подробности</h4>
            <table class="table">
                <?php foreach ($row as $key => $value) {
                    if ($key == "номер_товара" || $key == "Фото") {
                        continue;
                    }
                    switch ($key) {
                        case "цена":
                            $key = "Цена";
                            break;
                        case "номер_вида":
                            $key = "Вид";
                            $value = getTypeById($conn, $value);
                            break;
                    }
                    ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                    <?php
                }
                if (isset($conn)) {
                    mysqli_close($conn);
                }
                ?>
            </table>
            <form method="post" action="cart.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Купить / Добавить в корзину" name="cart" class="btn btn-default2">
            </form>
        </div>
    </div>
<?php
require "./template/footer.php";
?>