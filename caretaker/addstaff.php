<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOSTEL MANAGEMENT SYSTEM | REGISTER</title>

	<!-- Include HeaderScripts -->
	<?php include_once "../includes/headerScripts.php"; ?>
	<link rel="stylesheet" href="../css/common.css">

</head>

<body>

	<?php

	try {

		if (isset($_POST["register-user"])) {

			$userName = htmlspecialchars($_POST["userName"]);
			$email = htmlspecialchars($_POST["email"]);
			$firstName = htmlspecialchars($_POST["firstName"]);
			$lastName = htmlspecialchars($_POST["lastName"]);
			$password = htmlspecialchars($_POST["password"]);
			$confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
			$gender = htmlspecialchars($_POST["gender"]);

			$sql1 = "SELECT * FROM user_information  WHERE userName = :userName";

			$result1 = $conn->prepare($sql1);

			$result1->bindValue(":userName", $userName);

			if (1) {

				if (isset($_POST["terms"])) {

					# Hash Password
					$hashPass = password_hash($password, PASSWORD_BCRYPT);
					$hashConPass = password_hash($confirmPassword, PASSWORD_BCRYPT);

					# Sql Query
					$sql = "INSERT INTO user_information (userName, firstName, lastName, password, email, gender) VALUES
		(:userName, :firstName, :lastName, :hashPass, :email, :gender)";

					# Prepare Query
					$result = $conn->prepare($sql);

					# Binding Value
					$result->bindValue(":userName", $userName);
					$result->bindValue(":firstName", $firstName);
					$result->bindValue(":lastName", $lastName);
					$result->bindValue(":hashPass", $hashPass);
					$result->bindValue(":email", $email);
					$result->bindValue(":gender", $gender);

					# Execute Query
					$result->execute();

					if ($result) {
						echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'You have registered successfully!',
				})</script>";
					} else {
						echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We failed to register you!',
                })</script>";
					}
				} else {
					echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please Select Checkbox of Terms and Condtions  !',
                })</script>";
				}
			} else {
				echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Username Already Taken!',
                })</script>";
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
	$userNavbarValue = "login.php";
	$registerNavbarValue = "register.php";
	$adminNavbarValue = "admin/admin_login.php";

	include_once "../includes/caretakerNavbar.php";
	?>


	<div class="container my-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

				<h3 class="font-time  text-center text-uppercase">Staff Details</h3>

				<form action="" method="post" id="userRegisterForm">


					<div class="form-group">
						<label for="firstName">First Name</label>
						<input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter Your First Name">
					</div>

					<div class="form-group">
						<label for="lastName">Last Name</label>
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter Your Last Name" aria-describedby="helpId">
					</div>


					<div class="form-group">
						<label for="gender">Gender</label>

						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="gender" id="gender" value="Male">
								Male
							</label>
						</div>

						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="gender" id="gender" value="Female">
								Female
							</label>
						</div>

					</div>
					<div class="form-group">
						<label for="lastName">Role</label>
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Role" aria-describedby="helpId">
					</div>

					<button type="submit" name="register-user" id="register-user" class="btn btn-primary mt-3">Submit</button>

				</form>


			</div>
		</div>
	</div>

	<!-- Include FooterScripts -->
	<?php include_once "../includes/footerScripts.php"; ?>

	<!-- Javascript -->
	<script src="js/register.js"></script>

</body>

</html>