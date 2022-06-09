<?php
    session_start();
    
?>
<?php
  
  if(isset($_POST["submit"])) {
    $houseNumber = $_POST["houseNumber"];
    $bedrooms = $_POST["bedrooms"];
    $bath = $_POST["bath"];
    $rent = $_POST["rent"];
    $tenantID = $_POST["tenantID"];
    $landlordID = $_SESSION["landlordID"];
    $estateID = $_POST["estateID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyAddHouse($houseNumber, $bedrooms, $bath, $rent) !== false){
      header("location: ../addhouse.php?error=emptyinput");
      exit();
    }

    if(negativeValues($bedrooms, $bath, $rent)){
      header("location: ../addhouse.php?error=negativeValues");
      exit();
    }
    
    addhouse($conn, $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID);
  }

  else {
      header("location: ../addhouse.php");
  }
  

?>

