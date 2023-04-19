<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAC MANAGEMENT SYSTEM | HOME</title>

    <!-- Include HeaderScripts -->
    <?php include_once "../includes/headerScripts.php"; ?>
    <link rel="stylesheet" href="../css/common.css">
</head>

<body>

    <!-- Include Navbar -->
    <?php include_once "../includes/sacchairmannavbar.php"; ?>

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
                            <tr>
                                <th scope="row">1</th>
                                <td>Hostel 1</td>

                                <td>100000</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><b>TOTAL</b></td>

                                <td><b>10000</b></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </section>

        </div>
    </div>

    <!-- Include FooterScripts -->
    <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>