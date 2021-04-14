<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "12345";
$dbname = "bankdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to connect to '$dbhost");

if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
