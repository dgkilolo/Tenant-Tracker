<?php
  
  if(isset($_POST["submit"])) {
    $tenantName = $_POST["tenantName"];
    $tenantMobile = $_POST["tenantMobile"];
    $tenantPassword = $_POST["tenantPassword"]; 
    $passwordrepeat = $_POST["passwordrepeat"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($tenantName, $tenantMobile, $tenantPassword, $passwordrepeat) !== false){
      header("location: ../tenantSignup.php?error=emptyinput");
      exit();
    }
    if(invalidUid($tenantName) !== false){
      header("location: ../tenantSignup.php?error=invaliduid");
      exit();
    }
    if(invalidMobile($tenantMobile) !== false){
      header("location: ../tenantSignup.php?error=invalidMobile");
      exit();
    }
    if(pwdMatch($tenantPassword, $passwordrepeat) !== false){
      header("location: ../tenantSignup.php?error=passwordsdontmatch");
      exit();
    }

    createTenant($conn, $tenantName, $tenantMobile, $tenantPassword);
  }

  else {
      header("location: ../tenantSignup.php");
  }
  

?>

