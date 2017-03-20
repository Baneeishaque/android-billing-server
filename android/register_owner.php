<?php
include_once 'config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$sql="INSERT INTO `user`(`username`, `password`, `email`, `role`,name) VALUES ('$username','$password','$email','owner','0')";
if($con->query($sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}