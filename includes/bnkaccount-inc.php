<?php
  include_once 'server.php';
  require_once 'function-inc.php';

  if(isset($_POST["submit"])){
    $bnktype = $_POST["banktype"];
  
    if($bnktype !== "Checking"){
      $bnktype = 4;
      createSaving($conn, $bnktype);

  
    }else{
      $bnktype = 3;
      createChecking($conn, $bnktype);
    }
   
  
  }
 







?>