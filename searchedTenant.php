<?php
    session_start();
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Searched Tenant</title>
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
            
        </div>

        <div class="main">
            <div class="houseHeading">
                <h2>
                    Searched Tenant
                </h2>
            </div>

            <div class="wrap">
 
            <?php
            include_once 'includes/dbh.inc.php';

    if(isset($_POST["submit_tenant"])) {
        $searchedTenant = mysqli_real_escape_string($conn, $_POST["search_tenant"]);
        // $sql = "SELECT * FROM tenant WHERE tenantName = '$searchedTenant' ";
        // $sql = "SELECT * FROM tenant INNER JOIN landlord ON landlord.landlordID = tenant.landlordID WHERE tenant.tenantName = '$searchedTenant' ";
        $landlordID_session = $_SESSION["landlordID"];
        $sql = "SELECT * FROM tenant INNER JOIN request ON request.landlordID = $landlordID_session WHERE tenant.tenantName = '$searchedTenant' AND request.statusTenant = 'accessGranted' ";
        // $sql2 = "SELECT * FROM offence WHERE ";
        $sql2 = "SELECT * FROM tenant INNER JOIN request ON request.landlordID = $landlordID_session INNER JOIN offence ON offence.tenantID = tenant.tenantID INNER JOIN landlord ON landlord.landlordID = offence.landlordID WHERE tenant.tenantName = '$searchedTenant' AND request.statusTenant = 'accessGranted' ";
        // $sql = "SELECT * FROM tenant WHERE tenant.tenantName = '$searchedTenant' ";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $queryResult = mysqli_num_rows($result);
        $queryResult2 = mysqli_num_rows($result2);

        // echo "There are ".$queryResult."$result!" ;
        
        if($queryResult > 0) {
            while($rows = mysqli_fetch_assoc($result))
                {
                   
                    $tenantName = $rows['tenantName'];
                    // $houseNumber = $rows['houseNumber'];
                    // $rent = $rows['rent'];
                    // $tenantName = $rows['tenantName'];
                    // <p value='$rent'>$rent</p>
                    // <p value='$tenantName'>$tenantName</p>
                    
                    echo
                    "
                        <div class='card'>
                            <h2>
                                <span class='material-icons-outlined'>
                                    door_front
                                </span>
                            </h2>
                            <div class='container'>
                                <h4 value='$tenantName'>$tenantName</h4>
                            </div>
                        </div>
                    ";
                    if($queryResult2 > 0) {
                        while($rows2 = mysqli_fetch_assoc($result2)) {
                            $OffenceDescription = $rows2['OffenceDescription'];
                            $OffenceDate = $rows2['offenceDate'];
                            $Username = $rows2['Username'];
                            $MobileNumber = $rows2['MobileNumber'];
                            echo 
                            "
                            <div class='card'>
                                <h2>
                                    <h4 value='$tenantName'>$tenantName's Offences</h4>
                                </h2>
                                <div class='container'>
                                    <p value='$OffenceDescription'>$OffenceDescription</p>
                                    <p value='$OffenceDate'>$OffenceDate</p>
                                    <p value='$Username'><b>Written by:</b>$Username <b>Mobile:</b> $MobileNumber </p>
                                </div>
                            </div>
                            
                            ";
                        }
                     
                    }
                    
                }
        
        } else {
            echo "Tenant NOT found :(";
        }
    }
    
    //   else {
    //     header("location: ../search.php");
    //     exit();
    //   }
    
?>
                
               
            </div>
        </div>
    </body>
</html> 
