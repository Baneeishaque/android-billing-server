<?php
include_once 'config.php';
$shop=$_POST['shop'];
$sql="SELECT * FROM `product` where shop_id=$shop";
$result=$con->query($sql);
$emptyarray=array();
while ($row= mysqli_fetch_assoc($result))
{
    $emptyarray[]=$row;
}
echo json_encode($emptyarray);