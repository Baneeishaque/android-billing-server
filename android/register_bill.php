<?php

include_once 'config.php';
$item_amount_string = filter_input(INPUT_POST, 'item_amount');
//echo $item_amount;
$items = explode("-", $item_amount_string);
$total_amount = filter_input(INPUT_POST, 'total_amount');
$shop = filter_input(INPUT_POST, 'shop');
$sql = "INSERT INTO `account`(`day`, `month`, `year`, `total-amount`, `shop-id`) VALUES (DATE_FORMAT(NOW(),'%d'),DATE_FORMAT(NOW(),'%m'),DATE_FORMAT(NOW(),'%Y'),$total_amount,$shop)";

if ($con->query($sql)) {
    $sql = "SELECT MAX(id) AS id from bill";
    $result = $con->query($sql);
    $row = mysqli_fetch_assoc($result);
    $bill_no = $row['id'] + 1;
    foreach ($items as &$value) {
//        echo $value;
        $values = explode(":", $value);
//        echo $values[0];
//        echo $values[1];
        $sql = "INSERT INTO `bill`(`id`, `product-name`, `amount`) VALUES ($bill_no,'$values[0]',0)";
        $con->query($sql);
    }

    $sql2 = "INSERT INTO `purchase`(`bill-no`, `shop-id`,`amount`, `customer-name`, `customer-mob`, `day`, `month`, `year`) VALUES ($bill_no,$shop,$total_amount,'samad','9999999999',DATE_FORMAT(NOW(),'%d'),DATE_FORMAT(NOW(),'%m'),DATE_FORMAT(NOW(),'%Y'))";
    $con->query($sql2);
    echo "0";
} else {
    echo mysqli_error($con);
}