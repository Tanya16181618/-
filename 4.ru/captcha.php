<?php
session_start();
 
$a = rand(1,10);
$b = rand(1,10);
$_SESSION['res'] = $a + $b;

?>