<?php
include_once 'config.php';
$name=$_POST['name'];
$category=$_POST['category'];
$location=$_POST['location'];
$owner=$_POST['owner'];
$sql="INSERT INTO `shop`(`name`, `category`, `location`,owner) VALUES ('$name','$category','$location','$owner')";
if($con->query($sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}