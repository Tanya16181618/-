<?php
// the shopping cart needs sessions, to start one
/*
    Array of session(
        cart => array (
            book_isbn (get from $_POST['book_isbn']) => number of books
        ),
        items => 0,
        total_price => '0.00'
    )
*/
session_start();
require_once "./functions/database_functions.php";
require_once "./functions/cart_functions.php";


// book_isbn got from form post method, change this place later.
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}


if (isset($id)) {
    // new iem selected
    if (!isset($_SESSION['cart'])) {
        // $_SESSION['cart'] is associative array that bookisbn => qty
        $_SESSION['cart'] = array();

        $_SESSION['total_items'] = 0;
        $_SESSION['total_price'] = '0.00';
    }

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } elseif (isset($_POST['cart'])) {
        $_SESSION['cart'][$id]++;
        unset($_POST);
    }
}

// if save change button is clicked , change the qty of each bookisbn
if (isset($_POST['save_change'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        if ($_POST[$id] == '0') {
            unset($_SESSION['cart']["$id"]);
        } else {
            $_SESSION['cart']["$id"] = $_POST["$id"];
        }
    }
}

if (!empty($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $id = $_GET["id"];
        unset($_SESSION['cart']["$id"]);
    }
}
// print out header here
$title = "Корзина";
require "./template/header.php";

if (isset($_SESSION['email'])) {
    if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        $_SESSION['total_items'] = total_items($_SESSION['cart']);
        ?>

        <form action="cart.php" method="post">
            <table class="table">
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Всего</th>
                    <th>Удалить</th>
                </tr>
                <?php

                 foreach ($_SESSION['cart'] as $id => $qty) {
                    $conn = db_connect();
                    $product = mysqli_fetch_assoc(getProductById($conn, $id));
                    ?>
                    <tr>
                        <td><?php echo $product['название']; ?></td>
                        <td><?php echo $product['цена'] . " руб."; ?></td>
                        <td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $id; ?>"></td>
                        <td><?php echo $qty * $product['цена'] . " руб."; ?></td>
                        <td><a style="color: red;" href="cart.php?action=delete&id=<?php echo $id; ?>">Удалить</a></td>
                    </tr>
                 <?php } ?>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th><?php echo $_SESSION['total_items'] . " ед."; ?></th>
                    <th><?php echo $_SESSION['total_price'] . " руб."; ?></th>
                </tr>
            </table>
            <input type="submit" class="btn btn-success" name="save_change" value="Сохранить изменения">
        </form>
        <br/><br/>
        <a href="checkout.php" class="btn btn-default2">Оформить заказ</a>
        <a href="cakes.php" class="btn btn-default">Продолжить покупки</a>
        <?php
    } else {
        echo "<p class=\"text-warning text-center\" style=\"color: #f5f5dc;\">Ваша корзина пуста! Добавьте товар.</p>
        <p class=\"text-center\"><a href=\"cakes.php\" class=\"btn btn-default2 \">Купить еще!</a>";
    }
    if (isset($conn)) {
        mysqli_close($conn);
    }
} else {
    ?>
    <p class="text-warning"style="color: #f5f5dc;">Вы не можете совершать покупки. Сначала зайдите в систему.</p>
    <a href="login.php" class="btn btn-default2">Войти</a>

    <?php
}
require_once "./template/footer.php";
?>