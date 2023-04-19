<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
}

# Sql Query
$userid = $_SESSION['userid'];
$sql = "SELECT `hostel_name` FROM `warden_data` WHERE `emp_no`='$userid'";

# Prepare Query
$result = $conn->prepare($sql);

# Execute Query
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$_SESSION['hostel'] = $row['hostel_name'];
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

</head>

<body>

  <!-- Include Navbar -->
  <?php include_once "../includes/wardenNavbar.php"; ?>

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
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../images/7.jpg" class="d-block w-100 img-fluid" style="max-height: 330px" alt="NIT1">
              </div>
              <div class="carousel-item">
                <img src="../images/nit-2.jpg" class="d-block w-100 img-fluid" style="max-height: 330px" lt="NIT2">
              </div>
              <div class="carousel-item">
                <img src="../images/nitt.jpg" class="d-block w-100 img-fluid" style="max-height: 330px" lt="NIT3">

              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>

    </div>
  </div>

  <!-- Include FooterScripts -->
  <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>