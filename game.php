<?php
include 'db.php';
if(!isset($_SESSION['id'])) header("location:index.php");
$id = $_SESSION['id'];
$sql = "Select * from users where id = '$id'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icont title -->
  <link href='assets/img/icon-title.png' rel='shortcut icon'>
  <!-- css -->
  <link rel="stylesheet" href="assets/css/game.css">
  <!-- font quicksand -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- font silkscreen -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
  <!-- fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- sweet alert -->
  <link rel="stylesheet" href="sweetalert2.min.css">

  <title>Play the Games</title>
</head>

<body onkeydown="key()" onkeyup="key2()">
  <div id="container">
  <div id="myfilter" style="display: none;"></div>
  <div id="load" style="display: none;"><img src="assets/img/load.gif" alt=""></div>
    <div class="username">
      <img src="assets/img/profile.png" alt="" id="user">
      <p id="player">Player : <?php echo $row['username']?>#<?php echo $row['id'];?></p>
    </div>
    <div>
      <img src="assets/img/background-game.jpg" alt="" id="bg">
    </div>
    <div id="content">
      <div id="card-content">
        <div id="tilte">
          <p id="jdl-card">Flutter Bird</p>
        </div>
        <div class="choose">
          <label for="style1">Choose color : </label>
          <input type="color" value="#ff0000" id="style1" />
        </div>
        <div class="button" style="display:flex; ">
          <div class="start-game">
            <input type="submit" value="START" onclick="startGame()">
          </div>
          <div class="log-out">
            <!-- <a href="logout.php"> -->
            <input type="submit" value="Log out" onclick="logout()">
            <!-- </a> -->
          </div>
        </div>
      </div>
    </div>
    <div id="btn-canvas">
      <p id="game-over" style="display: none;">Game over</p>
      <button onclick="restart()" style="display: none;" id="btn-try">Try Again</button>
      <button onclick="exit()" style="display: none;" id="btn-exit">Exit</button>
    </div>
    <footer>
      <p> Copyright ©2022 All rights reserved | This template is made with by DivadanArya |</p>
      <div class="sosmed">
        <a href=""><i class="fa-brands fa-facebook-f" style="color: black; opacity: .6; font-size: 18px;"></i></a>
        <a href="https://www.instagram.com/divdannn_/"><i class="fa-brands fa-instagram" style="color: black; opacity: .6; font-size: 18px;"></i></a>
        <a href=""><i class="fa-brands fa-twitter" style="color: black; opacity: .6; font-size: 18px;"></i></a>
      </div>
    </footer>
  </div>
  <script src="assets/javascript/game.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
</body>

</html>