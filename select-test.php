<?php
session_start();
$adresserver = 'localhost';
$nameuser='root';
$password='';
$namebd='teste';
$link=mysqli_connect($adresserver, $nameuser, $password) or die('Ошибка'.mysql_error($link));
    mysqli_select_db($link,$namebd) or die('Не могу подключиться');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/select-test.css">
    <link rel="stylesheet" href="defaulth/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>TESTE</title>
</head>
<body>
            <div class="header_menu">
            <div class="header_menu_button">
                <div class="menuico animated fadeInLeft" onclick="menuico(this)">    
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
            <div class="logo">
                <img src="img/logo.png" class="animated fadeInDown">
            </div>
            <a href="index.php"><div class="header_login_button"> <!-- animated fadeInRight -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#333333"><path d="M86,16.125c-38.52783,0 -69.875,31.34717 -69.875,69.875c0,38.52783 31.34717,69.875 69.875,69.875c38.52783,0 69.875,-31.34717 69.875,-69.875c0,-38.52783 -31.34717,-69.875 -69.875,-69.875zM86,26.875c32.71192,0 59.125,26.41309 59.125,59.125c0,32.71192 -26.41308,59.125 -59.125,59.125c-32.71191,0 -59.125,-26.41308 -59.125,-59.125c0,-32.71191 26.41309,-59.125 59.125,-59.125zM86,43c-14.78125,0 -26.875,12.09375 -26.875,26.875c0,8.14648 3.80029,15.39014 9.57422,20.32422c-12.09375,6.27783 -20.32422,18.91748 -20.32422,33.42578h10.75c0,-14.90722 11.96778,-26.875 26.875,-26.875c14.90723,0 26.875,11.96778 26.875,26.875h10.75c0,-14.5083 -8.23047,-27.14795 -20.32422,-33.42578c5.77393,-4.93408 9.57422,-12.17773 9.57422,-20.32422c0,-14.78125 -12.09375,-26.875 -26.875,-26.875zM86,53.75c8.96533,0 16.125,7.15967 16.125,16.125c0,8.96533 -7.15967,16.125 -16.125,16.125c-8.96533,0 -16.125,-7.15967 -16.125,-16.125c0,-8.96533 7.15967,-16.125 16.125,-16.125z"></path></g></g></svg>
            </div></a>
        </div>

        <div class="menu" id="menu1">
            <div class="menu_item" onclick="document.location='teacher.php'">
                Главная
            </div>
            <div class="menu_item"  onclick="document.location='profile.php'">
                Профиль
            </div>
            <div class="menu_item"  onclick="document.location='select-test.php'">
                Тесты
            </div>
        </div>
        <script>
    function menuico(x) {
        x.classList.toggle("change");
        var s = document.getElementById("menu1");
        var left = window.getComputedStyle(s, null).left;
        var width = window.getComputedStyle(s, null).width;
        if (width == "20%") {
            if (left < "0px") {s.style.left = "0px";} else {s.style.left = "-25%";}        
        } else {
            if (left < "0px") {s.style.left = "0px";} else {s.style.left = "-105%";}        
        }
    }
        </script>
         <script>
            $(document).ready(function () {
                  $('.test_menu-start').click(function () {
                     document.cookie = 'test=' + this.id; 
                     document.location = 'modules/get_content_array.php';  
            });
            });
         </script>
    <div class="container">
         <div class="content">
          <!--  <div class="filter">
            <form>
                <input type="text" size="30" onkeyup="showResult(this.value)">
                <div id="livesearch"></div>
            </form>
            </div> -->

            <div class="list">
            <?php
             $posts=mysqli_query($link, "SELECT * FROM test WHERE login = '".$_SESSION['login']."'");
             while ($row=mysqli_fetch_array($posts, MYSQLI_ASSOC)) {
              echo ' <div class="test" id="'.$row[id_test].'">
                  <div class="test_name">'.$row[name].'</div>';
                  $posts2=mysqli_query($link, "SELECT count(id_content) as f FROM content WHERE id_test = '".$row[id_test]."'");
                  $row2=mysqli_fetch_array($posts2, MYSQLI_ASSOC);
               echo '<div class="test_count">'.$row2[f].' вопрос(а/ов)</div>
                  <div class="test_menu">
                     <div class="test_menu-start" id="'.$row[id_test].'"><img title="запустить тест" src="https://img.icons8.com/office/30/000000/start.png"/></div>
                     <div class="test_menu-edit" id="'.$row[id_test].'"><img title="изменить тест" src="https://img.icons8.com/officel/30/000000/edit-property.png"/></div>
                     <div class="test_menu-delete" id="'.$row[id_test].'"><a href="delete-test.php?deleted='.$row[id_test].'"><img title="удалить тест" src="https://img.icons8.com/office/30/000000/delete-view.png"/></a></div>
                  </div>
               </div> ';
             };
             ?>
               <div class="test" id="test-create">
                  <img onclick="" title="создать тест" class="test-create" src="https://img.icons8.com/office/30/000000/add.png"/>
               </div>
            </div>
         </div>
    </div>
</body>
</html>