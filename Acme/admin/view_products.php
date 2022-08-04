<!DOCTYPE html>
<html lang="en">
<head>
  <style>
        .card-head{

            width:300px;
            height:fit-content;
            border:2px solid red;
            box-shadow: 10px 10px 29px 3px rgba(119,115,120,1);

        }
        
        .card-img{

            width:inherit;
            max-height:250px;

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
    </style>
</head>
<body>
    
</body>
</html>



<?php 

include_once '../shared/connection.php';
include '../shared/boot.html';

$sql_obj = mysqli_query($conn , "select * from products");


$total_rows = mysqli_num_rows($sql_obj);

echo "<div class='d-flex justify-content-start'>";

for($i = 0 ; $i <$total_rows;$i++){

    $row = mysqli_fetch_assoc($sql_obj);
    
    $pid = $row['pid']; 
    $name = $row['name'];
    $details = $row['details'];
    $price = $row['price'];
    $impath= $row['impath'];

    echo "
        <div class='m-4  card card-head border-primary' >
        <div class='card-img'>
            <img class=' card-img' src='$impath' >
            </div>
             <div class='card-body'>
                <h4 m-0 class='card-title'>$name</h4>
                <p m-0 class='card-title text-danger card-price'>Rs.$price</p>

                <p m-0 class='card-text'>$details</p>
                  <a href='deletepdt.php?pid=$pid' class='btn btn-danger' 
                  ><i class='fa fa-trash'></i></a>
              </div>
                  </div>
    ";
}

echo "</div>"

?>