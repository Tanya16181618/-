<?php
session_start();
$count = 0;
// connecto database
require_once "./functions/database_functions.php";
$conn = db_connect();

$title = "Админ.панель";
require_once "./template/header.php";
?>


    <form action="Admin_v2.php" method="post">
    <div class="text-center">
	<fieldset>
		<legend class="lead text-center">Обновление названия товара</legend>

		<?php

			if (isset($_POST["src_1"])) {

				$sql = "UPDATE `товар` SET `название` = "."'".$_POST["newValue"]."'"." WHERE `название` = '".$_POST['select']."'";

				if ($conn->query($sql) === TRUE) {

					echo "<p align='center'><font color='red'>Изменения успешно проведены!</font></p>";

				}
				else {

					echo "Ошибка изменения: ", $conn->error;

				}

			}
?>

		<p><label>Введите старое содержимое поля:
			<select name="select" size="1" >
			<?php

			if ($result = $conn->query('SELECT `название` FROM `товар`')) {

				while($myrow = ($result->fetch_array(MYSQLI_ASSOC))) {

					echo '<option value="', $myrow["название"], '">', $myrow["название"], '</option>';


				}

				$result->close();

			}

			?>

		</select></label></p>
		<p><label>Введите новое содержимое поля: <input name="newValue" type="text" value="" required></label></p>
		<p><input name="src_1" type="submit" value="Изменить"></p>
	</fieldset>
	</form>

           <p></p>

           <form action="Admin_v2.php" method="post">
           <div class="text-center">
           <fieldset>
		<legend class="lead text-center">Обновление фотографии товара</legend>
		<?php
	if(isset($_POST["src_2"])) {

				$sql = "UPDATE `товар` SET `фото` = "."'".$_POST["link"]."'"." WHERE `название` = '".$_POST['select']."'";

				if ($conn->query($sql) === TRUE) {

					echo "<p align='center'><font color='red'>Изменения успешно проведены!</font></p>";

				}
				else {

					echo "Ошибка изменения: ", $conn->error;

				}

			}
    ?>
		<p><label>Введите название изделия:
			<select name="select" size="1">
			<?php

			if ($result = $conn->query('SELECT `название` FROM `товар`')) {

				while($myrow = ($result->fetch_array(MYSQLI_ASSOC))) {

					echo '<option value="', $myrow["название"], '">', $myrow["название"], '</option>';


				}

				$result->close();

			}

			?>

		</select></label></p>
		<p><label>Введите ссылку на фото: <input name="link" type="file" value="" required></label></p>

		<p><input name="src_2" type="submit" value="Изменить"></p>
	</fieldset>
	</form>

<?php
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>