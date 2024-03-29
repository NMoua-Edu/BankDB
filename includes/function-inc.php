<?php


function emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwdcheck)
{
	$result;

	if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($pwd) || empty($pwdcheck)) {

		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function invalidUsername($username)
{
	$result;

	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function invalidEmail($email)
{
	$result;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function pwdMatch($pwd, $pwdcheck)
{
	$result;

	if ($pwd !== $pwdcheck) {

		$result = true;
	} else {
		$result = false;
	}

	return $result;
}



function usernameExists($conn, $username, $email)
{
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
	} else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $acctype, $username, $pwd, $fname, $lname, $email)
{

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


function emptyInputLogin($username, $pwd)
{
	$result;

	if (empty($username) || empty($pwd)) {

		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

function loginUser($conn, $username, $pwd)
{

	$usernameExists = usernameExists($conn, $username, $username);

	if ($usernameExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdDB = $usernameExists["PASSWORD"];
	$checkPwd = password_verify($pwd, $pwdDB);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wrongpassword");

		exit();
	} else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $usernameExists["USER_ID"];
		$_SESSION["username"] = $usernameExists["USER_NAME"];
		$_SESSION["email"] = $usernameExists["EMAIL_ADDRESS"];
		$_SESSION["pwd"] = $usernameExists["PASSWORD"];
		$_SESSION["firstname"] = $usernameExists["FIRST_NAME"];
		$_SESSION["lastname"] = $usernameExists["LAST_NAME"];

		#this will help determin account type, 2 is customer while 1 is admin
		$_SESSION["acctype"] = $usernameExists["USER_TYPE_USER_TYPE_ID"];
		header("location: ../home.php");
		exit();
	}
}

function createChecking($conn, $bnktype)
{
	$sql = "INSERT INTO account_type (CHECKING)
	VALUES ('$bnktype')";
	session_start();
	$userid = $_SESSION['userid'];

	if ($conn->query($sql) === TRUE) {
		$cid = $conn->insert_id;
		checkingid($conn, $userid, $cid);

		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("location: ../home.php?error=none");
	exit();
}

function checkingid($conn, $userid, $cid)
{
	$sql = "INSERT INTO accounts (Users_USER_ID, Account_TYPE_ACCOUNT_TYPE_ID)
	VALUES ($userid,$cid)";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function createSaving($conn, $bnktype)
{
	$sql = "INSERT INTO account_type (CHECKING, SAVING)
VALUES (NULL,'$bnktype')";
	session_start();
	$userid = $_SESSION['userid'];

	if ($conn->query($sql) === TRUE) {
		$sid = $conn->insert_id;
		savingid($conn, $userid, $sid);
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("location: ../home.php?error=none");
	exit();
}

function savingid($conn, $userid, $sid)
{
	$sql = "INSERT INTO accounts (Users_USER_ID, Account_TYPE_ACCOUNT_TYPE_ID)
VALUES ($userid,$sid)";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function yesApprove($conn, $approve, $transID, $accID)
{

	$sql = "UPDATE transactions set TRANSACTION_APPROVAL= 'Yes' WHERE TRANSACTIONS_ID = '$transID' AND ACCOUNTS_ACCOUNTS_ID = '$accID' ";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

	header("location: ../adminview.php");
	exit();


}

function noApprove($conn, $approve, $transID, $accID)
{

	$sql = "UPDATE transactions set TRANSACTION_APPROVAL= 'No' WHERE TRANSACTIONS_ID = $transID AND ACCOUNTS_ACCOUNTS_ID = $accID";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();

	header("location: ../adminview.php");
	exit();


}

function delTransaction($conn, $transID){
	$sql = "DELETE FROM transactions WHERE TRANSACTIONS_ID = $transID";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();

	header("location: ../adminview.php");
	exit();
}

function createTransaction($conn, $transtype, $fromAcc, $toAcc, $amount)
{
	if ($transtype == 0) { //deposit
		$sql = "INSERT INTO transaction_type (TRANSFERS, DEPOSITS, WITHDRAWALS)
		VALUES (NULL, $transtype, NULL)";
	}
	elseif ($transtype == 1) { //Withdraw
		$sql = "INSERT INTO transaction_type (TRANSFERS, DEPOSITS, WITHDRAWALS)
		VALUES (NULL, NULL, $transtype)";
	}
	elseif ($transtype == 2) { //Transfer
		$sql = "INSERT INTO transaction_type (TRANSFERS, DEPOSITS, WITHDRAWALS)
		VALUES ($transtype, NULL, NULL)";
	}

	session_start();
	$userid = $_SESSION['userid'];

	if ($conn->query($sql) === TRUE){
		$tid = $conn->insert_id;

		if ($transtype == 0) { //deposit
			$sql2 = "INSERT INTO transactions (AMOUNT_OF_TRANSACTION, TRANSACTION_APPROVAL, TRANSACTION_FROM, TRANSACTION_TO, ACCOUNTS_ACCOUNTS_ID,TRANSACTION_TYPE_TRANSACTION_TYPE_ID)
							VALUES ($amount, 'No', 'Deposit', $toAcc, $fromAcc, $tid)";
		}
		elseif ($transtype == 1) { //Withdraw
			$sql2 = "INSERT INTO transactions (AMOUNT_OF_TRANSACTION, TRANSACTION_APPROVAL, TRANSACTION_FROM, TRANSACTION_TO, ACCOUNTS_ACCOUNTS_ID,TRANSACTION_TYPE_TRANSACTION_TYPE_ID)
							VALUES ($amount, 'No', $fromAcc, 'Withdraw', $fromAcc, $tid)";
		}
		elseif ($transtype == 2) { //Transfer
			$sql2 = "INSERT INTO transactions (AMOUNT_OF_TRANSACTION, TRANSACTION_APPROVAL, TRANSACTION_FROM, TRANSACTION_TO, ACCOUNTS_ACCOUNTS_ID,TRANSACTION_TYPE_TRANSACTION_TYPE_ID)
							VALUES ($amount, 'No', $fromAcc, $toAcc, $fromAcc, $tid)";
		}


			if ($conn->query($sql2) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql2 . "<br>" . $conn->error;
			}

		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("location: ../home.php?error=none");
	exit();
}

function modifyAccount($conn, $accountId, $amount, $mod)
{
	if ($mod == 1) { //add to balance
		$sql = "UPDATE accounts set ACCOUNT_BALANCE = ACCOUNT_BALANCE + $amount WHERE ACCOUNTS_ID = $accountId";
	}
	else if ($mod == 2) { //sub from balance
		$sql = "UPDATE accounts set ACCOUNT_BALANCE = ACCOUNT_BALANCE - $amount WHERE ACCOUNTS_ID = $accountId";
	}

	if ($conn->query($sql) === TRUE){
			echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
