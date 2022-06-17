<?php
session_start();
$count = 0;
// connecto database
require_once "./functions/database_functions.php";
include "Admin_v1.php";	
$conn = db_connect();
if (isset($_SESSION['success'])) 
{
$title = "Админ.панель";
require_once "./template/header.php";

?>

    <p class="lead text-center ">Текущие заказы клиентов:</p>

    <form action="Admin.php" method="post">
    <div class="text-center">
	<fieldset>
		<legend class="lead text-center text-muted">Выберите клиента</legend>
		<select name="select" size="1">
			<?php

			if ($result = $conn->query('SELECT `номер_клиента`,`e-mail` FROM `клиенты`')) {

				while($myrow = ($result->fetch_array(MYSQLI_ASSOC))) {

					echo '<option value="', $myrow["номер_клиента"], '">', $myrow["номер_клиента"],$myrow["e-mail"], '</option>';


				}

				$result->close();

			}

			?>
		</select>
		<p><input name="src_4" type="submit"  value="Получить данные"></p>
		<p><input name="src_5" type="submit"  value="Показать всех"></p>
	</fieldset>
	</div>
	</form>


	<?php

		if(isset($_POST['src_4'])) {
			 $id = $_POST['select'];
             $query = getOrdersByCustomerId($conn, $id);
             ?>
			 <form action="Admin.php" method="post">

            <table class="table">
                <tr><h1>Заказы клиента:</h1>
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
        <?php
		}

	?>

		<?php

		if(isset($_POST['src_5'])) {
			  $query = "SELECT * FROM `покупают`";
			  $result = mysqli_query($conn, $query);
			   ?>
              <form action="Admin.php" method="post">

              <table class="table">
                <tr><h1>Заказы клиентов:</h1>
                    <th>Клиент</th>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Всего</th>
                    <th>Дата заказа</th>
                </tr>


                <?php
                 if( $result ){

                   while ($row = mysqli_fetch_array($result)) {
                     $conn = db_connect();

                     $nomclient=$row['Номер_Клиента'];
                     $query2 = "SELECT `e-mail` FROM `клиенты` WHERE `номер_клиента` = '$nomclient'";
			         $result2 = mysqli_query($conn, $query2);
                     $row2= mysqli_fetch_array($result2);
			         $NAME=$row2['e-mail'];

                     $prodid = $row['номер_товара'];
                     $qty = $row['количество'];
                     $date = $row['дата'];
                     $product = mysqli_fetch_assoc(getProductById($conn, $prodid));
                     ?>
                     <tr>

                        <td><?php echo $NAME; ?></td>
                        <td><?php echo $product['название']; ?></td>
                        <td><?php echo $product['цена'] . " руб."; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $qty * $product['цена'] . " руб."; ?></td>
                        <td><?php echo $date; ?></td>
                     </tr>
                     <?php
                     $total_price += $qty * $product['цена'];
                     $total_qty += $qty;

                  }

                  } ?>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th><?php echo $total_qty . " руб."; ?></th>
                    <th><?php echo $total_price . " ед."; ?></th>
                </tr>
            </table>
        </form>
        <?php
		}

	?>

<?php

} else {
    ?>
    <p class="text-warning">Вы не можете просматривать этот раздел. Сначала зайдите в систему.</p>
    <a href="login_admin.php" class="btn btn-default2">Войти</a>

    <?php
}

if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>