<?php



include_once '../shared/connection.php';

$name = $_POST['name'];
$details = $_POST['details'];
$price = $_POST['price'];
$fileobj = $_FILES['imfile'];

print_r($fileobj);

date_default_timezone_set('Asia/kolkata');

$unique_path= '../images/'.date('d_m_y_h_i_s').'.jpg';

echo "unique name=$unique_path";

move_uploaded_file($fileobj['tmp_name'],$unique_path);


$cmd = "insert into products(name,details,price,impath)
                                      values('$name' , '$details','$price','$unique_path')";

echo "Cmd = $cmd <br>";


$sql_result = mysqli_query($conn,$cmd);

if($sql_result){

    echo "Product Uploaded Successfully";
    header('location:upload_products.html');

}
else {

    echo "error in Uploading Products";
}

?>