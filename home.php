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
            margin-left: 300px;
            /* Same as the width of the sidenav */
        }
        .logouterror{
            margin-left: 300px;
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


    <?php
    if (isset($_SESSION["username"])) {
    echo '<div class="main">
    <h2>Account Balance: </h2>
        <div class="w3-container" style="width: 500px">
            <div class="w3-panel w3-card">';
                    $sql= "SELECT *
                            FROM accounts 
                            INNER JOIN account_type  
                            ON accounts.Account_TYPE_ACCOUNT_TYPE_ID = account_type.ACCOUNT_TYPE_ID
                            WHERE Users_USER_ID = $userid";
                             
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            $__SESSION['accountID'] = $row['ACCOUNTS_ID'];
                            if ($row["CHECKING"] == 3){
                                $_SESSION['checkingID']= $row["ACCOUNTS_ID"];
                                echo " <br> <br><td> Checking ID: </td>". $row["ACCOUNTS_ID"] . "<BR>";
                                echo  "  <td>Checking Balance: $</h4> <td>". $row["ACCOUNT_BALANCE"]. "<BR>";

                            } else{
                                $_SESSION['savingID']= $row["ACCOUNTS_ID"];
                                echo " <BR>
                                <td> Savings ID: </td>" . $row["ACCOUNTS_ID"] ."<BR>";
                                echo "<td>Savings Balance: $</td> " . $row["ACCOUNT_BALANCE"];
                            }


                        }
                        
                        
                    }

                echo'
               
           </div>
        </div>
    </div>

    <div class="main">
    <h2>Transactions: </h2>
        <div class="w3-container" style="width: 1000px">
            <div class="w3-panel w3-card">';
                
                if (isset($_SESSION['checkingID'], ($_SESSION['savingID']))){
                    $checkingID = $_SESSION['checkingID'];
                    $savingID = $_SESSION['savingID'];
                    $sql = "SELECT * FROM transactions";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ( $resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            $tranAccountID = $row['ACCOUNTS_ACCOUNTS_ID'];
                            if($checkingID and $savingID == $tranAccountID){
                            echo "<form action = 'includes/adminapprove.php' method ='POST'>
                                    <table style ='width:100%'>
                                    <tr>
                                        <th> Trasnaction ID: </th>
                                        <th> Amount: </th>
                                        <th> Admin Approval: </th>
                                        <th> From: </th>
                                        <th> To: </th>
                                        <th> Bank Account ID: </th>
                                        <th> Transactions Type: </th>
                                    </tr>
                                    <br>
                                </form>";
                                echo "<td>".$row['TRANSACTIONS_ID']. "</td>"." ";
                                echo "<td> $".$row['AMOUNT_OF_TRANSACTION']. "</td>"." ";
                                echo "<td>".$row['TRANSACTION_APPROVAL']. "</td>"." ";
                                echo "<td>".$row['TRANSACTION_FROM']. "</td>"." ";
                                echo "<td>".$row['TRANSACTION_TO']. "</td>"." ";
                                echo "<td>".$row['ACCOUNTS_ACCOUNTS_ID']. "</td>"." ";
                                echo "<td>".$row['TRANSACTION_TYPE_TRANSACTION_TYPE_ID']. "</td>"." ";
                            } 
                        }
                    }
                } else {
                    
                }
                    
                echo'
            </div>
        </div>
    </div>';
} else {
    echo " <h1 class= 'logouterror' style = 'margin-top: 10% ;'>Please login or Register to access the webpage</h1>";
}
    ?>

</body>

</html>