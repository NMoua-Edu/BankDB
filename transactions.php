<?php
include_once 'header.php';

?>

<!DOCTYPE html>
<html>
<script>
  function changeStatus() {
    var status = document.getElementById("transactionType");
    if (status.value == "Withdraw") {
      document.getElementById("toAcct").style.visibility = "hidden";
    } else if (status.value == "Deposit") {
      document.getElementById("toAcct").style.visibility = "hidden";
    } else if (status.value == "Transfer") {
      document.getElementById("toAcct").style.visibility = "visible";
    }
  }
</script>

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

    .logouterror {
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
    echo '
    <div class="main">
    <h2>Account Balance: </h2>
        <div class="w3-container" style="width: 500px">
            <div class="w3-panel w3-card">';
    $sql = "SELECT *
                            FROM accounts
                            INNER JOIN account_type
                            ON accounts.Account_TYPE_ACCOUNT_TYPE_ID = account_type.ACCOUNT_TYPE_ID
                            WHERE Users_USER_ID = $userid";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $__SESSION['accountID'] = $row['ACCOUNTS_ID'];
        if ($row["CHECKING"] == 3) {
          $_SESSION['checkingID'] = $row["ACCOUNTS_ID"];
          echo " <br> <br><td> Checking ID: </td>" . $row["ACCOUNTS_ID"] . "<BR>";
          echo  "  <td>Checking Balance: $</h4> <td>" . $row["ACCOUNT_BALANCE"] . "<BR>";
        } else {
          $_SESSION['savingID'] = $row["ACCOUNTS_ID"];
          echo " <BR>
                                <td> Savings ID: </td>" . $row["ACCOUNTS_ID"] . "<BR>";
          echo "<td>Savings Balance: $</td> " . $row["ACCOUNT_BALANCE"];
        }
      }
    }

    echo '

           </div>
        </div>
    </div>

    <div class="main">
      <h2>Make A Transaction</h2>
        <form action = "includes/transactions-inc.php" method ="POST">
          <table id="makeTransaction">
            <tr id="acctSelect">
              <td class="txt"><t>Select Bank Account</t></td>
              <td>&nbsp;
                  <select name="AccountsSelection">
            ';
    //select account from dropdown
    $sql = "SELECT *
                    FROM accounts
                    INNER JOIN ACCOUNT_TYPE
                    ON accounts.Account_TYPE_ACCOUNT_TYPE_ID = account_type.ACCOUNT_TYPE_ID
                    WHERE Users_USER_ID=$userid";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($rows = mysqli_fetch_assoc($result)) {
        $accounts = $rows['ACCOUNTS_ID'];
        $CheckingType = $rows['CHECKING'];
        $SavingsType = $rows['SAVINGS'];
        if ($CheckingType != NULL) {
          echo "<option value='$accounts'>$accounts - Checking</option>";
        } else {
          echo "<option value='$accounts'>$accounts - Savings</option>";
        }
      }
    } else {
      echo "<option value='Else'>Else</option>";
    }

    echo '
              </select>
              </td>
            </tr>

            <tr>
              <td class="txt"><t>Type of Transaction</t></td>
              <td>&nbsp;
                <select id="transactionType" type="text" onchange="changeStatus()" name="transtype">
                <option value = "Transfer">Transfer</option>
                <option value = "Withdraw">Withdraw</option>
                <option value = "Deposit">Deposit</option>
                </select>
              </td>
            </tr>

            <tr id="toAcct">
              <td class="txt"><t>To</t></td>
              <td>&nbsp;
                <select id="toAcct" name="toAccountSelection">
        ';

    $sql2 = "SELECT *
                FROM accounts
                INNER JOIN ACCOUNT_TYPE
                ON accounts.Account_TYPE_ACCOUNT_TYPE_ID = account_type.ACCOUNT_TYPE_ID";

    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    if ($resultCheck2 > 0) {
      while ($rows2 = mysqli_fetch_assoc($result2)) {
        $accounts2 = $rows2['ACCOUNTS_ID'];
        $CheckingType2 = $rows2['CHECKING'];
        if ($CheckingType2 != NULL) {
          echo "<option value='$accounts2'>$accounts2 - Checking</option>";
        } else {
          echo "<option value='$accounts2'>$accounts2 - Savings</option>";
        }
      }
    } else {
      echo "<option value='Else'>Else</option>";
    }

    echo '
              </select>
              </td>
            </tr>

            <tr id="Amt">
              <td class="txt"><t>Amount</t></td>
              <td>&nbsp;
                <input type="number" step="0.01" name="Amount" placeholder="0.00">
              </td>
            </tr>

            <tr id="btnDeposit">
              <td>
              <br>
                <button type="submit" name="submit">Submit</button>
              </td>
            </tr>
          </table>
        </form>
    </div>';
  } else {
  }
  ?>

</body>

</html>