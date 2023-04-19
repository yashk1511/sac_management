
<?php

/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
Paradigm is Object Oriented Programming
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sac_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo 'Failed to connect to database';
} else {
    echo "database connected successfully.";
}
?>