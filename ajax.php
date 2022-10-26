<?php
    include 'db.php';
    if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];

    
    if (empty($name) || empty($username) || empty($password)){
        echo "Please Fill Out The Form!";
        exit;
    }
    $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }
        $Sql = 'INSERT into users (id,username,password,name) VALUES("'.$id.'","'.$username.'","'.$password.'","'.$name.'")';
        mysqli_query($conn,$Sql);

        echo 'success';
    }

    elseif (isset($_POST['Login_user']) && isset($_POST['login_password'])) {
        $Login_user = $_POST['Login_user'];
        $login_password = $_POST['login_password'];

        $Sql = "Select * from users where username ='$Login_user' && password = '$login_password'";
        $res = mysqli_query($conn,$Sql);
        
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $arr = array("status" => 'success', 'message' => 'Logged Successfully');
        }else {
            $arr = array("status" => 'error', 'message' => 'Check username or password');
        }
        echo  json_encode($arr);
    }
?>