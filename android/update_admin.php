<?php
include_once 'config.php';
$admin=$_POST['admin'];
$shop=$_POST['shop'];
$sql="UPDATE `shop` SET `admin`=$admin WHERE `reg.no`=$shop";
if($con->query($sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}