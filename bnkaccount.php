<?php
 include_once 'header.php';
 include_once 'includes/function-inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
            max-width: 500px;
            margin: auto;
            /* Same as the width of the sidenav */
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

    <div class="sidenav">
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a style='color: #FFFFFF;'> Welcome " . $_SESSION["username"] . "</a>";
            #acctype is the variable for what privilege a user can have 
            # 1 is employee 2 is customer 
            # the code will print out the account type of the person logged in 
            #echo "<p> You are ". $_SESSION["acctype"]. "</p>";
            if ($_SESSION["acctype"] == 1) {
                #add any employee/admin pages here 
                #people with the account type 1(employee) will be able to view the added employee pages.
                echo "<a href=''>Employee Only</a>";
            }
            echo "<a href='home.php'>Home</a>";
            echo "<a href=bnkaccount.php>Open New Account</a>";
            echo "<a href=transaction.php>Start Transaction</a>";
            echo "<a href=>Edit Profile</a>";
            echo "<a href = 'includes/logout-inc.php'>Log out</a>";
        } else {
            echo "<a href = 'login.php'>Login</a>";
            echo "<a href = 'signup.php'>Sign up</a>";
        }

        ?>
    </div>

    <div class="main">
        <div class="w3-container" style="width: 500px">
            <div class="w3-panel w3-card">
                <?php
                if (isset($_SESSION["username"])) {
                 echo '<form action = "includes/bnkaccount-inc.php" method ="POST">
                  <label>Create a Checking or Savings Account:</label>
                  <br>
                  <select type = "text" name = "banktype" >
                  <option value= "Checking">Checking</option>
                  <option value = "Saving">Saving</option>
                  </select>
                  <button type="submit" class="btn btn-black" name="submit">Create</button>
                 
                  </form>';
                  
                } else {
                    echo " <h1 style = 'margin-top: 10%;'>Please login or Register to access the webpage</h1>";
                }

                ?>
            </div>
        </div>
    </div>

    </div>

</body>

</html>