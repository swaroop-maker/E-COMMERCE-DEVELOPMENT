<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        .card-head{

            width:200px;
            height:fit-content;
            border:2px solid red;
            box-shadow: 10px 10px 29px 3px rgba(119,115,120,1);

        }
        
        .card-img{

            width:100px !important;
            height:100px;

        }
        .card-img :hover{

transform:rotate(360deg);
transition:1s all;
}
        .card-price{
            font-size:22px;
            font-weight:900;
        }
        .rupee{
            font-size:18px;
            color:grey;

        }
        .price-input{

            border:none;
            font-size:36px;
            background-color:transparent;
             
        }
    </style>
</head>
<body>
    
</body>
</html>



<?php
include_once '../shared/connection.php';
include '../shared/boot.html';

session_start();

$localcart = $_SESSION['cart'];

$pid_str = implode(",",$localcart);

$cmd = "select * from products where pid in ($pid_str)";

$sql_obj = mysqli_query($conn , $cmd);

$total_rows = mysqli_num_rows($sql_obj);



echo "<div class='d-flex '>";
echo "<div class='w-75 '>";

$total = 0;
for($i = 0 ; $i <$total_rows;$i++){

    $row = mysqli_fetch_assoc($sql_obj);
    
    $pid = $row['pid']; 
    $name = $row['name'];
    $details = $row['details'];
    $price = $row['price'];
    $impath= $row['impath'];
    $total += $price;

    echo "
        <div class='d-flex w-50' >
        <div class='card-img'>
            <img class=' card-img' src='$impath' >
            </div>
             <div class='card-body'>
                <h4 m-0 class='card-title'>$name</h4>
                <p m-0 class='card-title text-danger card-price'>Rs.$price</p>

                <p m-0 class='card-text'>$details</p>
                 
              </div>
                  </div>
    ";
}

echo "</div>";

echo "<div class='w-25 bg-success'>
          
<form method='post' action='placeorder.php'>
<h2>Total price</h2>
<input name='total class='price-input' readonly value='$total'>
<textarea name='address' class='mt-3 form-control' placeholder='Delivery Address'> </textarea>
<button class='btn btn-primary'>Place Order</button>
</form>
</div>
";

echo "</div>";



?>