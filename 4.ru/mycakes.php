<?php


session_start();
require_once "./functions/database_functions.php";
require_once "./functions/cart_functions.php";


$title = "Личный кабинет";
require "./template/header.php";
$conn = db_connect();
$total_price = 0;
$total_qty = 0;
if (isset($_SESSION['email'])) {
    $id = $_SESSION['id'];
    $query = getOrdersByCustomerId($conn, $id);
    $querry = getUserInfo($conn, $id);
    if ($querry != null) {
        ?>

        <form action="cart.php" method="post">
            <table class="table">
             <tr><h1>Личная информация</h1>
                    <th>Телефон:</th>
                    <th>E-mail:</th>
                    <?php
                while ($row = mysqli_fetch_array($querry)) {
                    $conn = db_connect();
                    $prodid1 = $row['телефон'];
                    $qty1 = $row['e-mail'];
                    ?>
                    <tr>
                       <td><?php echo $prodid1; ?></td>
                       <td><?php echo $qty1; ?></td>
                    </tr>
                    <?php
                } ?>
                </tr>
            </table>
            <table class="table">
                <tr><h1>Ваши заказы</h1>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Всего</th>
                    <th>Дата заказа</th>
                </tr>



                <?php
                if( $query ){

                  while ($row = mysqli_fetch_array($query)) {
                    $conn = db_connect();
                    $prodid = $row['номер_товара'];
                    $qty = $row['количество'];
                    $date = $row['дата'];
                    $product = mysqli_fetch_assoc(getProductById($conn, $prodid));
                    ?>
                    <tr>
                        <td><?php echo $product['название']; ?></td>
                        <td><?php echo $product['цена'] . " руб."; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $qty * $product['цена'] . " руб."; ?></td>
                        <td><?php echo $date; ?></td>
                    </tr>
                    <?php
                    $total_price += $qty * $product['цена'];
                    $total_qty += $qty;
                  } ?>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th><?php echo $total_qty . " ед."; ?></th>
                    <th><?php echo $total_price . " руб."; ?></th>
                </tr>
                <?php }  ?>
            </table>
        </form>
        <br/><br/>
        <p class="text-center"><a href="cakes.php" class="btn btn-default2 ">Купить ещё!</a>
        <?php
    } else {
        ?>
        <p class="text-warning text-center">У вас ещё нет заказов.</p>
        <p class="text-center"><a href="cakes.php" class="btn btn-default2 ">За покупками!</a>
        <?php
    }
} else {
    ?>
    <p class="text-warning">Вы не можете просматривать этот раздел. Сначала зайдите в систему.</p>
    <a href="login.php" class="btn btn-default2">Войти</a>

    <?php
}

if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>