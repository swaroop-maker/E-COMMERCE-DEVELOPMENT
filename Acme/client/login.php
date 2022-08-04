<?php

session_start();
$_SESSION['login_status']='failed';

$username = $_POST['username'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','acme');

$cmd = "select * from users where username='$username' and password='$password'";



$sql_obj = mysqli_query($conn,$cmd);

$row_count = mysqli_num_rows($sql_obj);

if($row_count==0){
    $_SESSION['login_status']='failed';

    echo "<h3>Invalid credentials</h3>
    <br>
    <a href='login.php'>Try again<a>";
    die;    
}

$_SESSION['login_status']='success';
$_SESSION['username']=$username;
$_SESSION['cart'] = array();

header('location:view_products.php');








?>