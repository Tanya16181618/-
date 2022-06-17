<?php
session_start();
$count = 0;
// connecto database
require_once "./functions/database_functions.php";
$conn = db_connect();

$title = "Админ.панель";
require_once "./template/header.php";
//if (isset($_SESSION['email'])) 
//{
   
?>
    <form action="Admin_v1.php" method="post">
    <div class="text-center">
	<fieldset>
		    	<center><table style="font-size: 20px;">
    		<tr ><th colspan="2"><center>Добавление новых товаров</center></th></tr>
    		<tr><td style="float: right;"><br><b>Введите название:</b></td><td><br><input name="Name" type="text" value="" required ></td></tr>
    		<tr><td style="float: right;"><br><b>Введите цену:</b></td><td><br><input name="Price" type="text" value="" required></td></tr>
    		<tr><td style="float: right;"><br><b>Каллории:</b></td><td><br><input name="Calories" type="text" value="" required></td></tr>
    		<tr><td><br><b>Введите ссылку на фото:</b></td><td><br><input name="link" type="file" value="" required></td></tr>
    	</table>
    	<br>
		<p><input name="src_2" type="submit" class="btn" value="Добавить"></p></center>
    </div>
	</fieldset>
	</form>
	<?php
	if(isset($_POST["src_2"])) {

				$sql = "INSERT into `товар` (`название`, `цена`, `Калории`, `Фото`) ";
				$sql .= "VALUES ("."'".$_POST["Name"]."'".", "."'".$_POST["Price"]."'";
				$sql .= ", "."'".$_POST["Calories"]."'".", "."'".$_POST["link"]."'";
				$sql .= ")";

				if ($conn->query($sql) === TRUE) {

					echo "<p align='center'><font color='red'>Добавление успешно проведено!</p>";

				}
				else {

					echo "Ошибка добавления: ", $conn->error;

				}

			}
    ?>
<?php

if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>