<?php

include_once 'config.php';
$shop = $_POST['shop'];
$sql = "SELECT DISTINCT id FROM `bill`";
$result = $con->query($sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
