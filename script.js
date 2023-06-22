   var id_selected;

  function readCookie(name) {
  var name_cook = name + "=";
  var spl = document.cookie.split(";");
  for (var i = 0; i < spl.length; i++) {
      var c = spl[i];
      while (c.charAt(0) == " ") {
          c = c.substring(1, c.length);
      }
      if (c.indexOf(name_cook) == 0) {
          return c.substring(name_cook.length, c.length);
      }
  }
  return null;
}

function GetAnswer(e) {
   id_selected = e.id;
   document.getElementById('answer1').style.filter = 'saturate(30%)';
   document.getElementById('answer2').style.filter = 'saturate(30%)';
   document.getElementById('answer3').style.filter = 'saturate(30%)';
   document.getElementById('answer4').style.filter = 'saturate(30%)';
   document.getElementById(id_selected).style.filter = 'saturate(1)';
}

function set_next_content() {
  document.location = 'modules/next_content.php';
}

function TimerQuestion() {
   // Set the date we're counting down to
   var countDownDate = new Date();
   countDownDate.setSeconds(countDownDate.getSeconds() + 60);


   // Update the count down every 1 second
   var x = setInterval(function () {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("timer").innerHTML = seconds;

      // If the count down is finished, write some text
      if (distance < 0) {
         clearInterval(x);
         document.getElementById("timer").innerHTML = "0";
         document.getElementById('answer1').setAttribute("disabled", "disabled");
         document.getElementById('answer2').setAttribute("disabled", "disabled");
         document.getElementById('answer3').setAttribute("disabled", "disabled");
         document.getElementById('answer4').setAttribute("disabled", "disabled");

         document.getElementById(id_selected).style.filter = 'saturate(1)';

      }
   }, 1000);
}

/* function login_button() {
    document.getElementById('button_login').style.width = "32px";
    document.getElementById('button_text').style.display = "none";
    document.getElementById('button_spin').style.display = "unset";
    document.getElementById('button_login').style.background = "none";
} */

/* function reg_button() {

    document.getElementById('button_login2').style.width = "32px";
    document.getElementById('button_text2').style.display = "none";
    document.getElementById('button_spin2').style.display = "unset";
    document.getElementById('button_login2').style.background = "none";
}
 */

function validatePassword() {
   var pass1 = document.getElementById("password2").value;
   var pass2 = document.getElementById("password_confirmation").value;
   if (pass1 != pass2) {
      document.getElementById("password_confirmation").setCustomValidity("Пароли не совпадают");
      return false;
   } else {
      document.getElementById("password_confirmation").setCustomValidity("");
      return true;
   }
} 

function toggle_login(e) {
   document.getElementById('login').classList.remove('active');
   document.getElementById('signup').classList.remove('active');
   e.classList.add('active');
   if (e.id == 'login') {
      document.getElementById('reg_page').style.display = 'none';
      document.getElementById('login_page').style.display = 'flex';
   } else {
      document.getElementById('login_page').style.display = 'none';
      document.getElementById('reg_page').style.display = 'flex';
   }
}


/* login / Reg */
$(document).ready(function () {
   $('input[name=sing_in]').click(
      function () {
         var login = $('input[name=login]').val();
         var password = $('input[name=password]').val();
         
         // отправляем AJAX запрос 
         $.ajax(
            {
               type: "POST",
               url: "modules/log.php",
               data: { login: login, password: password },
               success: function (response) {
                  if (response == "0") {
                     document.location = 'start-page.php';
                  }
                  else if (response == "1") {
                     document.location = 'teacher.php';
                  }
                  else {   
                        $('.result_log').html(response);
                  }
               }
            }
         );
      }
   );
   $('input[name=reg]').click(function () {      
         if (validatePassword() == true) 
         {   
            var login = $('input[name=login2]').val();
            var password = $('input[name=password2]').val();
            var try_ = 'none';   
            if($('#try_').prop('checked')) { try_ = '1'; } else { try_ = '0'; }
            // отправляем AJAX запрос
            $.ajax(
               {
                  type: "POST",
                  url: "modules/reg.php",
                  data: { login: login, password: password, try_:try_ },
                  success: function (response) {
                     if (response == "0") {
                        document.location = 'profile.php';
                     }
                     else if (response == "1") {
                        document.location = 'teacher.php';
                     }
                     else {   
                           $('.result_reg').html(respomse);
                     }
                  }
               }
            );
         } 
      }
   );
});
/* End */

function open_pass_change() {
   $('#content2').style.display = 'flex';
}

function change_pass() {         
      var pass_old = $('input[name=pass_old]').val();
      var password = $('input[name=pass]').val();
      var pass_req = $('input[name=pass_req]').val();
      var pass_old_req = $('input[name=pass_old_req]').val();
      if (password == pass_req) {
         if (pass_req == pass_old_req) {
      // отправляем AJAX запрос
      $.ajax(
         {
            type: "POST",
            url: "modules/pass_change.php",
            data: { password: password },
            success: function (response) {
               if (response == "0") { document.location = 'profile.php'; }
               else { $('.result_pass').html(respomse); }
            }
         }
      ); 
         } else { $('.result_pass').html('Не верный пароль'); }
   } else { $('.result_pass').html('Пароли не совпадают');}
}


