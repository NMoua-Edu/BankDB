<?php

include "includes/server.php"; // Using database connection file here
session_start();

$id = $_SESSION['userid']; // get session user id

$sql = "DELETE users, accounts, transactions 
        FROM users
        LEFT JOIN accounts on (users.USER_ID = accounts.Users_USER_ID)
        LEFT JOIN transactions on (accounts.ACCOUNTS_ID = transactions.ACCOUNTS_ACCOUNTS_ID)
        WHERE users.USER_ID = '$id'";

$del = mysqli_query($conn, $sql);

if ($del ) {
    mysqli_close($conn); // Close connection
    header("location:index.php"); // redirects to index page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}

?>