<?php
session_start();
$title = "Обратная связь";
require_once "./template/header.php";
require_once"function.php";
?>

    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
        <fieldset>
          <legend>Есть вопросы? Напишите нам!</legend>
          <form  method="post"  class="myForm">
            <p id="sendEr"></p>
            <input  required  name="email" class="input" type="text" placeholder="Введите ваш email">
            <br>
            <textarea name="userText" placeholder="Ваше сообщение"></textarea>
            <br>

            <input type="submit" class="input_form" value="Отправить">
          </form>
          </fieldset>
    </div>
    <div class="col-md-3"></div>

<?
    if(isset($_POST['email'])){
        mail("tanyabrezgina@mail.com","Обратная связь", $_POST['userText'], $_POST['email']);

    }
    ?>
<div class="col-md-12 text-center">
<?require_once "./template/footer.php";
?>
</div>


