<?php
    include_once 'header.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    </style>
</head>

<body>

    <div class="sidenav">
        <?php
                if (isset($_SESSION["username"])) {
                    echo "<p> HELLO there". $_SESSION["username"]. "</p>";
                    echo "<p> You are ". $_SESSION["acctype"]. "</p>";
                    echo "<a href='home.php'>Home</a>";
                    echo "<a href=>Open New Account</a>";
                    echo "<a href=>Start Transaction</a>";
                    echo "<a href=>Edit Profile</a>";
                    echo "<a href = 'includes/logout-inc.php'>Log out</a>";
                }
                else{
                    echo "<a href = 'login.php'>Login</a>";
                    echo "<a href = 'signup.php'>Sign up</a>";
                }
        ?>
    </div>

    <div class="main">
      


        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4>Checking:</h4>
                    <h4>Savings:</h4>
                </div>
            </div>
        </div>


    </div>


</body>

</html>

    <?php
                if (isset($_SESSION["username"])) {
                    echo "<p> HELLO there". $_SESSION["username"]. "</p>";
                }
                else{
                    echo "<a href = 'login.php'>Login</a>";
                    echo "<a href = 'signup.php'>Sign up</a>";
                }
        ?>