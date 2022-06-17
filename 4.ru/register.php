<?php
$title = "Регистрация нового пользователя";
session_start();
require_once "./template/header.php";
include "captcha.php";
include "output.php";
?>


    <form class="form-horizontal" method="post" action="process_registration.php">
        <div class="form-group">
            <label for="email" class="control-label col-md-5">E-mail</label>
            <div class="col-md-3">
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="tel" class="control-label col-md-5"pattern="8[0-9]{3}-[0-9]{3}-[0-9]{4}" required>Телефон</label>
            <div class="col-md-3">
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pass_1" class="control-label col-md-5">Пароль</label>
            <div class="col-md-3">
                <input type="password" name="pass_1" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pass_2" class="control-label col-md-5">Пароль ещё раз</label>
            <div class="col-md-3">
                <input type="password" name="pass_2" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="control-label col-md-5">Капча: <?php echo $a. ' + ' .$b. '   = ';?></label>
            <div class="col-md-3">
                <input type="text" name="res" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6"></label>
            <input type="submit" value="Зарегистрироваться" name="register_done" class="btn btn-default2">
        </div>
        <?php
        output_info();
            if(!empty( $_SESSION['id'])){
        echo "главная страница будет открыта через 3 сек";
     header( "refresh:3;url=index.php" );
    }
        ?>

    </form>

<?php
require_once "./template/footer.php";
?>