<?php
session_start();

$conn = mysqli_connect("localhost",'root','','p-gim-akhir');
if (!$conn) {
    die("Connection Failed :-".mysqli_connect_error());
}
?>