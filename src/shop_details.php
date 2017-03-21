<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>


    <head>
        <title>User Dashboard</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
        <style media="all" type="text/css">@import "../css/all.css";</style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <a href="shops.php" class="logo"><img src="../img/logos.jpeg" width="501" height="50" alt=""/></a>
                <ul id="top-navigation">

                    <li><span><span><a href="shops.php">Shops</a></span></span></li>
                    <li class="active"><span><span><a href="shop_details.php">Shop Details</a></span></span></li>
                    <li><span><span><a href="src/pub_view.php">Stock Details</a></span></span></li>
    <!--                <li><span><span><a href="src/pub_per_view.php">Account Overview</a></span></span></li>
                    <li><span><span><a href="src/pub_per_view.php">Account Details</a></span></span></li>
                    <li><span><span><a href="src/pub_per_view.php">Purchase Bills</a></span></span></li> -->
                    <li><span><span><a href="../index.php">Logout</a></span></span></li>
                </ul>
            </div>
            <div id="middle">
                <div id="left-column">

                </div>
                <div id="center-column">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <?php
                            require 'dbconfig.php';
                            try {
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                                $bill_id_sql = "SELECT SHOP.NAME AS NAME,USER.NAME AS `ADMIN-NAME` FROM SHOP,USER WHERE `REG.NO`=" . $_GET['id']." AND ID=ADMIN";
                                $result = $conn->prepare($bill_id_sql);
                                if ($result->execute()) {
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                        <th class="full" >Name</th>
                            <th class="full" >' . $row['NAME'] . '</th>
                            <th class="full" >Keeper</th>
                            <th class="full" >' . $row['ADMIN-NAME'] . '</th>
                            <th class="full" >Mobile</th>
                            <th class="full" >9895204814</th>

                            <th class="full" ></th>
';
                                    }
                                } else {
                                    die("Can't execute the query");
                                }
                            } catch (PDOException $pe) {
                                die("Can't connect to the database $dbname :" . $pe->getMessage());
                            }
                            ?>

                        </tr>

                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">


                        <tr>
                            <th class="full" ><input type="button" value="Per Day" name="search" /></th>
                            <th class="full" ><input type="button" value="Per Month" name="search" /></th>
                            <th class="full" ><input type="button" value="Per Year" name="search" /></th>
                            <th class="full" ><input type="text" name="search_key" value="" /></th>
                            <th class="full" ><input type="button" value="Custom Date" name="search" /></th>
                            <th class="full" ></th>


                        </tr>


                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">

                        <tr>
                            <th class="full" >Date</th>
                            <th class="full" >Total Amount</th>
                            <th class="full" >Total Tax</th>
                            <th class="full" >Net Amount</th>
                            <th class="full" ></th>


                        </tr>
                        <?php
                        try {
                            $bill_id_sql = "SELECT * FROM ACCOUNT WHERE `SHOP-ID`=" . $_GET['id'];
//                            echo $sql;
                            $result = $conn->prepare($bill_id_sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['day'] . '-' . $row['month'] . '-' . $row['year'] . '</td>
                            <td>' . $row['total-amount'] . '</td>
                            <td>' . $row['total-tax'] . '</td>
                            <td>' . $row['net-amount'] . '</td>
                            <td><a href="account_details.php?day=' . $row['day'] . '&month=' . $row['month'] . '&year=' . $row['year'] . '&id=' . $_GET['id'] . '"><input type="button" value="View" name="view" /></a></td>

                        </tr>';
                                }
                            } else {
                                die("Can't execute the query");
                            }
                        } catch (PDOException $pe) {
                            die("Can't connect to the database $dbname :" . $pe->getMessage());
                        }

                        try {
                            $bill_id_sql = "SELECT SUM(`TOTAL-AMOUNT`) AS `TOTAL-AMOUNT`,SUM(`TOTAL-TAX`) AS `TOTAL-TAX`,SUM(`NET-AMOUNT`) AS `NET-AMOUNT` FROM ACCOUNT WHERE `SHOP-ID`=" . $_GET['id'];
//                            echo $sql;
                            $result = $conn->prepare($bill_id_sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>Total</td>
                            <td>' . $row['TOTAL-AMOUNT'] . '</td>
                            <td>' . $row['TOTAL-TAX'] . '</td>
                            <td>' . $row['NET-AMOUNT'] . '</td>
                            <td></td>

                        </tr>';
                                }
                            } else {
                                die("Can't execute the query");
                            }
                        } catch (PDOException $pe) {
                            die("Can't connect to the database $dbname :" . $pe->getMessage());
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

    </body>



</html>
