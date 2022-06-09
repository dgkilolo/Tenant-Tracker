<?php
    session_start();
    
?>
<?php
  
  if(isset($_POST["submit"])) {
    $statusTenant = $_POST["statusTenant"];
    $tenantID = $_SESSION["tenantID"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    viewRequest($conn, $statusTenant, $tenantID);
  }

  else {
      header("location: ../viewRequest.php");
  }
  

?>

