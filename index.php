<?php
   include 'db.php';
   if(isset($_SESSION['id'])) header("location:game.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-16">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Flutter bird</title>
   <!-- title icon -->
   <link href='assets/img/icon-title.png' rel='shortcut icon'>
   <!-- css -->
   <link rel="stylesheet" href="assets/css/login.css">
   <!-- font Quicksand -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
   <!-- font silcscreen -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
   <!-- fontawsome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- sweet alert -->
   <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
   <div class="container">
      <div class="c1">

         <div class="c11">
            <h1 class="mainhead">PICK YOUR SPOT</h1>
            <p class="mainp">Just click the buttons below to toggle between SignIn & SignUp</p>
         </div>
         <div id="left">
            <h1 class="s1class"><span>SIGN</span><span class="su">IN</span>
            </h1>
         </div>
         <div id="right">
            <h1 class="s2class"><span>SIGN</span><span class="su">UP</span></h1>
         </div>
      </div>
      <div class="c2">
         <form action="#" class="signup" id="SIGNUPFORM" method="POST">
            <h1 class="signup1">SIGN UP</h1>
            <br><br><br><br>
            <input name="id" type="hidden" placeholder="id" class="id" id="id" />
            <input name="name" type="text" placeholder="Full Name" class="username" />
            <input name="username" type="text" placeholder="Username" class="username" />
            <input name="password" type="password" placeholder="Password" class="username" />
            <button class="btn">Sign Up</button>
         </form>
         <form action="#" class="signin" id="LoginForm" method="post">
            <h1 class="signup1">SIGN IN</h1>
            <input type="text" name="Login_user" placeholder="username" id="name-user" autocomplete="off"
               class="username">
            <input type="password" name="login_password" placeholder="Password" id="pw-login" autocomplete="off"
               class="username">
            <button class="btn">Get Started</button>
         </form>
      </div>
   </div>
   </div>
   <footer>
      <p> Copyright ©2022 All rights reserved | This template is made with by DivadanArya |</p>
      <div class="sosmed">
        <a href=""><i class="fa-brands fa-facebook-f" style="color: black; opacity: .6; font-size: 18px;"></i></a>
        <a href="https://www.instagram.com/divdannn_/"><i class="fa-brands fa-instagram" style="color: black; opacity: .6; font-size: 18px;"></i></a>
        <a href=""><i class="fa-brands fa-twitter" style="color: black; opacity: .6; font-size: 18px;"></i></a>
      </div>
    </footer>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="assets/javascript/function.js"></script>
   <script src="assets/javascript/animate.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="sweetalert2.min.js"></script>
</body>

</html>