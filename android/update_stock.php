<?php
include_once 'config.php';
$stock=$_POST['stock'];
$id=$_POST['id'];
$sql="UPDATE `product` SET `stock`=$stock WHERE `id`=$id";
if($con->query($sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}