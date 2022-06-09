<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $resultSet = $conn->query("SELECT Username, landlordID FROM landlord");
    $landlordID_session = $_SESSION["landlordID"];
    $resultSet2 = $conn->query("SELECT houseNumber, houseID FROM house WHERE house.landlordID = $landlordID_session AND tenantID = '3' ");
    $tenantWithHouse = $conn->query("SELECT tenantID FROM house ");
    $resultSet3 = $conn->query("SELECT tenant.tenantName,tenant.tenantID FROM tenant WHERE tenant.tenantID NOT IN (SELECT house.tenantID from house)");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Assign House</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/landlordstyles.css">
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
           <div class="signup_form">
               <h2><u>Assign House</u></h2>
               <form id="sign_form" action = "includes/assignHouse.inc.php" method="post">
                    
                    <?php
                        if(isset($_GET["error"])) {
                            if($_GET["error"] == "emptyinput") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Fill in ALL fields.</p>";
                            }
                            else if ($_GET["error"] == "wrongLogin1") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Username does NOT exist.</p>";
                            }
                            else if ($_GET["error"] == "wrongLogin2") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>vpn_key_off</span> Invalid Password.</p>";
                            }
                            else if ($_GET["error"] == "none1") {
                                echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:300px;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> House Assigned. </p>";
                            }
                        }
                    ?>
                    
                   <div class="input-control">
                        <label for="">Select Tenant:</label>
                        <select name="tenantID" id="">
                            <?php
                                while($rows = $resultSet3->fetch_assoc())
                                {
                                    $tenantName = $rows['tenantName'];
                                    $tenantID = $rows['tenantID'];
                                    echo"<option value='$tenantID'>$tenantName</option>";
                                }
                            ?>
                        </select>
                   </div>
                   
                   <div class="input-control">
                        <label for="">Select House:</label>
                        <select name="houseID" id="">
                            <?php
                                while($rows = $resultSet2->fetch_assoc())
                                {
                                    $house = $rows['houseNumber'];
                                    $houseID = $rows['houseID'];
                                    echo"<option value='$houseID'>$house</option>";
                                }
                            ?>
                        </select>
                   </div>
                   <button type="submit" name="submit">Assign House</button>
               </form>
           </div>
        </div>
    </body>
</html> 
