<?php
session_start();

$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
    $log = $_POST[login];
    $pass = $_POST[password];
    $posts = mysqli_query($link, "Select login from user where login = '".$log."'");
    $row=mysqli_fetch_array($posts, MYSQLI_ASSOC);
    if (mysqli_num_rows($posts) <= 0) {  echo "Login не существует"; } 
     else  {
      $posts = mysqli_query($link, "Select * from user where login = '".$log."' and password = '".$pass."'");
      $row = mysqli_fetch_array($posts, MYSQLI_ASSOC);
      if (mysqli_num_rows($posts) <= 0) { echo "Пароль не верный"; } 
        else { 
            $_SESSION['login'] = $log;
            echo "$row[try]";
        }
      }
?>