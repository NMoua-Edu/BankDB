<?php
  include_once 'server.php';
  require_once 'function-inc.php';

  if(isset($_POST["submit"])){
    $fromAcc = $_POST["AccountsSelection"];
    $transtype = $_POST["transtype"];
    $amount = $_POST["Amount"];

    if($transtype == "Deposit"){
      $transtype = 0;
      modifyAccount($conn, $fromAcc, $amount, 1);
      createTransaction($conn, $transtype, $fromAcc , $fromAcc, $amount);

    }elseif($transtype == "Withdraw"){
      $transtype = 1;
      modifyAccount($conn, $fromAcc, $amount, 2);
      createTransaction($conn, $transtype, $fromAcc, $fromAcc , $amount);
    }
    elseif($transtype == "Transfer") {
      $transtype = 2;
      $toAcc = $_POST["toAccountSelection"];
      modifyAccount($conn, $fromAcc, $amount, 2);
      modifyAccount($conn, $toAcc, $amount, 1);
      createTransaction($conn, $transtype, $fromAcc, $toAcc, $amount);
    }
  }
?>
