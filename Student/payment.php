<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
}

$GLOBALS['total'] = 0;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOSTEL MANAGEMENT SYSTEM | HOME</title>

    <!-- Include HeaderScripts -->
    <?php include_once "../includes/headerScripts.php"; ?>

</head>

<body>

    <!-- Include Navbar -->
    <?php include_once "../includes/navbar.php"; ?>

    <div class="container">
        <div class="row mt-5">

            <section class="col-md-8 offset-md-2 text-center">
                <h3 class="font-Staatliches-heading">Welcome to</h3>
                <h3 class="font-Staatliches-heading">SAC Management System</h3>
                <h3 class="font-Staatliches-heading">IIT ISM</h3>
            </section>

        </div>
        <div class="row mb-5">

            <section class="col-md-8 offset-md-2">
                <div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Charge Name</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $hostel = $_SESSION['hostel'];

                            # Sql Query
                            $sql = "SELECT `rent`,`mess_charge`
    FROM `hostel_data`
    WHERE `hostel_name` = '$hostel'";

                            # Prepare Query
                            $result = $conn->prepare($sql);

                            # Execute Query
                            $result->execute();

                            # Checking Wether Count Greater than 0
                            $row1 = $result->fetch(PDO::FETCH_ASSOC);

                            ?>

                            <tr>
                                <th scope="row">1</th>
                                <td>Hostel Charge</td>

                                <td><?php echo $row1['rent'];
                                    $GLOBALS['total'] = $GLOBALS['total'] + $row1['rent'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Mess Charge</td>
                                >
                                <td><?php echo $row1['mess_charge'];
                                    $GLOBALS['total'] = $GLOBALS['total'] + $row1['mess_charge'] ?></td>
                            </tr>
                            <?php
                            $hostel = $_SESSION['hostel'];
                            # Sql Query
                            $sql = "SELECT *
                            FROM `charges`";

                            # Prepare Query
                            $result = $conn->prepare($sql);

                            # Execute Query
                            $result->execute();

                            # Checking Wether Count Greater than 0
                            while ($row2 = $result->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><?php echo $row2["type"]; ?></td>
                                    <td><?php echo $row2["amount"];
                                        $GLOBALS['total'] = $GLOBALS['total'] + $row2['amount'] ?></td>
                                </tr>


                            <?php

                            }

                            ?>
                            <tr>
                                <th scope="row">4</th>
                                <td><b>TOTAL</b></td>

                                <td><b><?php echo $GLOBALS['total']; ?></b></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="" name="submit" id="submit" class="btn btn-primary">Pay Now </button>

                </div>
            </section>

        </div>
    </div>

    <!-- Include FooterScripts -->
    <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>