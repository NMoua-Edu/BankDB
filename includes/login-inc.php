<?php

if(isset($_POST["submit"])){
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];


	require_once 'server.php';
	require_once 'function-inc.php';

	if (emptyInputLogin($username, $pwd)!== false) {
		header("location: ../login.php?error=emptyInputLogin");
		exit();
	}

	loginUser($conn, $username, $pwd);
}

else {
		header("location: ../login.php");
		exit();
}

