<?php

include "includes/server.php"; // Using database connection file here
session_start();

$id = $_SESSION['userid']; // get session id

$del = mysqli_query($conn,"DELETE FROM users WHERE USER_ID = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:index.php"); // redirects to index page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>