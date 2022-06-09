<?php
    session_start();
    
?>
<?php
  
  if(isset($_POST["submit"])) {
    $estateName = $_POST["estateName"];
    $estateLocation = $_POST["estateLocation"];
    $landlordID = $_SESSION["landlordID"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyEstate($estateName, $estateLocation) !== false){
      header("location: ../addEstate.php?error=emptyinput");
      exit();
    }

    createEstate($conn, $estateName, $estateLocation ,$landlordID);
  }

  else {
      header("location: ../addEstate.php");
  }
  

?>

