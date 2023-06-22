<?php
session_start();
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
    $id_del = $_GET['deleted'];
if (mysqli_query($link, "delete from test where id_test = ".$id_del."")) 
{ echo "<script>document.location = 'select-test.php';</script>"; }
else { echo "Ошибка"; };
?>