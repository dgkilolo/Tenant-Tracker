<?php
    session_start();
    
?>
<?php
  
  if(isset($_POST["submit"])) {
    $offenceDescription = $_POST["offenceDescription"];
    $tenantID = $_POST["tenantID"];
    $landlordID = $_SESSION["landlordID"]; 
    $offenceDate = $_POST["offenceDate"];  

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyDescription($offenceDescription) !== false){
      header("location: ../offence.php?error=emptyinput");
      exit();
    }

    addOffence($conn, $offenceDescription, $tenantID, $landlordID, $offenceDate);
  }

  else {
      header("location: ../offence.php");
  }
  

?>

