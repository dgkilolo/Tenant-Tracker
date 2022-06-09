<?php
    session_start();
?>

<?php
  
  if(isset($_GET["deleteOffence"])) {
    
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    
    $deleteOffenceID = $_GET['deleteOffence'];

    $resultSet4 = $conn->query("SELECT * FROM tenant INNER JOIN offence ON offence.tenantID = tenant.tenantID WHERE offence.offenceID = '$deleteOffenceID'");
    $updateRows = $resultSet4->fetch_assoc();
      $tenantName = $updateRows['tenantName'];

    $deleteSql = $conn->query("DELETE from offence WHERE offenceID = '$deleteOffenceID'");

    // echo "Deleted Succesfully.";
    header("location: viewOffencesWritten.php?error=none2&deleteOffence=$tenantName");
    exit();
   
  }

?>

