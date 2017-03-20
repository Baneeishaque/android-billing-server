<?php
include_once 'config.php';
$owner=$_POST['owner'];
$sql="SELECT * FROM `shop` where owner=$owner";
$result=$con->query($sql);
$emptyarray=array();
while ($row= mysqli_fetch_assoc($result))
{
    $emptyarray[]=$row;
}
echo json_encode($emptyarray);