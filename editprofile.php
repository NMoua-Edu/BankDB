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
    </style>
</head>

<body>
    <script type="text/javascript" src="functions.js"></script>

    <div class="main">
        <h3>Edit Account Information: </h3>
        <br />
        <form action="includes/signup-inc.php" method="POST">
            <div class="content">
                <label>Username:</label>
                <input type="text" id="user" value="<?php echo $_SESSION["username"]; ?>" disabled>
            </div>
            <div class="checkboxes">
                <label>Edit Username:</label>
                <input type="checkbox" onclick="enableUsername()">
            </div>
            <br>
            <div class="content">
                <label>Email:</label>
                <input type="text" id="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
            </div>
            <div class="checkboxes">
                <label>Edit Email:</label>
                <input type="checkbox" onclick="enableEmail()">
            </div>
            <br>
            <div class="content">
                <label>Password:</label>
                <input type="password" id="pass" value="<?php echo $_SESSION["pwd"]; ?>" disabled>
            </div>
            <div class="checkboxes">
                <label>Edit Password:</label>
                <input type="checkbox" onclick="enablePassword()">
                <br>
                <label>Show Password:</label>
                <input type="checkbox" onclick="showPassword()">
            </div>
        </form>
        <br />
        <button type="submit">Save Changes</button>
        &emsp;&emsp;
        <button type="submit">Delete Account</button>
        <br><br>
        <input type="submit" name="update" value="Update">

    </div>
</body>

</html>