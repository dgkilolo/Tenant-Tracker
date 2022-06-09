<?php
    session_start();
    
?>
<?php
  
  

  if(isset($_POST["submit"])) {
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // if(emptyAddHouse($houseNumber, $bedrooms, $bath, $rent) !== false){
    //   header("location: ../updateHouse.php?error=emptyinput");
    //   exit();
    // }

    $updateHouseID = $_GET['editHouse'];
    
    $deleteSql = "DELETE from house WHERE houseID = $updateHouseID";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $deleteSql)){
        header("location: ../viewHouse.php?error=stmtfailed1");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, 'i', $updateHouseID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../viewHouse.php?error=none2");
    exit();
   
    // $updateHouseID = $_GET['editHouse'];

    // $deleteSql = "DELETE from house WHERE houseID = $updateHouseID";

    // $deleteResult = mysqli_query($conn, $deleteSql);

    // if($deleteResult) {
    //     echo "Deleted Successfully";
    // } else {
    //     echo "Not Deleted";
    // }
    
    // deleteHouse($conn, $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID);
    
  }

//   else {
//       header("location: ../updateHouse.php");
//   }
  

?>

