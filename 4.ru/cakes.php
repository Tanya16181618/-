<?php
session_start();
$count = 0;
// connecto database
require_once "./functions/database_functions.php";
$conn = db_connect();

$query = "SELECT `номер_товара`, `Фото`, `цена`, `название` FROM `товар`";

if (!empty($_GET["filter"])) {
    if ($_GET["filter"] == "Применить") {
        $typeid = $_GET["type"];
        $cals = $_GET["cals"];
        if ($cals != "" && $typeid == -1) {
            $query = "SELECT `номер_товара`, `Фото`, `цена`, `название` FROM `товар` WHERE `Калории` <= '$cals'";
        }
        else if ($cals == "" && $typeid != -1) {
            $query = "SELECT `номер_товара`, `Фото`, `цена`, `название` FROM `товар` WHERE `номер_вида` = '$typeid'";
        } else if ($cals != "" && $typeid != -1) {
            $query = "SELECT `номер_товара`, `Фото`, `цена`, `название` FROM `товар` WHERE `номер_вида` = '$typeid' AND `Калории` <= '$cals'";
        }
    }
}

$result = mysqli_query($conn, $query);
if (!$result) {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
}
$types = getAllTypes($conn);

$title = "Наша продукция";
require_once "./template/header.php";
?>
    <p class="lead text-center text-muted" style= "font-size:30px; color: #f5f5dc;">Наша продукция</p>  
    <p class="lead"> 
    <form method="GET">
        <label>Вид: </label>
        <select style="width: 10%; background-color:  #f5f5dc;color: #955f20;" id="type" name="type">
            <option style="color: #955f20;" selected class=""
                    value="-1">Выбор
            </option>
            <?php foreach ($types as $type) { ?>
                <option style="color: #955f20;" <?php if (isset($_GET['filter']) AND $_GET['type'] == $type['номер_вида']) echo "selected"; ?>
                        class=""
                        value="<?php echo $type['номер_вида'] ?>"><?php echo $type['название']; ?></option>
            <?php } ?>
        </select>

        <div style="margin-top: 1%; margin-bottom: 1%">
            <label for="cals">Не более</label>
            <input style="width: 3%; background-color:  #f5f5dc; color:  #955f20" type="text" id="cals" name="cals" value="<?php if (isset($_GET['cals']) && !isset($_GET['reset'])) echo $_GET['cals'];?>">
            <label for="cals">калорий на 100 гр.</label>
        </div>

        <input type="submit" name="filter" value="Применить" class="btn btn-default2">
        <input type="submit" name="reset" value="Очистить" class="btn btn-default">
    </form>
    </p>

<?php for ($i = 0; $i < mysqli_num_rows($result); $i++) { ?>
    <div class="row">
        <?php while ($query_row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <a href="cake.php?id=<?php echo $query_row['номер_товара']; ?>">
                    <img class="img-responsive img-thumbnail"
                         src="./images/<?php echo $query_row['Фото']; ?>">
                    <p><?php echo $query_row['название'] . " - " .$query_row['цена'] . " руб."; ?></p>
                    <p><form method="post" action="cart.php">
                      <input type="hidden" name="id" value="<?php echo $query_row['номер_товара']; ?>">
                      <input type="submit" value="Купить / Добавить в корзину" name="cart" class="btn btn-default2">
                    </form></p>
                </a>
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
if (isset($conn)) {
    mysqli_close($conn);
}
require_once "./template/footer.php";
?>