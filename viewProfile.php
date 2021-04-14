<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 270px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {

            margin-left: 300px;
            padding-top: 20px;
            /* Same as the width of the sidenav */
        }

        .content {
            width: 400px;
            clear: both;
        }

        .content input {
            width: 100%;
            clear: both;
        }

        .checkboxes {
            padding-top: 8px;
        }


        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            background-color: #D7D7D7;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 16px 16px;
        }

        .title {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="card">
            <div class="container">
                <h4 class="title">Current Account Information</h4>
                <h5><b>User ID:</b> <?php echo $_SESSION["userid"]; ?></h5>
                <h5><b>Name:</b> <?php echo $_SESSION["firstname"];
                                    echo '&nbsp';
                                    echo $_SESSION["lastname"]; ?></h5>
                                    
                <h5><b>Username:</b> <?php echo $_SESSION["username"]; ?></h5>
                <h5><b>Email:</b> <?php echo $_SESSION["email"]; ?></h5>
                <h5><b>Password:</b> ****************</h5>
                <br>
                <a href="editprofile.php">Update Profile</a>
            </div>
        </div>
    </div>
</body>

</html>