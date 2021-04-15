<?php

include "includes/server.php"; // Using database connection file here
session_start();

$id = $_SESSION['userid'];

$qry = mysqli_query($conn,"SELECT * FROM users where USER_ID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	
    $sql = "UPDATE users SET USER_NAME='$username', EMAIL_ADDRESS='$email', PASSWORD='$password' WHERE USER_ID='$id'";
    $edit = mysqli_query($conn, $sql);
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:viewProfile.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "Error updating record";
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="username" placeholder="Enter username" Required>
  <input type="submit" name="update" value="Update">
</form>
