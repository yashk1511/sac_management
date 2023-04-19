<?php

//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> START SESSION
session_start();

//--------------------------------->> START SESSION
if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Complaints</title>

<!-- Include HeaderScripts -->
<?php include_once "../includes/headerScripts.php"; ?>
<link rel="stylesheet" href="../css/common.css">

</head>



<body>

    <!-- Include Admin Navbar -->
    <?php include_once "../includes/wardenNavbar.php"; ?>



    <div class="container">
        <div class="row mt-5">
            <section class="col-md-12">

                <h1 class="text-center font-Staatliches-heading">View Complaints</h1>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">


                        <thead>
                            <tr class="tableizer-firstrow">
                                <th>Complainant</th>
                                <th>Type </th>
                                <th>Description </th>
                                <th>ATR </th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            try {

                                # Sql Query
                                $hostel = $_SESSION['hostel'];
                                $sql = "SELECT `complaint_id`, `complainant_id`, `hostel`, `type`, `description`, `atr` FROM `complaints` WHERE `hostel`='$hostel'";

                                # Prepare Query
                                $result = $conn->prepare($sql);

                                # Execute Query
                                $result->execute();

                                # Checking Wether Count Greater than 0
                                if ($result->rowCount() > 0) {

                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                            ?>

                                        <tr>
                                            <td><?php echo $row["complainant_id"]; ?></td>
                                            <td><?php echo $row["type"]; ?></td>
                                            <td><?php echo $row["description"]; ?></td>
                                            <td><?php if ($row["atr"] != NULL) {
                                                    echo $row["description"];
                                                } else {

                                                    echo '<a class="btn btn-primary" href="write_atr.php" role="button">Respond</a>';
                                                } ?></td>
                                        </tr>


                                    <?php

                                    }

                                    ?>

                        </tbody>
                    </table>

            <?php

                                } else {
                                    echo "<tr><td colspan='2' class='text-center'>No Records Found</td></tr>";
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