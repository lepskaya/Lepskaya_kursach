<?php
session_start();
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
$array = $_SESSION['content_array'];
if ($_SESSION['array_index'] <= count($array)-1) {
    $_SESSION['content_now'] = $array[$_SESSION['array_index']++];
    mysqli_query($link, "UPDATE question_now SET id_content = '$_SESSION[content_now]' WHERE id_test = '$_COOKIE[test]'");
    echo"<script>document.location = '../question.php';</script>";
} else {
    mysqli_query($link, "DELETE FROM question_now WHERE id_test = '$_COOKIE[test]'");
    unset($_SESSION['content_array']);
    unset($_SESSION['array_index']);
    unset($_SESSION['content_now']);
    echo"<script>document.location = '../results.html';</script>";
}

?>