<?php
    session_start();
    
?>
<?php
  
  if(isset($_POST["submit"])) {
    $statusLandlord = $_POST["statusLandlord"];
    $tenantID = $_POST["tenantID"];
    $landlordID = $_SESSION["landlordID"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    requestPermission($conn, $statusLandlord, $tenantID, $landlordID);
  }

  else {
      header("location: ../requestOffence.php");
  }
  

?>

