<?php

include 'android_connection.php';

$product_id=$_POST['product_id'];




$sql="UPDATE product SET SQLStatus=0 WHERE product_id='$product_id'";

if (mysqli_query($conn, $sql))
 {

  $pass['status']="Success";

 }
 else
 {
  
  $pass['status']="Failed";

 }

 print_r(json_encode($pass));

?>