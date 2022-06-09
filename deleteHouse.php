<?php
    session_start();
?>

<?php
  
  if(isset($_GET["deleteHouse"])) {
    
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    
    $deleteHouseID = $_GET['deleteHouse'];

    $resultSet4 = $conn->query("SELECT * FROM house WHERE houseID = $deleteHouseID");
    $updateRows = $resultSet4->fetch_assoc();
      $houseNumber = $updateRows['houseNumber'];

    $deleteSql = $conn->query("DELETE from house WHERE houseID = '$deleteHouseID'");

    // echo "Deleted Succesfully.";
    header("location: viewHouses.php?error=none2&editHouse=$houseNumber");
    exit();
   
  }

?>

