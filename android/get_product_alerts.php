<?php
include_once 'config.php';
$sql="SELECT * FROM `product` where `minimum-stock` >= stock";
$result=$con->query($sql);
$emptyarray=array();
while ($row= mysqli_fetch_assoc($result))
{
    $emptyarray[]=$row;
}
echo json_encode($emptyarray);