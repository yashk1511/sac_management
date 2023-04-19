<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

$currentuser = $_SESSION['user'];
$currentuserid = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mess Charges</title>

<!-- Include HeaderScripts -->
<?php include_once "../includes/headerScripts.php"; ?>
<link rel="stylesheet" href="../css/common.css">


</head>

<body>


    <!-- Include Admin Navbar -->
    <?php include_once "../includes/messNavbar.php";


    ?>
    <div class="container my-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">

                <h3 class="font-time  text-center text-uppercase">Mess Charges</h3>

                <form action="" method="post" id="userRegisterForm">

                    <div class="form-group align-center">
                        <label for="fee">Mess Charge</label>
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