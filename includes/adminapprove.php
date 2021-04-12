<?php
include_once 'server.php';
include_once 'function-inc.php';
if(isset($_POST["approve"])){
  $approve = "Yes";

  if ($approve == "Yes"){
    yesApprove($conn, $approve);
  }

}
