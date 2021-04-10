<?php

if(isset($_POST['submit'])){

	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdcheck = $_POST["pwdcheck"];
	$acctype = $_POST["acctype"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	require_once 'server.php';
	require_once 'function-inc.php';


	if (emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwdcheck )!== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if (invalidUsername($username)!== false) {
		header("location: ../signup.php?error=invalidusername");
		exit();
	}

	if (invalidEmail($email)!== false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd, $pwdcheck)!== false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}

	if (usernameExists($conn, $username, $email)!== false) {
		header("location: ../signup.php?error=usernametaken");
		exit();
	}
	# 1 being employee and 2 being customer 
	if ($acctype !== "customer"){
		$acctype = 1; 
	}
	else {
		$acctype = 2;
	}



	createUser($conn, $acctype, $username, $pwd, $fname, $lname, $email);

}

else{
	header("location: ../signup.php");
	exit();
}