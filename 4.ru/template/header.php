<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./style/bootstrap.min.css" rel="stylesheet">
    <link href="./style/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./style/jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">

</head>
<style>
    body {
        background-color: rgba(111, 78, 55, 0.9);
    }

</style>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"></a>
        </div>
              <?php   if (isset($title) && $title !== "Вход" && $title !== "Админ.панель") {
             ?>
        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- link to books.php -->
                <li><a href="cakes.php"><span class="glyphicon"></span>&nbsp; Продукция</a></li>
                <!-- link to contacts.php -->
                <li><a href="contact_us.php"><span class="glyphicon"></span>&nbsp; Как нас найти</a></li>
                <li><a href="email.php"><span class="glyphicon"></span>&nbsp; Обратная связь</a></li>
                <li><a href="index.php"><span class="glyphicon"></span>&nbsp; Главная страница</a></li>


                <?php

                if (isset($_SESSION['email'])) {
                $username =  $_SESSION['email'];
                ?>


                <li><a href="mycakes.php"><span class="glyphicon"></span>&nbsp; Личный кабинет</a></li>
                <li><a href="cart.php"><span class="glyphicon"></span>&nbsp; Корзина</a></li>
                <li><a href="proccess_login.php?action=logout"><span class="glyphicon"></span> Выйти</a></li>


                <?php
                    } else {
                    ?>
                <li><a href="login.php"><span class="glyphicon"></span>&nbsp; Войти</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
        <?php }elseif ($title =="Админ.панель") {
            ?>
                    <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<li ><a href="Admin_v1.php?j=dob"><span class="glyphicon"></span>&nbsp;Добавление</a></li>
<li ><a href="Admin_v3.php?j=red"><span class="glyphicon"></span>&nbsp;Редактирование</a></li>
<li ><a href="Admin_v2.php?j=obn"><span class="glyphicon"></span>&nbsp;Обновление</a></li>
<li  ><a href="Admin_v4.php?j=obn"><span class="glyphicon"></span>&nbsp;Просмотр</a></li>
<li  ><a href="index.php?j=obn"><span class="glyphicon"></span>&nbsp;Выход</a></li>



                </li>
            </ul>
        </div>
          <?php 
        } 


        ?>
    </div>
</nav>
<?php
if (isset($title) && $title == "Главная - кофейня «NoPriceCoffee»") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Кофейня «NoPriceCoffee»</h1>
            <p class="lead">Соскучились по вкусному кофе вы время серых будней? А что если мы скажем, что Вы можете выпить ароматный кофе в любом районе Санкт-Петербурга! Сеть кофеен "NoPriceCoffee" предлагает Вам попробовать без преувеличений лучший кофе в северной столице!</p>
            <p>Помимо бури позитива и восхищения наши гости могут смело рассчитывать на беспрецедентное качество своих напитков. Также в нашем меню Вы сможете увидеть самые популярные чаи, а также горячий шоколад! Очень ждем Вас в гости!</p>
            <a href="login_admin.php"><span class="glyphicon"></span>&nbsp;  </a>
        </div>
    </div>
<?php } ?>

<div class="container" id="main">