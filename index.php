<?php
    if(isset($_POST['regist'])){
        $connec = new mysqli('localhost','root','','pa_pgim');

        $username = $connec->real_escape_string ($_POST ['usernamePHP']);
        $email = $connec->real_escape_string ($_POST ['emailPHP']);
        $password = $connec->real_escape_string ($_POST ['passwordPHP']);

        $data = $connec->query(query: "INSERT INTO `user` VALUES ('NULL','$username','$email','$password')");
        if  ($data) {
            exit('Registration success...');
        }else
            exit('failed, try again...');
    }
?>

<!-- login -->
<?php
session_start();

if(isset($_SESSION['loggedIN'])){
    header('Location: LS.php');
    exit();
}
    if(isset($_POST['login'])){
        $connec = new mysqli('localhost','root','','pa_pgim');

        $username = $connec->real_escape_string ($_POST ['usernamePHP']);
        $password = $connec->real_escape_string ($_POST ['passwordPHP']);

        $data = $connec->query(query: "SELECT id FROM user WHERE username='$username' AND password='$password'");
        if  ($data-> num_rows > 0) {
            $_SESSION['loggedIN'] = '1';
            $_SESSION['username'] = $username;
            exit('Login success...');
        }else
            exit('failed, try again...');
            
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-[#0F1123]">
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form autocomplete="off" action="index.php" method="post">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" id="username" name="txt" placeholder="User name" required="">
                <input type="email" id="email" name="email" placeholder="Email" required="">
                <input type="password" id="password" name="pswd" placeholder="Password" required="">
                <button id="regist">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form autocomplete="off" method="post" action="index.php">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" placeholder="username" id="username2" required="">
                <input type="password" name="pswd" placeholder="Password" id="password2" required="">
                <button id="login">Login</button>
            </form>
        </div>

        <p id="response"></p>

        <!-- SCRIPT -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#regist").on('click', function () {
                    var email = $("#email").val();
                    var username = $("#username").val();
                    var password = $("#password").val();


                    if (email == "" || username == "" || password == "")
                        swal({
                            title: "Failed",
                            text: "Please Check Your Inputs!",
                            icon: "warning",
                            button: "try again",
                        });
                    else {

                        $.ajax({
                            url: 'index.php',
                            method: 'POST',
                            data: {
                                regist: 1,
                                emailPHP: email,
                                usernamePHP: username,
                                passwordPHP: password
                            },
                            success: function (response) {
                                $("#response").html(response);

                            },
                            dataType: 'text '
                        })
                    }


                })
            });

            $(document).ready(function () {
                $("#login").on('click', function () {
                    var username = $("#username2").val();
                    var password = $("#password2").val();

                    if (username == "" || password == "")
                        swal({
                            title: "Failed",
                            text: "Please Check Your Inputs!",
                            icon: "warning",
                            button: "try again",
                        });
                    else {

                        $.ajax({
                            url: 'index.php',
                            method: 'POST',
                            data: {
                                login: 1,
                                usernamePHP: username,
                                passwordPHP: password
                            },
                            success: function (response) {
                                $("#response").html(response);


                                if (response.indexOf('success') >= 0)
                                    window.location = 'LS.php';
                            },
                            dataType: 'text '
                        })
                    }


                })
            })
        </script>

</body>

</html>