// function loginUser($conn, $username, $password) {

//     $uidExists = uidExits($conn, $username, $password);

//     if($uidExists === false) {
//         header("location: ../login.php?error=none");
//         exit();
//     }

//     $password_hashed = $uidExists[UserPassword];

//     $checkpassword = password_verify($password, $UserPassword);

//     if($checkpassword === false) {
//         header("location: ../login.php?error=wrongpassword");
//         exit();
//     }
//     else if ($checkpassword === true) {
//         session_start();
//         $_SESSION["landlordID"] = $uidExists["landlordID"];
//         $_SESSION["Username"] = $uidExists["Username"];
//         header("location: ../tenant.php");
//         exit();
//     }


<!-- <?php

//   $serverName = "localhost";
//   $dBUsername = "root";
//   $dBPassword = "";
//   $dBName = "tenant_tracking";

//   $conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);

//   if ($conn->connect_error){
//     die ("Connection failed:". $conn->connect_error);
//   }else {
//     echo "Connected successfully <br />";
//   }

//   $username=trim($_POST['username']);
//   $mobilenumber=trim($_POST['mobilenumber']);
//   $UserPassword=trim($_POST['UserPassword']);
//   $passwordrepeat=trim($_POST['passwordrepeat']);
  

//   $sqli = "INSERT INTO landlord (Username, MobileNumber, UserPassword) VALUES ('$username', '$mobilenumber', '$UserPassword')";
//   if ($conn->query($sqli) === TRUE) {
//       echo "New Landlord record created successfully";
//   } else {
//       echo "Error: " . $sqli . "<br>" . $conn->error;
//   }
//   $con->close();

?> -->


<div class="card">
                    <h2>
                        <span class="material-icons-outlined">
                            door_front
                        </span>
                        <!-- <?php
                            if(isset($_SESSION["Username"])) {
                                echo $_SESSION["Username"];
                            }
                        ?> -->
                    </h2>
                    <div class="container">
                        <h4>
                            House NO.
                        </h4>
                        <p>
                            Rent
                        </p>
                        <p>
                            Tenant
                        </p>
                    </div>
                </div>
                <div class="card">
                    <h2>
                        <span class="material-icons-outlined">
                            door_front
                        </span>
                        <!-- <?php
                            if(isset($_SESSION["Username"])) {
                                echo $_SESSION["Username"];
                            }
                        ?> -->
                    </h2>
                    <div class="container">
                        <h4>
                            House NO.
                        </h4>
                        <p>
                            Rent
                        </p>
                        <p>
                            Tenant
                        </p>
                    </div>
                </div>
                <div class="card">
                    <h2>
                        <span class="material-icons-outlined">
                            door_front
                        </span>
                        <!-- <?php
                            if(isset($_SESSION["Username"])) {
                                echo $_SESSION["Username"];
                            }
                        ?> -->
                    </h2>
                    <div class="container">
                        <h4>
                            House NO.
                        </h4>
                        <p>
                            Rent
                        </p>
                        <p>
                            Tenant
                        </p>
                    </div>
                </div>
                <div class="card">
                    <h2>
                        <span class="material-icons-outlined">
                            door_front
                        </span>
                        <!-- <?php
                            if(isset($_SESSION["Username"])) {
                                echo $_SESSION["Username"];
                            }
                        ?> -->
                    </h2>
                    <div class="container">
                        <h4>
                            House NO.
                        </h4>
                        <p>
                            Rent
                        </p>
                        <p>
                            Tenant
                        </p>
                    </div>
                </div>

                //////////////////////////////////////////////////////

// function searchTenant($conn, $tenantName) {
//     // $tenantName = $_POST["searchTenant"];
//     $sql = "SELECT * FROM tenant WHERE tenantName = ?";
//     $stmt = mysqli_stmt_init($conn);
//     $stmt->mysqli_stmt_bind_param('s', $tenantName);
//     $stmt -> execute();

//     $stmt -> bind_result($district);

//     $stmt -> fetch();


//     $stmt -> close();

    // $stmt = mysqli_stmt_init($conn);
    // if (!mysqli_stmt_prepare($stmt, $sql)){
    //     header("location: ../search.php?error=stmtfailed3");
    //     exit();
    // }


    // mysqli_stmt_bind_result($stmt, $district);
    // // mysqli_stmt_bind_param($stmt, 's', $tenantName);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
        

    // $sql->setFetchMode(PDO:: FETCH_OBJ);
    // $sql -> execute();

// header("location: ../search.php?error=none1");
// exit();

// }


function loginUser($conn, $username, $UserPassword) {

$uidExists = uidExists($conn, $username);

if($uidExists === false) {
    header("location: ../login.php?error=wrongLogin1");
    exit();
}

$password_hashed = $uidExists["UserPassword"];

$checkpassword = password_verify($UserPassword, $password_hashed);

if($checkpassword === false) {
    header("location: ../login.php?error=wrongLogin2");
    exit();
}
else if ($checkpassword === true) {
    session_start();
    $_SESSION["landlordID"] = $uidExists["landlordID"];
    $_SESSION["Username"] = $uidExists["Username"];
    header("location: ../landlord.php");
    exit();
}

}