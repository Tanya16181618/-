<?php
session_start();
include "output.php";
require_once "./functions/database_functions.php";
$conn = db_connect();


if (!empty($_POST['login'])) {
    $errorList = array();
    $email = trim($_POST['email']);
    if ($email == "") array_push($errorList, "Введите e-mail");
    $pass = trim($_POST['pass']);
    if ($pass == "") array_push($errorList, "Введите пароль");

    if($email=="admin" and $pass = "admin"){
    header("Location: Admin_v1.php");}
    else{
        echo "Данные не верны";
    }
} else if (!empty($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_unset();
        session_destroy();
        header("Location: login_admin.php");
    }
}