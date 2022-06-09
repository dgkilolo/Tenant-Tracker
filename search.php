<?php
    session_start();
    include_once 'includes/dbh.inc.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Tenant</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/housestyles.css">
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
            <a href="requestOffence.php">
            <span class="material-icons-outlined">
                question_answer
            </span>
                Send Request
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
                    Search Tenant
                </h2>
            </div>

            <div class="signup_form">
               <form id="sign_form" action = "searchedTenant.php" method="post">
                    <label for="">Search</label>
                    <input class="input-control" type="text" name="search_tenant">
                    <button type="submit" name="submit_tenant">Search</button>
               </form>
           </div>
            
        </div>
    </body>
</html> 
