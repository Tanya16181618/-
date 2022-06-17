<?php
$title = "Вход";

session_start();
require_once "./template/header.php";

include "output.php";
?>

    <form class="form-horizontal" method="post" action="proccess_admin.php">
        <div class="form-group">
            <label for="email" class="control-label col-md-5">E-mail</label>
            <div class="col-md-3">
                <input type="text" name="email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="control-label col-md-5">Пароль</label>
            <div class="col-md-3">
                <input type="password" name="pass" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6"></label>
            <input type="submit" value="Войти" name="login" class="btn btn-default2">
        </div>
        <?php
        output_info();
        ?>
    </form>

<?php
require_once "./template/footer.php";
?>