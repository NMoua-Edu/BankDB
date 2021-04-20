<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="modal.css">
        
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

        .dlt-button {
            background-color: #EB9797;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="functions.js"></script>

    <div class="main">
        <?php

        $id = $_SESSION['userid'];
        $qry = mysqli_query($conn, "SELECT * FROM users where USER_ID='$id'"); // select queryF
        $data = mysqli_fetch_array($qry); // fetch data

        if (isset($_POST['update'])) // when click on Update button
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET USER_NAME='$username', EMAIL_ADDRESS='$email', PASSWORD='$hashPassword' WHERE USER_ID='$id'";
            $edit = mysqli_query($conn, $sql);

            if ($edit) {
                mysqli_close($conn); // Close connection
                header("location:index.php"); // redirects to index page
                exit;
            } else {
                echo "Error updating record";
            }
        }
        ?>
        <h3>Edit Account Information: </h3>
        <br>
        <form method="POST">
            <div class="content">
                <label>Username:</label>
                <input type="text" id="user" name="username" placeholder="Change Username" value="<?php echo $_SESSION["username"]; ?>" required>
            </div>
            <br>
            <div class="content">
                <label>Email:</label>
                <input type="text" id="email" name="email" placeholder="Change Email Address" value="<?php echo $_SESSION["email"]; ?>" required>
            </div>
            <br>
            <div class="content">
                <label>Password:</label>
                <input type="password" id="pass" name="password" placeholder="Change Password" required>
            </div>
            <div class="checkboxes">
                <label>Show Password:</label>
                <input type="checkbox" onclick="showPassword()">
            </div>
            <br />
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>

</html>