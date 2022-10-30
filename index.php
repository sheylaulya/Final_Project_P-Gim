<?php
   include 'db.php';
   if(isset($_SESSION['id'])) header("location:game.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-16">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Flappy Square</title>
   <!-- title icon -->
   <link href='assets/img/icon-title.png' rel='shortcut icon'>
   <!-- css -->
   <link rel="stylesheet" href="assets/css/login.css">
   <!-- font -->
   <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Silkscreen:wght@400;700&display=swap"
      rel="stylesheet">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">

   <!-- sweet alert -->
   <link rel="stylesheet" href="sweetalert2.min.css">

</head>

<body>
   <nav>
      <h1>Flappy Square</h1>
      <ul>
         <li class="active"></li>
      </ul>
      <div class="underline"></div>
   </nav>
   <div class="container">
      <button id="btn">Click Here</button>
   </div>
   <div class="overlay">
   </div>
   <div class="main-popup">
      <div class="popup-header">
         <div id="popup-close-button"><a href="#"></a></div>
         <ul>
            <li><a href="#" id="sign-in">Sign In</a></li>
            <li><a href="#" id="register">Register</a></li>
         </ul>
      </div>
      <!--.popup-header-->
      <div class="popup-content">
         <form class="register" id="SIGNUPFORM" method="POST" class="register">
            <input name="id" type="hidden" placeholder="id" class="id" id="id" />
            <label for="fullname">Full Name </label>
            <input name="name" type="text" placeholder="Full Name" class="username" />
            <label for="username">username </label>
            <input name="username" type="text" placeholder="Username" class="username" />
            <label for="password">Password </label>
            <input name="password" type="password" placeholder="Password" class="username" />
            <p class="check-mark">
               <input type="checkbox" id="remember-me">
               <label for="remember-me">Remember me</label>
            </p>
            <input type="submit" id="submit" value="Submit">
         </form>

         <form action="#" class="sign-in" id="LoginForm" method="post">
            <label for="username">Username </label>
            <input type="text" name="Login_user" placeholder="username" id="name-user" autocomplete="off"
               class="username">
            <label for="password">Password </label>
            <input name="login_password" type="password" placeholder="Password" class="username" />
            <p class="check-mark">
               <input type="checkbox" id="accept-terms">
               <label for="accept-terms">I agree to the <a href="#">Terms</a></label>
            </p>
            <input type="submit" id="submit" value="Submit">
         </form>
      </div>
      <!--.popup-content-->
   </div>
   <!--.main-popup-->

   <footer>
      <p> Copyright ©2022 All rights reserved | Design By Sheyla Aulya |</p>
      <div class="sosmed">
         <a href=""><i class="fa-brands fa-facebook-f" style="color: black; opacity: .6; font-size: 18px;"></i></a>
         <a href="https://www.instagram.com/divdannn_/"><i class="fa-brands fa-instagram"
               style="color: black; opacity: .6; font-size: 18px;"></i></a>
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
   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>

</html>