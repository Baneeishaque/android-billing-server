<?php
include_once 'config.php';
$name=$_POST['name'];
$unit=$_POST['unit-price'];
$stock=$_POST['stock'];
$minimum=$_POST['minimum-stock'];
$shop=$_POST['shop'];
$sql="INSERT INTO `product`(`name`, `unit-price`, `stock`, `minimum-stock`,shop_id) VALUES ('$name',$unit,$stock,$minimum,$shop)";
if($con->query($sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}