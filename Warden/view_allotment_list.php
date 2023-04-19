<?php

//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> START SESSION
session_start();

//--------------------------------->> START SESSION
if (!isset($_SESSION["user"])) {
    header("location: admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HOSTEL MANAGEMENT SYSTEM | ALLOTMENT</title>

<!-- Include HeaderScripts -->
<?php include_once "../includes/headerScripts.php"; ?>
<link rel="stylesheet" href="../css/common.css">


</head>

<body>

    <!-- Include Admin Navbar -->
    <?php include_once "../includes/adminNavbar.php"; ?>


    <div class="container">
        <div class="row mt-5">
            <section class="col-md-12">

                <h1 class="text-center font-Staatliches-heading">View Allotment List</h1>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">


                        <thead>
                            <tr class="tableizer-firstrow">
                                <th>Admission no</th>
                                <th>Name </th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            try {

                                $hostel = $_SESSION['hostel'];

                                # Sql Query
                                $sql = "SELECT * 
                                FROM `allotment` , `student_data` 
                                WHERE allotee_id = admission_no and `hostel_name` = '$hostel'";

                                # Prepare Query
                                $result = $conn->prepare($sql);

                                # Execute Query
                                $result->execute();

                                # Checking Wether Count Greater than 0
                                if ($result->rowCount() > 0) {

                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                            ?>

                                        <tr>
                                            <td><?php echo $row["admission_no"]; ?></td>
                                            <td><?php echo $row["name_first"] . " " . $row["name_last"]; ?></td>
                                            <td><?php echo $row["mobile_number"]; ?></td>
                                            <td><?php echo $row["gender"]; ?></td>
                                            <td><?php echo $row["address_line1"] . " <br><b>City:</b>" . $row["address_city"] . "<br><b>State:</b>" . $row["address_state"] . "<br><b>Pin:</b>" . $row["address_pin"]; ?></td>
                                            <td><?php echo $row["room_number"]; ?></td>
                                        </tr>


                                    <?php

                                    }

                                    ?>

                        </tbody>
                    </table>

            <?php

                                } else {
                                    echo "<tr><td class='text-center' colspan='4'>No Records Found</td></tr>";
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