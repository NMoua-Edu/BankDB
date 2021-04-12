<?php
	require_once "includes/server.php";
	session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="sidenav">
        <?php
        if (isset($_SESSION["username"])) {
            $userid =$_SESSION["userid"];
            echo "<a style='color: #FFFFFF;'> Welcome " . $_SESSION["username"] . "</a>";
            #acctype is the variable for what privilege a user can have 
            # 1 is employee 2 is customer 
            # the code will print out the account type of the person logged in 
            #echo "<p> You are ". $_SESSION["acctype"]. "</p>";

            echo "<a href='home.php'>Home</a>";
            echo "<a href=bnkaccount.php>Open Bank Account</a>";
            echo "<a href=>Start Transaction</a>";
            echo "<a href='editprofile.php'>Edit Profile</a>";
            if ($_SESSION["acctype"] == 1) {
                #add any employee/admin pages here 
                #people with the account type 1(employee) will be able to view the added employee pages.
                echo "<a href='adminview.php'>Employee Only</a>";
            }
            echo "<a href = 'includes/logout-inc.php'>Log out</a>";

        } else {
            echo "<a href = 'login.php'>Login</a>";
            echo "<a href = 'signup.php'>Sign up</a>";
        }

        ?>
    </div>



</body>

</html>

			
		



