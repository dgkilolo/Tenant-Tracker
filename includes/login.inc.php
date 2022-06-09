<?php
  
  if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $UserPassword = $_POST["UserPassword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $UserPassword) !== false){
      header("location: ../login.php?error=emptyinput");
      exit();
    }

    loginUser($conn, $username, $UserPassword);
  }

  else {
    header("location: ../login.php");
    exit();
  }
  

?>