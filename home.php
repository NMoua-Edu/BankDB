<?php
include_once 'header.php';

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
            max-width: 1300px;
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
            $userid =$_SESSION["userid"];
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
            echo "<a href=bnkaccount.php>Open Bank Account</a>";
            echo "<a href=>Start Transaction</a>";
            echo "<a href='editprofile.php'>Edit Profile</a>";
            echo "<a href = 'includes/logout-inc.php'>Log out</a>";
        } else {
            echo "<a href = 'login.php'>Login</a>";
            echo "<a href = 'signup.php'>Sign up</a>";
        }

        ?>
    </div>

    <div class="main">
    <h2>Account Balance: </h2>
        <div class="w3-container" style="width: 500px">
            <div class="w3-panel w3-card">
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<div class= card-body>";
                    $sql= "SELECT *
                            FROM accounts 
                            INNER JOIN account_type  
                            ON accounts.Account_TYPE_ACCOUNT_TYPE_ID = account_type.ACCOUNT_TYPE_ID
                            WHERE Users_USER_ID = $userid";
                             
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            if ($row["CHECKING"] == 3){
                                $_SESSION['checkingID']= $row["ACCOUNTS_ID"];
                                echo " <BR><td> Checking ID: </td>". $row["ACCOUNTS_ID"] . "<BR>";
                                echo  "  <td>Checking Balance: $</h4> <td>". $row["ACCOUNT_BALANCE"]. "<BR>";

                            } else{
                                $_SESSION['savingID']= $row["ACCOUNTS_ID"];
                                echo " <BR>
                                <td> Savings ID: </td>" . $row["ACCOUNTS_ID"] ."<BR>";
                                echo "<td>Savings Balance: $</td> " . $row["ACCOUNT_BALANCE"];
                            }


                        }
                        
                        
                    }


                } else {
                    echo " <h1 style = 'margin-top: 10%;'>Please login or Register to access the webpage</h1>";
                }


                ?>
            </div>
        </div>
    </div>

    <div class="main">
    <h2>Transactions: </h2>
        <div class="w3-container" style="width: 500px">
            <div class="w3-panel w3-card">
                <?php
                if (isset($_SESSION['checkingID'], ($_SESSION['savingID']))){
                    $sql = "SELECT * FROM transactions";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ( $resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<td>".$row['TRANSACTIONS_ID']. "</td>"." ";
                            echo "<td>".$row['AMOUNT_OF_TRANSACTION']. "</td>"." ";
                            echo "<td>".$row['TRANSACTION_APPROVAL']. "</td>"." ";
                            echo "<td>".$row['TRANSACTION_FROM']. "</td>"." ";
                            echo "<td>".$row['TRANSACTION_TO']. "</td>"." ";
                            echo "<td>".$row['ACCOUNTS_ACCOUNTS_ID']. "</td>"." ";
                            echo "<td>".$row['TRANSACTION_TYPE_TRANSACTION_TYPE_ID']. "</td>"." ";
                        }
                    }
                }
                    
                ?>
            </div>
        </div>
    </div>

</body>

</html>