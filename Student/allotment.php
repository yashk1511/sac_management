<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
}

$currentuser = $_SESSION['user'];
$currentuserid = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Room Allotment list</title>

    <!-- Include HeaderScripts -->
    <?php include_once "../includes/headerScripts.php"; ?>

</head>

<body>

    <!-- Include HeaderScripts -->
    <?php include_once "../includes/navbar.php"; ?>

    <div class="container">
        <div class="row">
            <section class="col-md-12">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">


                        <thead>
                            <tr class="tableizer-firstrow">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            try {

                                # Sql Query
                                $sql = "SELECT `admission_no`, `name_first`, `name_last`, `gender`, `address_line1`, `address_city`, `address_state`, `address_pin`, `mobile_number` 
                                FROM `student_data` 
                                WHERE admission_no = '$currentuserid' ";

                                # Prepare Query
                                $result = $conn->prepare($sql);

                                # Execute Query
                                $result->execute();

                                # Sql Query
                                $sql2 = "SELECT `hostel_name`, `room_number`, `allotee_id` FROM `allotment` WHERE allotee_id='$currentuserid'";

                                # Prepare Query
                                $result2 = $conn->prepare($sql2);

                                # Execute Query
                                $result2->execute();
                                $row2 = $result2->fetch(PDO::FETCH_ASSOC);

                                # Checking Wether Count Greater than 0
                                if ($result->rowCount() > 0) {

                                    $row = $result->fetch(PDO::FETCH_ASSOC);

                            ?>

                                    <tr>
                                        <td>Admission Number</td>
                                        <td><?php echo $row["admission_no"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $row["name_first"] . " " . $row["name_last"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row["gender"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td><?php echo $row["mobile_number"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $row["address_line1"] . " <br><b>City:</b>" . $row["address_city"] . "<br><b>State:</b>" . $row["address_state"] . "<br><b>Pin:</b>" . $row["address_pin"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostel</td>
                                        <td><?php echo $row2["hostel_name"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Room</td>
                                        <td><?php echo $row2["room_number"]; ?></td>
                                    </tr>

                                    <?php



                                    ?>

                        </tbody>
                    </table>

            <?php

                                } else {
                                    echo "<tr><td colspan='4'>No Records Found</td></tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
                                # Development Purpose Error Only
                                echo "Error " . $e->getMessage();
                            }

            ?>
                </div>

            </section>
        </div>
    </div>



    <!-- Include FooterScripts -->
    <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>