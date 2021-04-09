<?php
  include_once 'server.php';
  include_once 'function-inc.php';

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
  function createChecking($conn, $bnktype){
    $sql = "INSERT INTO account_type (CHECKING) 
    VALUES ('$bnktype')";
  
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    
    header("location: ../home.php?error=none");
    exit();
    
  }
  
  function createSaving($conn, $bnktype){
  $sql = "INSERT INTO account_type (CHECKING, SAVING) 
  VALUES (NULL,'$bnktype')";
  
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  
    header("location: ../home.php?error=none");
    exit();
  
  }









?>