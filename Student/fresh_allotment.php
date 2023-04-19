<?php
//--------------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
	header("Location: ../login.php");
}
$currentuser = $_SESSION['user'];
#checking if the user is already alloted a room
$query = "SELECT institute_id FROM profile_data WHERE username='$currentuser'";
$result = $conn->prepare($query);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

$admission_no = $row['institute_id'];
$query = "SELECT * FROM student_data WHERE admission_no='$admission_no'";
$result = $conn->prepare($query);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($row > 0) {
	header("Location: allotment.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SAC MANAGEMENT SYSTEM | Allotment</title>

	<!-- Include HeaderScripts -->
	<?php include_once "../includes/headerScripts.php"; ?>


</head>

<body>

	<?php

	try {

		if (isset($_POST["register-user"])) {

			$admission_no = htmlspecialchars($_POST["admission_no"]);
			$name_first = htmlspecialchars($_POST["name_first"]);
			$name_last = htmlspecialchars($_POST["name_last"]);
			$mobile_number = htmlspecialchars($_POST["mobile_number"]);
			$gender = htmlspecialchars($_POST["gender"]);
			$hostel_name = htmlspecialchars($_POST["hostel"]);
			$address_line1 = htmlspecialchars($_POST["address_line1"]);
			$address_city = htmlspecialchars($_POST["address_city"]);
			$address_state = htmlspecialchars($_POST["address_state"]);
			$address_pin = htmlspecialchars($_POST["address_pin"]);

			if (1) {

				if (isset($_POST["terms"])) {

					# Sql Query

					$sql = "INSERT INTO `student_data`
							(`admission_no`, `name_first`, `name_last`, `gender`, `address_line1`, `address_city`, `address_state`, `address_pin`, `mobile_number`) 
							VALUES 
							(:admission_no, :name_first, :name_last, :gender, :address_line1, :address_city, :address_state, :address_pin, :mobile_number)";

					# Prepare Query
					$result = $conn->prepare($sql);

					# Binding Value
					$result->bindValue(":admission_no", $admission_no);
					$result->bindValue(":name_first", $name_first);
					$result->bindValue(":name_last", $name_last);
					$result->bindValue(":gender", $gender);
					$result->bindValue(":address_line1", $address_line1);
					$result->bindValue(":address_city", $address_city);
					$result->bindValue(":address_state", $address_state);
					$result->bindValue(":address_pin", $address_pin);
					$result->bindValue(":mobile_number", $mobile_number);

					# Execute Query
					$result->execute();

					if ($result) {
						echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'You have registered successfully!',
				})</script>";
				header("Location: ../logout.php");
					} else {
						echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We failed to register you!',
                })</script>";
					}
				// #allocate room in hostel
				
				$sql = "UPDATE `allotment` SET `allotee_id`='$admission_no', `isoccupied`=true WHERE `isoccupied` = false AND `hostel_name`='$hostel_name'LIMIT 1;";
				$result = $conn->prepare($sql);
				$result->execute();
				
				
				} else {
					echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please Select Checkbox of Terms and Condtions  !',
                })</script>";
				}

				
			}
			} 
			
			else {
				echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Username Already Taken!',
                })</script>";
			}

			
	} catch (PDOException $e) {
		# Development Purpose Error Only
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $e->getMessage() . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    	</div> ';
	}

	

	?>

	<!-- Include Auth Navbar -->
	<?php
	include_once "../includes/navbar.php";
	?>


	<div class="container my-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

				<h3 class="font-time  text-center text-uppercase">Fresh Allotment Form</h3>

				<form action="" method="post" id="userRegisterForm">

					<div class="form-group">
						<label for="admission_no">Admission no</label>
						<input type="text" name="admission_no" id="admission_no" class="form-control" placeholder="##JE####">
					</div>

					<div class="form-group">
						<label for="name_first">First Name</label>
						<input type="text" name="name_first" id="name_first" class="form-control" placeholder="First Name">
					</div>

					<div class="form-group">
						<label for="name_last">Last Name</label>
						<input type="text" name="name_last" id="name_last" class="form-control" placeholder="Last Name" aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="mobile_number">Mobile no.</label>
						<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="1234567890" aria-describedby="helpId">
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
                <label for="role">Hostel</label>
                <select class="form-select" id="hostel" name="hostel" aria-label="Default select example">            
                    <option value="Amber">Amber</option>
                    <option value="Rosaline">Rosaline</option>                    
                </select>
            </div>
					<div class="form-group">
						<label for="address_line1">Address</label>
						<input type="text" name="address_line1" id="address_line1" class="form-control" placeholder="Address line 1">
						<label for="address_city"></label>
						<input type="text" name="address_city" id="address_city" class="form-control" placeholder="City">
						<label for="address_state"></label>
						<input type="text" name="address_state" id="address_state" class="form-control" placeholder="State">
						<label for="address_pin"></label>
						<input type="text" name="address_pin" id="address_pin" class="form-control" placeholder="PIN code">

					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="terms" id="terms" value="checkedValue">
							I accept Terms and Conditions
						</label>
					</div>

					<button type="submit" name="register-user" id="register-user" class="btn btn-primary mt-3">Submit</button>

				</form>


			</div>
		</div>
	</div>

	<!-- Include FooterScripts -->
	<?php include_once "../includes/footerScripts.php"; ?>

	<!-- Javascript -->
	<script src="../js/register.js"></script>

</body>

</html>