<?php
include_once 'server.php';
include_once 'function-inc.php';
session_start();
if(isset($_POST["approve"])){
  
  $approve = $_POST["approval"];
  $transID = $_POST['transID'];
  $accID = $_POST['accID'];

  if ($approve === "Yes"){
    yesApprove($conn, $approve,$transID, $accID);

  }else{

    noApprove($conn, $approve, $transID, $accID);
  }

}
