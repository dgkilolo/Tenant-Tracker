<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $landlordID = $_SESSION["landlordID"];

    // $resultSet = $conn->query("SELECT houseNumber, rent, tenantName FROM house WHERE landlordID = $landlordID");
    $resultSet = $conn->query("SELECT * FROM `house` INNER JOIN tenant ON tenant.tenantID = house.tenantID WHERE house.landlordID = $landlordID");
    // $resultSet = $conn->prepare("SELECT houseNumber, rent, tenantID FROM house WHERE landlordID =:landlordID");
    // $resultSet->execute(['landlordID'=>$landlordID]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tenant Details</title>
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
                        if(isset($_SESSION["Username"])) {
                            echo $_SESSION["Username"];
                        }
                    ?>
                </a>
            </div>
            <a href="landlord.php">
                <span class="material-icons-outlined">
                    home
                    </span>
                Home
            </a>
            <a href="search.php">
                <span class="material-icons-outlined">
                    search
                    </span>
                Search Tenant
            </a>
            <a href="viewHouses.php">
                <span class="material-icons-outlined">
                    apartment
                    </span>
                View Houses
            </a>
            <a href="addhouse.php">
                <span class="material-icons-outlined">
                    add
                    </span>
                Add House
            </a>
            
        </div>

        <div class="main">
            <div class="houseHeading">
                <h2>
                    View Houses
                </h2>
            </div>

            <div class="wrap">
                
                <?php
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $houseNumber = $rows['houseNumber'];
                        $rent = $rows['rent'];
                        $tenantName = $rows['tenantName'];
                        echo
                        "<div class='card'>
                            <h2>
                                <span class='material-icons-outlined'>
                                    door_front
                                </span>
                            </h2>
                            <div class='container'>
                                <h4 value='$houseNumber'>$houseNumber</h4>
                                <p value='$rent'>$rent</p>
                                <p value='$tenantName'>$tenantName</p>   
                            </div>
                        </div>
                        ";
                        
                    }
                ?>
                
               
            </div>
        </div>
    </body>
</html> 
