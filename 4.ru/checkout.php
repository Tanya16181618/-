<?php

session_start();
require_once "./functions/database_functions.php";
// print out header here
$title = "Оформление заказа";

require "./template/header.php";

if (isset($_GET['success'])) {
    echo "<p class='succ'>Заказ успешно оформлен!</p>";
}

if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    ?>
    <table class="table">
        <tr>
            <th>Товар</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Всего</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $id => $qty) {
            $conn = db_connect();
            $product = mysqli_fetch_assoc(getProductById($conn, $id));
            ?>
            <tr>
                <td><?php echo $product['название']; ?></td>
                <td><?php echo $product['цена'] . " руб."; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $qty * $product['цена'] . " руб."; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th><?php echo $_SESSION['total_items']; ?></th>
            <th><?php echo $_SESSION['total_price'] . " руб."; ?></th>
        </tr>
    </table>
    <form method="post" action="process.php" class="form-horizontal text-right">
        <div class="form-group">
            <a href="cart.php" class="btn btn-default">Моя корзина</a>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Подтвердить" class="btn btn-default2">
        </div>
    </form>
    <p class="lead">Пожалуйста, нажмите "Подтвердить", чтобы подтвердить ваш заказ, или "Моя корзина" для добавления или
        удаления товаров.</p>
    <?php
} else {
    echo "<center><span class=\"text-warning\"style=\"color: #f5f5dc;\">Ваша корзина пуста! Добавьте товары <br> 
    Cтраница Личного кабинета будет открыта через 3 сек</span></center>";
     header( "refresh:3;url=mycakes.php" );
	
}
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>