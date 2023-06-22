<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/teacher.css">
    <link rel="stylesheet" href="defaulth/animate.css">
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
    <div class="container">
             <img src="https://image.flaticon.com/icons/png/512/248/248546.png" class="arrow" alt="">
            <div class="text">
                    Как создать свой тест и запустить его?<br>
                    <t>Откройте меню и перейдите на страницу <t style="color: #b3404a;">"Тесты"</t></t>
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                    <t>Там при клике на кнопку</t> <t margin-top: 5px;><img style="margin: 0px; transform: scale(0.75);" src="https://img.icons8.com/office/30/000000/add.png" alt=""></t>
                    Вы перейдете на страницу создания теста.
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                    Нужно указать название теста, и затем создавать вопросы один за другим пока вам не надоест =).
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                    После создания теста вы вернетесь на страницу с списков ваших тестов.
            </div>
            <img class="arrow" style="transform:rotate(90deg);" src="https://image.flaticon.com/icons/svg/364/364330.svg" alt="">
            <img style="transform:rotate(180deg) scale(-1,1);" src="https://image.flaticon.com/icons/svg/364/364330.svg" class="arrow" alt="">
            <div class="text">
                    Теперь вам доступно управление вашим тестом.<br>
                    Тут вы можете удалить тест, или изменить если вам что-то не понравится или вы ошиблись с вариантом правильного ответа. 0_o 
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                    Так же вам доступна функция запуска теста, после ее активации вы переходите на страницу ожидания тестирующих людей которыв вы предоставите код доступа к тесту. 
                    <t>Когда вам надоест ждать или все подключатся вы сможете <t style="color: #b3404a;">"Запустить тест"</t></t>
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                    Отвечайте на вопросы быстрее, после завершения таймера вы не сможете дать свой ответ! 
                    Ответя на все вопросы, вы попадете на страницу с результатами теста.
            </div>
            <img class="arrow" src="https://image.flaticon.com/icons/png/512/248/248546.png" alt="">
            <div class="text">
                Уже хотите приступить? Контроль знаний мотивирует начать что-то учить!
                <a href="select-test.php">Приступить!</a>
            </div>
            <img src="https://image.flaticon.com/icons/svg/2075/2075575.svg" alt="" class="arrow">
    </div>
</body>
</html>