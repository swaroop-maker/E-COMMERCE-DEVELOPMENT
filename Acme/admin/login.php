<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username=='acme' && $password=='admin')

{
    $_SESSION['login_status']="success";
    echo "<h2>Login success </h1>";
    header('location:upload_products.php');
}else

{
    $_SESSION['login_status']="failed";
    echo "<h2>Invalid credentials</h1>";
}

?>

