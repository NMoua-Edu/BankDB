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
    </style>
</head>

<body>
    <script type="text/javascript" src="functions.js"></script>

    <div class="main">
        <?php
        include "includes/server.php"; // Using database connection file here

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
                header("location:index.php"); // redirects to view profile page
                exit;
            } else {
                echo "Error updating record";
            }
        }
        ?>
        <h3>Edit Account Information: </h3>
        <br />
        <form method="POST">
            <div class="content">
                <label>Username:</label>
                <input type="text" id="user" name="username" placeholder="Change Username" value="<?php echo $_SESSION["username"]; ?>">
            </div>
            <br>
            <div class="content">
                <label>Email:</label>
                <input type="text" id="email" name="email" placeholder="Change Email Address" value="<?php echo $_SESSION["email"]; ?>">
            </div>
            <br>
            <div class="content">
                <label>Password:</label>
                <input type="password" id="pass" name="password" placeholder="Change Password">
            </div>
            <div class="checkboxes">
                <label>Show Password:</label>
                <input type="checkbox" onclick="showPassword()">
            </div>
            <br />
            <button type="submit" name="update">Save Changes</button>
            &emsp;&emsp;
        </form>

        <br>
        <button onclick="document.getElementById('id01').style.display='block'" type="submit">Delete Account</button>
        <br><br>



        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="/action_page.php">
                <div class="container">
                    <h1>Delete Account</h1>
                    <p>Are you sure you want to delete your account?</p>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="button" onclick="document.location='delete.php?id=<?php echo $_SESSION['userid']; ?>'" class="deletebtn">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>