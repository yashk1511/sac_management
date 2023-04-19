<?php
//--------------------------------->> DB CONFIG
require_once "config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (isset($_SESSION['user'])) {
  $role = $_SESSION['role'];
  header("Location: $role/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAC MANAGEMENT SYSTEM | LOGIN</title>

  <!-- Include HeaderScripts -->
  <?php include_once "includes/headerScripts.php"; ?>
  <link rel="stylesheet" href="../css/common.css">

  <style>
    #topContainer {
      background-image: url("images/7.jpg");
      height: 500px;
      width: 100%;
      background-size: cover;
    }

    #topRow {
      margin-top: 100px;
      text-align: center;
    }

    .margintop {
      margin-top: 30px;
    }

    .title {
      margin-top: 100px;
      font-size: 300%;
    }

    .marginbottom {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>

  <?php

  try {

    if (isset($_POST["submit"])) {

      $userName = htmlspecialchars($_POST['userName']);
      $password = htmlspecialchars($_POST['password']);

      # Sql Query
      $sql = "SELECT * from login_info WHERE userName= :userName";

      # Prepare Query
      $result = $conn->prepare($sql);

      # Binding Value
      $result->bindValue(":userName", $userName);

      # Execute Query
      $result->execute();

      $row = $result->fetch(PDO::FETCH_ASSOC);
      if ($row > 0) {
        $dbPassword = $row["password"];
        $role = $row["role"];

        if (password_verify($password, $dbPassword)) {

          $_SESSION['user'] = $userName;
          $_SESSION['role'] = $role;

          $query = "SELECT institute_id FROM profile_data WHERE username='$userName'";
          $result = $conn->prepare($query);
          $result->execute();
          $row = $result->fetch(PDO::FETCH_ASSOC);

          $currentuserid = $row['institute_id'];
          $_SESSION['userid'] = $currentuserid;

          header("Location: $role/index.php");
        } else {
          echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Check Your Credentials',
              })</script>";
        }
      } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Account created. You can log-in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div> ';
      }
    }
  } catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
  }

  ?>

  <!-- Include Auth Navbar -->
  <?php
  include_once "includes/authNavbar.php";
  ?>


  <div class="container contentContainer" id="topContainer">

    <div class="row">

      <div class="col-md-6 offset-md-3" id="topRow">

        <h1 class="margintop font-Staatliches-heading">SAC MANAGEMENT SYSTEM</h1>

        <form class="margintop" action="" method="POST">

          <div class="form-group">
            <input type="text" placeholder="Enter Your Username" name="userName" class="form-control" />
          </div>

          <div class="form-group">
            <input type="password" placeholder="Enter Your Password" name="password" class="form-control" />
          </div>

          <input class="btn btn-primary btn-block rounded-pill" type="submit" value="Login" name="submit" />

        </form>

        <br>


      </div>
    </div>
  </div>


  <!-- Include FooterScripts -->
  <?php include_once "includes/footerScripts.php"; ?>

</body>

</html>