<?php
include_once 'server.php';
include_once 'function-inc.php';
session_start();

if(isset($_POST["del"])){
  $transID = $_POST['transID'];

  delTransaction($conn, $transID);

}
