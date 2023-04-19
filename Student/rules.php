<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="../img/nitrr.ico" />
  <title>SAC MANAGEMENT SYSTEM | RULES & REGULATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Include HeaderScripts -->
  <?php include_once "../includes/headerScripts.php"; ?>

</head>

<body>

  <!-- Include HeaderScripts -->
  <?php include_once "../includes/navbar.php"; ?>



  <div class="container">
    <div class="row my-5">
      <div class="col-md-10 offset-md-1">
        <h3 class="text-center font-Staatliches-heading">Rules and Regulations</h3>

        <ul>
          <li class="text-justify"> Application for admission to hostel shall be made in the prescribed form which can
            be had from the
            Hostel Office.</li>
          <hr />

          <li class="text-justify">Allotement of rooms shall be made by the Deputy Wardens under the orders of Warden.
          </li>
          <hr />

          <li class="text-justify">Students must occupy the rooms allotted to them and should not change/exchange rooms
            without prior
            permission from the Deputy Warden/Hostel Authorities. Violations of this rule will result in the Expulsion
            of the student concerned from the hostel.</li>
          <hr />


          <li class="text-justify">If any misuse of computers and mobile phones in hostel rooms is brought to notice of
            Hostel authorities
            the respective resident(s) will be expelled from the hostel</li>
          <hr />

          <li class="text-justify">Students should not arrange any functions or meeting within the hostel /collage
            campus or outside the
            campus, without prior permission from the Principal and Warden.</li>
          <hr />

          <li class="text-justify"> No student should stay away from the hostel on any day without the prior permission
            of the concerned
            Deputy Warden/Associate Warden/Principal and Warden.</li>
          <hr />


        </ul>


      </div>
    </div>
  </div>


  <!-- Include FooterScripts -->
  <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>