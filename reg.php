<?php
session_start();
?>
<?php
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
    $log = $_POST[login];
    $pass = $_POST[password];
    $try = $_POST[try_];
    $posts = mysqli_query($link, "Select login from user where login = '".$log."'");
      $row = mysqli_fetch_array($posts, MYSQLI_ASSOC);
      if (mysqli_num_rows($posts) > 0) { echo "Login занят"; } 
     else 
     if (mysqli_query($link, "INSERT INTO `user`(`login`, `password`, `try`) VALUES ('".$log."','".$pass."','".$try."')")) 
     {
      $_SESSION['login'] = $log;
        echo "OK";
     } else { echo mysqli_error($link); } 
?>
