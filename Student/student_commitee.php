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
	<link rel="shortcut icon" href="img/nitrr.ico" />
	<title>SAC MANAGEMENT SYSTEM | STUDENT COMMITEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Include HeaderScripts -->
	<?php include_once "../includes/headerScripts.php"; ?>

</head>

<body>

	<!-- Include User Navbar -->
	<?php include_once "../includes/navbar.php"; ?>

	<div class="container">
		<div class="row my-5">
			<div class="col-md-10 offset-md-1">
				<h3 class="text-center font-Staatliches-heading">Hostel Student Commitee</h3>

				<ul class="mt-5">

					<li>President - <em>Shivam Kumar Jha</em> </li>
					<hr />
					<li>Maintenace Secretary - <em>Nihar Kamal</em> </li>
					<hr />
					<li>Cleanliness Corrdinator - <em>Saurabh Singh</em> </li>
					<hr />
					<li>Mess Secretary - <em>Rishi Raj</em> </li>
					<hr />
					<li>Mess Inspectory - <em>Akash Deep</em> </li>
					<hr />
					<li>Sports Corrdinator - <em>Gaurav Kumar</em> </li>
					<hr />
					<li>Cultural Corrdinator - <em>Yash Raj Garg</em> </li>
					<hr />
					<li>Technical Corrdinator - <em>Ashish Ranjan Singh</em> </li>
				</ul>

			</div>
		</div>
	</div>


	<!-- Include FooterScripts -->
	<?php include_once "../includes/footerScripts.php"; ?>

</body>

</html>