<?php

//------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//------------------------->> SESSION START
session_start();

//--------------------------------->> CHECK USER
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>SAC MANAGEMENT SYSTEM | ABOUT US</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Include HeaderScripts -->
	<?php include_once "../includes/headerScripts.php"; ?>


</head>

<!-- Include Navbar -->
<?php include_once "../includes/navbar.php"; ?>


<div class="container">
	<div class="row mt-5">
		<div class="col-md-10 offset-md-1">

			<h3 class="text-center font-Staatliches-heading">About Institute</h3>

			<p class="text-justify">
				institute is committed to the challenging task of development of
				technical education by preparing seasoned graduates in highly sophisticated field of engineering
				and technology. Development of India as an emerging industrial power is a demanding exercise as
				it involves the combination of cost effectiveness and efficiency along with producing
				world-class technology at the cutting edge. For about five decades we have been doing it with
				sincerity and commitment at IIT(ISM) Dhanbad.
				At present the institute offers graduate level courses in twelve disciplines.
			</p>

			<p class="text-justify">
				The Institute, located in Dhanbad, the Coal Capital of India , is spared over an area of 400
				acres. Dhanbad city is well connected with Mumbai, Delhi, Chennai, Visakhapatnam, Nagpur & Bhubneshwar by
				regular trains and is on the main Howrah-Delhi railway line route. The institute is 5 km from Dhanbad
				railway station and 40 km from airport at Ranchi, the Great Eastern Road. The state of Jharkhand is a
				mineral rich state having enormous potential for development with seemingly inexhaustible natural
				resources of coal, iron ore, lime stones, dolomite, tin, gem-stones and other minerals. Many industries,
				such as those of cement, steel, steel alooy, mines etc., are located in the vicinity of the institute
				giving it a unique advantage for industry-institute interaction in various disciplines of engineering.

			</p>
		</div>
	</div>

	<hr>

	<div class="row my-5">

		<div class="col-md-10 offset-md-1">
			<h3 class="text-center font-Staatliches-heading">About Hostel</h3>

			<p class="text-justify">
				The institute has 5 boys' hostel within the campus and presently there are two girls' hostels in the
				campus and proposal for one more of 200 seater is also in process. The institute also manages one
				additional girls' hostel adjacent to campus. A 60-seat girls' hostel is under construction adjacent
				to existing girls hostel within the campus. A plan for construction of a new hostel block for boys
				is under process. Each hostel is self-contained with amenities such as common room and a dining hall
				with mess. All the hostel rooms are adequately furnished. Each hostel has a capacity to house about
				100 inmate students.

				Administrative head of each hostel, the warden, is a senior faculty member. Additionally, one
				caretaker/matron for each hostel exists to manage the day-to-day affairs of the hostel. Each hostel
				has different students working committees, mess committee, magazine committee, games committee,
				cleanliness committee etc. Each committee is responsible for specific aspects of hostel affairs.
				Separate hostel administrative section exists in the institute to manage the hostel matters.

				Two hostel blocks of 100 seat each, for the boys will be available for the first semester students
				and will be allotted on the basis of the merit. Lists for hostel admission will be declared after
				receiving the hostel admission forms by the hostel administration.
			</p>
		</div>

	</div>
</div>

<!-- Include FooterScripts -->
<?php include_once "../includes/footerScripts.php"; ?>


</html>