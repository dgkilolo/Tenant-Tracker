<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $landlordID = $_SESSION["landlordID"];

    
    $resultSet = $conn->query("SELECT * FROM `house` INNER JOIN tenant ON tenant.tenantID = house.tenantID INNER JOIN estate ON estate.estateID = house.estateID WHERE house.landlordID = $landlordID ORDER BY estate.estateName, house.tenantID, house.houseNumber");
    
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
                <a href="profile.php">
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
            <a href="addEstate.php">
                <span class="material-icons-outlined">
                location_on
                </span>
                Create Estate
            </a>
            
        </div>

        <div class="main">
            <div class="houseHeading">
                <h2>
                    <u>View Houses</u>
                </h2>
            </div>

            <?php
                
                if(isset($_GET["error"])) {
                    $updateHouseID = $_GET['editHouse'];
                    if($_GET["error"] == "emptyinput") {
                        echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:400px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Fill in Offence field.</p>";
                    }
                    else if ($_GET["error"] == "wrongLogin1") {
                        echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Username does NOT exist.</p>";
                    }
                    else if ($_GET["error"] == "wrongLogin2") {
                        echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>vpn_key_off</span> Invalid Password.</p>";
                    }
                    else if ($_GET["error"] == "none1") {
                        echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:5;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> House Number <u>$updateHouseID</u> Updated</p>";
                    }
                    else if ($_GET["error"] == "none2") {
                        echo "<p style='color:#F40808;font-size:25px;text-align:center;width:5;background-color:#F39078' ><span class='material-icons-outlined'>delete_forever</span> House <u>$updateHouseID</u> Deleted</p>";
                    }
                }
            ?>            

            <div class="wrap">
                
                <?php
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $houseID = $rows['houseID'];
                        $houseNumber = $rows['houseNumber'];
                        $rent = $rows['rent'];
                        $tenantName = $rows['tenantName'];
                        $estateName = $rows['estateName'];
                        $bath = $rows['bath'];
                        $bedrooms = $rows['bedrooms'];
                        echo
                        "
                            <a href='updateHouse.php?editHouse=$houseID'>
                            <div class='card'>
                                <h2>
                                    <span class='material-icons-outlined'>
                                        door_front
                                    </span>
                                </h2>
                                <div class='container'>
                                    <h4 value='$houseNumber'>House Number: $houseNumber</h4>
                                    <p value='$rent'>Rent: $rent /=</p>
                                    <p value='$bedrooms'>Bedrooms: $bedrooms</p>
                                    <p value='$bath'>Bath: $bath</p>
                                    <p value='$tenantName'>Tenant: $tenantName</p>
                                    <p value='$estateName'>Estate: $estateName</p>   
                                </div>
                            </div>
                            </a>
                        ";
                        
                    }
                ?>
                
               
            </div>
        </div>
    </body>
</html> 
