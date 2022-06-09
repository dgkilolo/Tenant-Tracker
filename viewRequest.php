<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $tenantID_session = $_SESSION["tenantID"];

    // $resultSet = $conn->query("SELECT houseNumber, rent, tenantName FROM house WHERE landlordID = $landlordID");
    $resultSet = $conn->query("SELECT request.landlordID, request.statusLandlord, landlord.Username FROM request INNER JOIN landlord ON landlord.landlordID = request.landlordID WHERE request.tenantID = $tenantID_session");
    // $resultSet = $conn->prepare("SELECT houseNumber, rent, tenantID FROM house WHERE landlordID =:landlordID");
    // $resultSet->execute(['landlordID'=>$landlordID]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Requests</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/housestyles.css">
        <!-- <link rel="stylesheet" href="css/landlordstyles.css"> -->
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
                    <u>My Requests</u>
                </h2>
            </div>

            <div class="wrap">
                
                <?php
                    if(mysqli_num_rows($resultSet) > 0) {
                        while($rows = $resultSet->fetch_assoc())
                        {
                            $landlordName = $rows['Username'];
                            $statusLandlord = $rows['statusLandlord'];
                            $tenantName = $_SESSION['tenantName'];
                            $tenantID = $_SESSION['tenantID'];
                            echo
                            "<div class='card'>
                                <h2>
                                <span class='material-icons-outlined'>
                                    help_outline
                                </span>
                                </h2>
                                <div class='container'>
                                    <h4 value='$landlordName'>Landlord: $landlordName</h4>
                                    <p value='$statusLandlord'>has $statusLandlord</p>   
                                </div>
                                <hr>
                                <form id='sign_form' action = 'includes/viewRequest.inc.php' method='post'>
                                    
                                    <div class='input-control'>
                                    <label style='color:#008080; font-size:20px;' >Grant Access:</label>
                                    <select name='statusTenant' >
                                        <option value='accessDenied'>Access Denied</option>
                                        <option value='accessGranted'>Allow</option>
                                    </select>
                                    </div>
                                    <button type='submit' name='submit'>Send Status</button>
                                </form>
                            </div>
                            ";
                        }
                    } else {
                        echo "No Requests.";
                    }
                ?>
                
               
            </div>
        </div>
    </body>
</html> 
