<?php
session_start();
include "output.php";
require_once "./functions/database_functions.php";
$conn = db_connect();


if (!empty($_POST['login'])) {
    $errorList = array();
    if($_POST['res']==$_SESSION['res']){//проверка на робота
    
    if($_POST['email']!=get_magic_quotes_gpc()){//защита от sql инъекций
    $email = trim($_POST['email']);
    
    }else{
        if ($email == "") array_push($errorList, "Введите e-mail");
        else
        array_push($errorList, "Ошибка ввода email, запрещенная конструкция");
    }
    if($_POST['pass']!=get_magic_quotes_gpc()){//защита от sql инъекций
    $pass = trim($_POST['pass']);
    
    }
    else{
        if ($pass == "") array_push($errorList, "Введите пароль");
        else
        array_push($errorList, "Ошибка ввода пароля, запрещенная конструкция");
    }


    if (!empty($errorList)) {
        $_SESSION['errors'] = $errorList;
    } else {


        $email = mysqli_real_escape_string($conn, $email);
        $pass = mysqli_real_escape_string($conn, $pass);
        $pass = sha1($pass);

        $result = getUserByEmailAndPassword($conn, $email, $pass);
        if (!$result) {
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        if (mysqli_num_rows($result) == 0) {
            array_push($errorList, "Логин или пароль неверны!");
            $_SESSION['errors'] = $errorList;
        } else {
            $row = mysqli_fetch_assoc($result);

            if (isset($conn)) {
                mysqli_close($conn);
            }
            session_unset();
            $successList = array();
            //array_push($successList, "Успешно. <br>Теперь вы авторизованы в системе как $email");
            $_SESSION['success'] = $successList;
            $_SESSION['id'] = $row['Номер_Клиента'];
            $_SESSION['email'] = $email;
            $_SESSION['card'] = $row['карта'];

            
        }
            
        }
        if(!empty($_SESSION['id'])){
            header("Location: index.php");
        }
        else
        header("Location: login.php");
    }
    else{
        array_push($errorList, "Неверная капча");
        $_SESSION['errors'] = $errorList;
        header("Location: login.php");
    }
} 
else if (!empty($_POST['register'])) {
    header("Location: register.php");
	
} else if (!empty($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
}