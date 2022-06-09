<?php
    session_start();
    
?>

<?php
    include_once 'includes/dbh.inc.php';

    $landlordSet = $conn->query("SELECT Username FROM landlord");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Landlord Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/landlordstyles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
            <a href="offence.php">
            <span class="material-icons-outlined">
                gavel
                </span>
                Write Offence
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
            <a href="assignHouse.php">
            <span class="material-icons-outlined">
                assignment_turned_in
                </span>
                Assign House
            </a>
            <a href="addhouse.php">
                <span class="material-icons-outlined">
                    add
                    </span>
                Add House
            </a>
            <!-- <a href="includes/logout.inc.php">
            <span class="material-icons-outlined">
                logout
            </span>
                Log Out
            </a> -->
        </div>

        <div class="main">
            <br><br><br>
            <h1>Welcome, What would you like to do today?</h1><br><br>
            <h4>Check the Side bar for all the Options.</h4>
        </div>
    </body>
</html> 
