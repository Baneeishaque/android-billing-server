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
                    <!-- <li class="active"><span><span><a href="shop_details.php">Shop Details</a></span></span></li> -->
                    <li><span><span><a href="src/pub_view.php">Stock Details</a></span></span></li>
    <!--                <li><span><span><a href="src/pub_per_view.php">Account Overview</a></span></span></li> -->
                    <li class="active"><span><span><a href="#">Bill Details</a></span></span></li>
                    <!-- <li><span><span><a href="src/pub_per_view.php">Purchase Bills</a></span></span></li> -->
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

                                $sql = "SELECT * FROM PURCHASE WHERE `BILL-NO`=" . $_GET['bill'];
                                $result = $conn->prepare($sql);
                                if ($result->execute()) {
                                    $row = $result->fetch(PDO::FETCH_ASSOC);
                                    echo '
                        <th class="full" >Client Name</th>
                            <th class="full" >' . $row['customer-name'] . '</th>
                            <th class="full" >Mobile</th>
                            <th class="full" >' . $row['customer-mob'] . '</th>

                            <th class="full" ></th>
';
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
                            <?php
                            echo '
                        <th class="full" >Date</th>
                            <th class="full" >' . $row['day'] . '-' . $row['month'] . '-' . $row['year'] . '</th>
                            <th class="full" >Time</th>
                            <th class="full" >000</th>
                            <th class="full" ></th>
                            <th class="full" ></th>

                            <th class="full" ></th>
';
                            ?>

                        </tr>

                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">

                        <tr>
                            <th class="full" >Product Name</th>
                            <th class="full" >Amount</th>
                            <th class="full" >Tax</th>
                            <th class="full" >Total</th>


                        </tr>
                        <?php
                        try {
                            $sql = "SELECT * FROM BILL WHERE ID=" . $_GET['bill'] . "";
//                            echo $sql;
                            $result = $conn->prepare($sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['product-name'] . '</td>
                            <td>' . $row['amount'] . '</td>
                            <td>' . $row['tax'] . '</td>
                                <td>' . $row['total'] . '</td>


                        </tr>';
                                }
                            } else {
                                die("Can't execute the query");
                            }
                        } catch (PDOException $pe) {
                            die("Can't connect to the database $dbname :" . $pe->getMessage());
                        }

                        try {
                            $sql = "SELECT SUM(`AMOUNT`) AS `AMOUNT`,SUM(`TAX`) AS `TAX`,SUM(`TOTAL`) AS `TOTAL` FROM BILL WHERE ID=" . $_GET['bill'];
//                            echo $sql;
                            $result = $conn->prepare($sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
<td>Total</td>
                            <td>' . $row['AMOUNT'] . '</td>
                            <td>' . $row['TAX'] . '</td>
                            <td>' . $row['TOTAL'] . '</td>
                         

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
