<?php
session_start();
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
    if (mysqli_query($link, "SELECT * FROM user WHERE login = '".$_SESSION['login']."'"))
    { echo "OK"; }
    else { echo mysqli_error($link); }
?>