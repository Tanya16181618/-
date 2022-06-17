<?php
session_start();
include "output.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
$errorList = array();
$successList = array();
if (!empty($_POST['register_done'])) {
     if($_POST['res']==$_SESSION['res']){//проверка на робота
    
       if($_POST['email']!=get_magic_quotes_gpc()){//защита от sql инъекций
    $email = trim($_POST['email']);
    
    }else{
        if ($email == "") array_push($errorList, "Введите e-mail");
        else{
        array_push($errorList, "Ошибка ввода email, запрещенная конструкция");
        $_SESSION['errors'] = $errorList;
        header("Location: register.php");
    }
    }
    $phone = trim($_POST['phone']);
    if ($phone == "") array_push($errorList, "Введите введите телефон");
        if($_POST['pass_1']!=get_magic_quotes_gpc()){//защита от sql инъекций
    $pass = trim($_POST['pass_1']);
    
    }
    else{
        if ($pass == "") array_push($errorList, "Введите пароль");
        else{
        array_push($errorList, "Ошибка ввода пароля, запрещенная конструкция");
                $_SESSION['errors'] = $errorList;
        header("Location: register.php");

    }
    }
    $confirm_pass = trim($_POST['pass_2']);
    if ($confirm_pass == "") array_push($errorList, "Введите пароль");

    if ($confirm_pass != $pass) array_push($errorList, "Пароли не совпадают");

    if (!empty($errorList)) {

        $_SESSION['errors'] = $errorList;
        header("Location: register.php");
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);
        $pass = mysqli_real_escape_string($conn, $pass);
        $pass = sha1($pass);

        $newId = insertIntoCustomers($conn, $email, $phone, $pass);

        array_push($successList, "Регистрация успешна. <br>Теперь вы авторизованы в системе как $email");
        $_SESSION['success'] = $successList;
        $_SESSION['id'] = $newId;
        $_SESSION['email'] = $email;
        $_SESSION['card'] = 5;
    }
    header("Location: register.php");

}
else{
        array_push($errorList, "Неверная капча");
        $_SESSION['errors'] = $errorList;
        header("Location: register.php");
}
}
?>