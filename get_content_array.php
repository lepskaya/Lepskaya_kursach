<?php
session_start();
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
    $posts=mysqli_query($link, "SELECT * FROM content WHERE id_test= '$_COOKIE[test]'");
    $array = new SplFixedArray(mysqli_num_rows($posts));
    $i = 0;
    while($row=mysqli_fetch_array($posts, MYSQLI_ASSOC)){ 
        $array[$i++] = $row['id_content'];
    }
    $_SESSION['content_array'] = $array;
    $_SESSION['array_index'] = 1;
    $_SESSION['content_now'] = $array[0];
    mysqli_query($link, "DELETE FROM question_now WHERE id_test = '$_COOKIE[test]'");
    mysqli_query($link, "INSERT INTO question_now (id_test,id_content) VALUES('$_COOKIE[test]', '$_SESSION[content_now]')");
    echo"<script>document.location = '../question.php';</script>";
?>