<?php
    session_start();
    
?>
<?php
    include_once 'includes/dbh.inc.php';

    $dateNow = date("Y-m-d");

    $resultSet = $conn->query("SELECT Username, landlordID FROM landlord");
    $resultSet2 = $conn->query("SELECT estateName, estateID FROM estate");
    $landlordIDSession = $_SESSION['landlordID'];
    $resultSet3 = $conn->query("SELECT tenant.tenantName,tenant.tenantID FROM tenant INNER JOIN house ON house.tenantID = tenant.tenantID WHERE NOT house.tenantID = 3 AND house.landlordID = $landlordIDSession ");
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Write Offence</title>
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
            <a href="viewOffencesWritten.php">
            <span class="material-icons-outlined">
                    summarize
                    </span>
                View Offences
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
           <div class="signup_form">
               <h2><u>Offence</u></h2>
               <form id="sign_form" action = "includes/offence.inc.php" method="post">

                    <?php
                        if(isset($_GET["error"])) {
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
                                echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:300px;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> Offence Written.</p>";
                            }
                        }
                    ?>
                    
                   <div class="input-control">
                        <textarea type = "text" id="username" rows = "7" cols = "20" name="offenceDescription" placeholder="Describe Offence..."></textarea>
                        <div class="error"></div>
                   </div>
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
                        <label for="">Offence Date:</label>
                        <input type="date" placeholder="Offence Date" name="offenceDate" value=<?php echo $dateNow; ?>>
                    </div>
                   <button type="submit" name="submit">Add Offence</button>
               </form>
           </div>
        </div>
    </body>
</html> 
