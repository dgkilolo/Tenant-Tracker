<?php
  
  if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $mobilenumber = $_POST["mobilenumber"];
    $UserPassword = $_POST["UserPassword"]; 
    $passwordrepeat = $_POST["passwordrepeat"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($username, $mobilenumber, $UserPassword, $passwordrepeat) !== false){
      header("location: ../signup.php?error=emptyinput");
      exit();
    }
    if(invalidUid($username) !== false){
      header("location: ../signup.php?error=invaliduid");
      exit();
    }
    if(invalidMobile($mobilenumber) !== false){
      header("location: ../signup.php?error=invalidMobile");
      exit();
    }
    if(pwdMatch($UserPassword, $passwordrepeat) !== false){
      header("location: ../signup.php?error=passwordsdontmatch");
      exit();
    }

    createUser($conn, $username, $mobilenumber, $UserPassword);
  }

  else {
      header("location: ../signup.php");
  }
  

?>

