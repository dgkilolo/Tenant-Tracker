<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $tenantID = $_SESSION["tenantID"];

    // $resultSet = $conn->query("SELECT houseNumber, rent, tenantName FROM house WHERE landlordID = $landlordID");
    $resultSet = $conn->query("SELECT * FROM `house` INNER JOIN estate ON estate.estateID = house.estateID INNER JOIN landlord ON landlord.landlordID = house.landlordID WHERE house.tenantID = $tenantID");
    // $resultSet = $conn->prepare("SELECT houseNumber, rent, tenantID FROM house WHERE landlordID =:landlordID");
    // $resultSet->execute(['landlordID'=>$landlordID]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Houses</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/housestyles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Tangerine:wght@700&display=swap" rel="stylesheet">
        <!-- <script defer src="./js/signup.js"></script> -->
    </head>
    <body>
    <div class="sidenav">
            <div class="profile">
                <a href="#about">
                <span class="material-icons-outlined">
                    person
                    </span>
                    <?php
                        if(isset($_SESSION["tenantName"])) {
                            echo $_SESSION["tenantName"];
                        }
                    ?>
                </a>
            </div>
            <a href="tenant.php">
                <span class="material-icons-outlined">
                    home
                    </span>
                Home
            </a>
            <a href="myOffences.php">
            <span class="material-icons-outlined">
                gavel
                </span>
                View Offences
            </a>
            <a href="findHouse.php">
                <span class="material-icons-outlined">
                    apartment
                    </span>
                Find Houses
            </a>
            
        </div>

        <div class="main">
            <div class="houseHeading">
                <h2>
                    <u>My House</u>
                </h2>
            </div>

            <div class="wrap">
                
                <?php
                    if(mysqli_num_rows($resultSet) > 0) {
                        while($rows = $resultSet->fetch_assoc())
                        {
                            $houseNumber = $rows['houseNumber'];
                            $rent = $rows['rent'];
                            $estateName = $rows['estateName'];
                            $Username = $rows['Username'];
                            $MobileNumber = $rows['MobileNumber'];
                            
                            echo
                            "<div class='card'>
                                <h2>
                                    <span class='material-icons-outlined'>
                                        door_front
                                    </span>
                                </h2>
                                <div class='container'>
                                    <h4 value='$houseNumber'>House Number: $houseNumber</h4>
                                    <p value='$rent'>Rent: $rent</p>
                                    <h4 value='$Username'>Landlord: $Username</h4>
                                    <p value='$MobileNumber'>Mobile Number: $MobileNumber</p> 
                                    <p value='$estateName'>Estate: $estateName</p> 
                                </div>
                            </div>
                            ";
                            
                        }
                    } else {
                        echo "No house yet.";
                    }       
                ?>
                
               
            </div>
        </div>
    </body>
</html> 
