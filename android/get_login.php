<?php
include_once 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT COUNT(`username`) AS `count`,username,id,`shop_id`,role FROM `user` WHERE username='$username' and password='$password'";
$result = $con->query($sql);
$emptyarray = array();
$emptyarray[] = mysqli_fetch_assoc($result);
echo json_encode($emptyarray);

