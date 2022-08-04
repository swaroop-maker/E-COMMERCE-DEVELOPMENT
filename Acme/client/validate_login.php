<!DOCTYPE html>
<html lang="en">
<head>
<style>
     .cart-text{

        top:-10px;
        right:-10px;
        background-color:red;
        width:20px;
        height:20px;
        border-radius:50%;

     }

    </style>
</head>
<body>
    
</body>
</html>



<?php


session_start();

if( !isset($_SESSION['login_status'])){
    
    echo "<h3>Login First</h3>" ;
    die;

}

$login_status = $_SESSION['login_status'];

if($login_status == 'failed'){

    echo "<h3>Unauthorised attempt to login</h3>";
    die;

}

$username = $_SESSION['username'];
$localcart = $_SESSION['cart'];
$cart_count = count($localcart);

echo "<div class='d-flex justify-content-between py-3 bg-primary'>

 <div> $username</div>

 <a href='viewcart.php'>
 <button class='btn btn-danger position-relative'><i class='fa fa-shopping-cart'>
 <span class='cart-text position-absolute'>$cart_count</span></i></button> </a>

 <div><button class='btn btn-danger'><a href='logout.php' class='bg-danger text-white'>
 <i class='fa fa-sign-out'></i></a></button></div>
 </div>";

?>