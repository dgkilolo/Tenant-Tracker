<?php
    session_start();
    
?>

<?php
    include_once 'includes/dbh.inc.php';

    $landlordSet = $conn->query("SELECT tenantName FROM tenant");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/landlordstyles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
            <a href="myhouse.php">
            <span class="material-icons-outlined">
                night_shelter
                </span>
                My House
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
            <a href="viewRequest.php">
            <span class="material-icons-outlined">
                visibility
            </span>
                View Requests
            </a>
            <a href="includes/logout.inc.php">
            <span class="material-icons-outlined">
                logout
            </span>
                Log Out
            </a>
        </div>

        <div class="main">
            <br><br><br>
            <h1>Welcome, What would you like to do today?</h1><br><br>
            <h4>Check the Side bar for all the Options.</h4>
        </div>
    </body>
</html> 
