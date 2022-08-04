<?php

$username = $_POST['username'];
$password = $_POST['password'];


$link = new mysqli('localhost','root','','acme');

$cmd = "select * from users where username='$username'";

echo "<br> cmd=$cmd";


$sql_obj = mysqli_query($link,$cmd);

$row_count = mysqli_num_rows($sql_obj);

if($row_count>0){

    echo "<h3>$username already exists</h3>
    <br>
    <a href='registration.html'>Register again<a>";
    die;    
}

$cmd = "insert into users(username, password)   values('$username','$password')";
echo "<br> cmd=$cmd";

$sql_result = mysqli_query($link,$cmd);


if($sql_result)
{
    header('location:login.html');
    
}




?>