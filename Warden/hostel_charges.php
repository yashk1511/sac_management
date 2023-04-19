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
<title>Amenity Charges</title>

<!-- Include HeaderScripts -->
<?php include_once "../includes/headerScripts.php"; ?>
<link rel="stylesheet" href="../css/common.css">


</head>

<body>


    <!-- Include Admin Navbar -->
    <?php include_once "../includes/wardenNavbar.php";


    ?>
    <div class="container my-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">

                <h3 class="font-time  text-center text-uppercase">Hostel Charges</h3>

                <form action="" method="post" id="userRegisterForm">

                    <div class="form-group align-center">
                        <label for="fee">Hostel Rent</label>
                        <input type="numeric" name="fee" id="fee" class="form-control" placeholder="Enter Your fee">
                    </div>
                    <div class="form-group align-center">
                        <label for="fee">Amenity Fee</label>
                        <input type="numeric" name="fee" id="fee" class="form-control" placeholder="Enter Your fee">
                    </div>


                    <button type="submit" name="register-user" id="register-user" class="btn btn-primary mt-3">Set </button>

                </form>


            </div>
        </div>
    </div>


    <!-- Include FooterScripts -->
    <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>