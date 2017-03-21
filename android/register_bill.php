<?php

include_once 'config.php';
$item_amount_string = filter_input(INPUT_POST, 'item_amount');
//echo $item_amount;
$items = explode("-", $item_amount_string);
//print_r($items);
$total_amount = filter_input(INPUT_POST, 'total_amount');
$shop = filter_input(INPUT_POST, 'shop');


$bill_id_sql = "SELECT MAX(id) AS id from bill";
$result = $con->query($bill_id_sql);
//print_r($result);

$row = mysqli_fetch_assoc($result);
echo $row['id'];
if ($row['id'] == NULL) {
    $bill_no = 1;
} else {
    $bill_no = $row['id'] + 1;
}
//echo $bill_no;

foreach ($items as &$value) {
//        echo $value;
    $values = explode(":", $value);
//        echo $values[0];
//        echo $bill_id_sqlues[1];
    $bill_insertion_sql = "INSERT INTO `bill`(`id`, `product-name`, `amount`) VALUES ($bill_no,'$values[0]','$values[1]')";
    if ($con->query($bill_insertion_sql)) {
        echo "0";
    } else {
        echo mysqli_error($con);
        exit();
    }
}

$sql2 = "INSERT INTO `purchase`(`bill-no`, `shop-id`,`amount`, `customer-name`, `customer-mob`, `day`, `month`, `year`) VALUES ($bill_no,$shop,$total_amount,'samad','9999999999',DATE_FORMAT(NOW(),'%d'),DATE_FORMAT(NOW(),'%m'),DATE_FORMAT(NOW(),'%Y'))";
if ($con->query($sql2)) {
    echo "0";
} else {
    echo mysqli_error($con);
    exit();
}


