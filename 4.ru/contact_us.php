<?php
session_start();
$title = "Как нас найти";
require_once "./template/header.php";
$count = 0;
require_once "./functions/database_functions.php";
$conn = db_connect();

$result = selectAllConfectioneries($conn);
?>


    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
        <fieldset>
	          
		   <legend style= "font-size:25px; color: #f5f5dc; font-weight: bold">Заходите в наши кофейни</legend>  
		   
            <p class="lead" style= "font-size:20px; color: #f5f5dc;">Мы всегда рады видеть вас, не проходите мимо.</p>
        </fieldset>
    </div>
    <div class="col-md-3"></div>

<?php for ($i = 0; $i < mysqli_num_rows($result); $i++) { ?>
    <div class="row">
        <?php while ($query_row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4"  style="font-size:14px; color: #ffe5b4; font-weight: lighter">

                    <p><?php echo $query_row['Геолокация']; ?><p>
                    <p><?php echo $query_row['Название']; ?><p>
                    <p>Часы работы: <?php echo $query_row['Часы_работы']; ?></p>
                    <p><?php echo $query_row['Телефон']; ?></p>


            </div>
            <?php
            $count++;
            if ($count >= 3) {
                $count = 0;
                break;
            }
        } ?>
    </div>
    <?php
}
require_once "./template/footer.php";
?>

