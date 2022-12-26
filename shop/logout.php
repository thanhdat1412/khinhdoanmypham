<?php 

session_start();
unset($_SESSION['sdt']);
unset($_SESSION['matkhau']);
unset($_SESSION['current_user']);
header("location:login.php");
?>