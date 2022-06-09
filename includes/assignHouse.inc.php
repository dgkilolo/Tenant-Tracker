<?php
    session_start();
    
?>

<?php
  
  if(isset($_POST["submit"])) {


    $tenantID = $_POST["tenantID"];
    $landlordID = $_SESSION["landlordID"];
    $houseID = $_POST["houseID"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyAssignHouse($tenantID, $houseID) !== false){
      header("location: ../assignHouse.php?error=emptyinput");
      exit();
    }

    assignHouse($conn, $tenantID, $landlordID, $houseID);
  }

  else {
      header("location: ../assignHouse.php");
  }
  

?>

