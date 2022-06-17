
<?php
session_start();
$count = 0;
// connecto database
require_once "./functions/database_functions.php";
$title = "Админ.панель";
require_once "./template/header.php";
$conn = db_connect();
?>
<?php 
$quer = "SELECT * FROM товар";
$result = mysqli_query($conn,$quer) or die("Ошибка запроса:".mysqli_error($conn));
?>
<?php
	                if(isset($_GET['dell'])){
                	$ma = $_GET['del'];
                	
					foreach ($ma as $key => $value){
					$add = "DELETE FROM товар WHERE номер_товара = ".$_GET['id'];
					echo $add;


                    $add = mysqli_query($conn,$add)or die("Ошибка запроса удаления" . mysqli_error($conn));
                    				echo "<span style = \"color:white;\"><br>отменено</span>";
				//unset($_SESSION['mass']);
				header('Location:Admin_v3.php');

				}
			}
			if(isset($_GET['r'])){
				$query = 'UPDATE товар SET название = \''.$_GET['Name'].'\' WHERE номер_товара ='.$_GET['id'];
				//echo $query;
				mysqli_query($conn,$query)or die("Ошибка запроса обновления" . mysqli_error($conn));
				header('Location:Admin_v3.php');

			}

				?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body><form method="get">
<div style="width: 50%;display: inline-block;">
	<?php
	echo "<table class=\"table\"><tr><th>№</th><th>Название</th><th>Цена</th><th>Калории</th><th>Фото</th></tr>";
	while ($res=mysqli_fetch_assoc($result)) {
		?>
		<input type="hidden" name="id" value = <?php echo "\"".$res['номер_товара']."\""; ?>>
		<?php
		echo "
				<td>".$res['номер_товара']."<input type=\"checkbox\" name=\"del[]\" value = \"".$res['номер_товара']."\"></td>
				<td>".$res['название']."</td>
				<td>".$res['цена']." руб</td>
				<td>".$res['Калории']." ккал</td>
				<td><img style = \"width:80px;heigt:80px;\"
                         src=\"./images/".$res['Фото']."\"></td>

		</tr>";
	}
	echo "</table>";
	?>
	<input type="submit" name="dell" class="btn" value = "удалить выбранные" style="float: right;">
	</div>
	


	

<div style="width: 50%;display: inline-block;float: left;">
	<br>
	<form method="get">
		<?php 
                    $result = 'SELECT номер_товара FROM товар';
                    $result = mysqli_query($conn, $result) or die("Ошибка " . mysqli_error($conn));
                    if ($result){
                        while($rows = mysqli_fetch_assoc($result)) {
                            $mas[] = array_values($rows);
                        }
                    }
                    
                     ?>
                     
                        <select class="select" name="l1" style="height: 33px;">
                     <?php     
                    foreach ($mas as $m){
                        foreach ($m as $Value){
                         $q = 'SELECT * FROM товар WHERE номер_товара = '.$Value;
                         $res = mysqli_query($conn, $q) or die("Ошибка " . mysqli_error($conn));
                         $r = mysqli_fetch_assoc($res);
                        echo '<option value="'.$Value.'"'.($Value == $_GET['l1'] ? ' selected="selected"' : '').'>'.$r['название'].'</option>';
                        }
                    }
                ?>
			</select>

			<input type="submit" class="btn" name="redact" value = "редактировать"></form>
			<?php 
			if(isset($_GET['redact'])){

				$query = "SELECT * FROM товар WHERE номер_товара = ".$_GET['l1'];
				$result = mysqli_fetch_assoc(mysqli_query($conn,$query));


				?>
			<br><br><center><table style="font-size: 15px;">
				<form method="get">
					
    		<tr ><th colspan="2"><center>Редактирование</center></th></tr>
    		<input type="hidden" name="id" value = <?php echo "\"".$result['номер_товара']."\""; ?>>
    		<tr><td style="float: right;"><br><b>Введите название:</b></td><td><br><input name="Name" type="text" value = <?php echo "\"".$result['название']."\""; ?> ></td></tr>
    		<tr><td style="float: right;"><br><b>Введите цену:</b></td><td><br><input name="Price" type="text" value=<?php echo "\"".$result['цена']."\""; ?> ></td></tr>
    		<tr><td style="float: right;"><br><b>Каллории:</b></td><td><br><input name="Calories" type="text" value=<?php echo "\"".$result['Калории']."\""; ?> ></td></tr>
    		<tr><td><br><b>Введите ссылку на фото:</b></td><td><br><input name="link" type="file" value=<?php echo "\"".$result['Фото']."\""; ?> ></td></tr>
    	</table>
    		<input type="submit" name="r" value="применить">
    		<input type="submit" name="ex" value="закрыть">

    	</form>

				<?php
			}

			?>


		
	</div>
	<br><form method="get"></form><br>
<?php
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>
</body>
</html>




    