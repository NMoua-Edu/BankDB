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

    <div class="main">
        <h3>Edit Account Information: </h3>
        <br />
        <div class="content">
            <form>
                <label>Username:</label>
                <input type="text" value="<?php echo $_SESSION["username"]; ?>">
                <br><br>
                <label>Password:</label>  
                <input type="text">
                <br><br>
                <label>Email:</label>  
                <input type="text">
            </form>
        </div>

        <br />
        <button>Save Changes</button>
        &emsp;&emsp;
        <button>Delete Account</button>
    </div>
</body>

</html>