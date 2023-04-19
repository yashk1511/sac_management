<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SAC MANAGEMENT SYSTEM | Warden DASHBOARD</title>

  <!-- Include HeaderScripts -->
  <?php include_once "../includes/headerScripts.php"; ?>
  <link rel="stylesheet" href="../css/common.css">

  <style>
    .navbar-brand {
      font-size: 1.8em;

    }

    #topContainer {
      background-image: url("/sac-menagement-system/images/7.jpg");
      height: 500px;
      width: 100%;
      background-size: cover;
      /*  FOR FULL IMAGE TO BE DISPLAYED NOT JUST PART OF IT  */
    }

    #topRow {
      margin-top: 100px;
      text-align: center;

    }

    #topRow h1 {
      font-size: 250%;
      color: #000000;
      padding-top: 40px;

    }

    .bold {
      font-weight: bold;

    }

    .margintop {
      margin-top: 30px;


    }

    .center {
      text-align: center;


    }

    .title {
      margin-top: 100px;
      font-size: 300%;

    }

    #footer {
      background-color: #B0D1FB;
      padding-top: 70px;
      width: 100%;

    }

    .marginbottom {
      margin-bottom: 30px;

    }

    .appstoreimage {
      width: 250px;

    }
  </style>
</head>

<body>

  <!-- Include Admin Navbar -->
  <?php include_once "../includes/caretakerNavbar.php"; ?>

  <div class="container">
    <div class="row mt-5">

      <section class="col-md-12 text-center">
        <h1 class="text-center font-Staatliches-heading">Welcome </h1>
        <br>
        <h3 class="text-center font-Staatliches-heading">Caretaker </h>
      </section>

    </div>
  </div>

  <!-- Include FooterScripts -->
  <?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>