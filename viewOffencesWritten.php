<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $landlordID_session = $_SESSION["landlordID"];
    // $resultSet = $conn->query("SELECT houseNumber, rent, tenantName FROM house WHERE landlordID = $landlordID");
    $resultSet = $conn->query("SELECT * FROM `offence` INNER JOIN tenant ON tenant.tenantID = offence.tenantID WHERE offence.landlordID = $landlordID_session ");
    // $resultSet = $conn->prepare("SELECT houseNumber, rent, tenantID FROM house WHERE landlordID =:landlordID");
    // $resultSet->execute(['landlordID'=>$landlordID]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Offences Written</title>
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
            <a href="offence.php">
            <span class="material-icons-outlined">
                gavel
                </span>
                Write Offence
            </a>
            <a href="viewHouses.php">
                <span class="material-icons-outlined">
                    apartment
                    </span>
                View Houses
            </a>
            
        </div>

        <div class="main">
            <div class="houseHeading">
                <h2>
                    <u>Written Offences</u>
                </h2>
            </div>

            <?php
                
                if(isset($_GET["error"])) {
                    $deleteOffenceDetails = $_GET['deleteOffence'];
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
                        echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:5;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> House Number <u>$deleteOffenceDetails</u> Updated</p>";
                    }
                    else if ($_GET["error"] == "none2") {
                        echo "<p style='color:#F40808;font-size:25px;text-align:center;width:5;background-color:#F39078' ><span class='material-icons-outlined'>delete_forever</span><u>$deleteOffenceDetails's</u> Offence Deleted</p>";
                    }
                }
            ?>            

            <div class="wrap">
                
                <?php
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $tenantName = $rows['tenantName'];
                        $OffenceDescription = $rows['OffenceDescription'];
                        $offenceDate = $rows['offenceDate'];
                        $offenceID = $rows['offenceID'];
                        echo
                        "
                            <div class='card'>
                                <h2>
                                <span class='material-icons-outlined'>
                                    gavel
                                </span>
                                </h2>
                                <div class='container'>
                                    <h4 value='$tenantName'>Tenant: $tenantName</h4>
                                    <p value='$OffenceDescription'>Offence Description: $OffenceDescription</p>
                                    <p value='$offenceDate'>Date: $offenceDate</p>  
                                </div>
                                <button type='submit' name='submit'><a href='deleteOffence.php?deleteOffence=$offenceID'>Delete House</a></button>
                            </div>
                            
                        ";
                        
                    }
                ?>
                
               
            </div>
        </div>
    </body>
</html> 
