<?php
  
  if(isset($_POST["submit"])) {
    $tenantName = $_POST["tenantName"];
    $tenantPassword = $_POST["tenantPassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLoginTenant($tenantName, $tenantPassword) !== false){
      header("location: ../tenantLogin.php?error=emptyinput");
      exit();
    }

    tenantLogin($conn, $tenantName, $tenantPassword);
  }

  else {
    header("location: ../tenantLogin.php");
    exit();
  }
  

?>