<?php


function emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwdcheck){
	$result;

	if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($pwd) || empty($pwdcheck)) {
		
		$result = true;

	}
	else{
		$result = false;
	}

	return $result;
}

function invalidUsername($username){
	$result;

	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

function invalidEmail($email){
	$result;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}

function pwdMatch($pwd, $pwdcheck){
	$result;

	if ($pwd !== $pwdcheck) {
		
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
}



function usernameExists($conn, $username, $email){
	$sql = "SELECT * FROM users WHERE USER_NAME = ? OR EMAIL_ADDRESS = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
		
	}
	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $acctype, $username, $pwd, $fname, $lname, $email){
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	$sql = "INSERT INTO users (USER_TYPE_USER_TYPE_ID, USER_NAME, PASSWORD, FIRST_NAME, LAST_NAME, EMAIL_ADDRESS) 
	VALUES ('$acctype', '$username', '$hashedPwd', '$fname', '$lname', '$email')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();


	header("location: ../index.php?error=none");
	exit();

}


function emptyInputLogin($username, $pwd){
	$result;

	if(empty($username) || empty($pwd)) {
		
		$result = true;

	}
	else{
		$result = false;
	}

	return $result;
}

function loginUser($conn, $username, $pwd){

  	$usernameExists = usernameExists($conn, $username, $username);

	if ($usernameExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdDB = $usernameExists["PASSWORD"];
	$checkPwd = password_verify($pwd, $pwdDB);

	if ($checkPwd === false){
		header("location: ../login.php?error=wrongpassword");

		exit();
	 }

	else if ($checkPwd === true){
		session_start();
		$_SESSION["userid"] = $usernameExists["USER_ID"];
		$_SESSION["username"] = $usernameExists["USER_NAME"];

		#this will help determin account type, 2 is customer while 1 is admin
		$_SESSION["acctype"] = $usernameExists["USER_TYPE_USER_TYPE_ID"];
		header("location: ../home.php");
		exit();
	}




}