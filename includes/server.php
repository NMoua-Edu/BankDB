<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "12345";
$dbname = "bankdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to conenct to '$dbhost");

if(!$conn){
	die("Conenction Failed: " . mysqli_connect_error());
}