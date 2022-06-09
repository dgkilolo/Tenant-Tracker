<?php
    ////////////////////////////////////////////////////
    //ERROR CHECKERS//

    function emptyInputSignup($username, $mobilenumber, $UserPassword, $passwordrepeat) {
        $result;
        if (empty($username) || empty($mobilenumber) || empty($UserPassword) || empty($passwordrepeat)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyInputLogin($username, $UserPassword) {
        $result;
        if (empty($username) || empty($UserPassword)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyInputLoginTenant($tenantName, $tenantPassword) {
        $result;
        if (empty($tenantName) || empty($tenantPassword)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyDescription($offenceDescription) {
        $result;
        if (empty($offenceDescription)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyAddHouse($houseNumber, $bedrooms, $bath, $rent) {
        $result;
        if (empty($houseNumber) || empty($bedrooms) || empty($bath) || empty($rent)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function negativeValues($bedrooms, $bath, $rent) {
        $result;
        if ($bedrooms <= 0 || $bath <= 0 || $rent <= 0){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyAssignHouse($tenantID, $houseID) {
        $result;
        if (empty($tenantID) || empty($houseID)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyUpdateHouse($houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID ) {
        $result;
        if (empty($houseNumber) || empty($bedrooms) || empty($bath) || empty($rent) || empty($tenantID) || empty($landlordID)|| empty($estateID) ){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyEstate($estateName, $estateLocation) {
        $result;
        if (empty($estateName) || empty($estateLocation)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidUid($username) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidMobile($mobilenumber) {
        $result;
        if (!preg_match("/^[0]{1}+[7]{1}+[0-9]{8}+$/", $mobilenumber)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($UserPassword, $passwordrepeat) {
        $result;
        if ($UserPassword !== $passwordrepeat){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    /////////////////////////////////////////////////////

    function createUser($conn, $username, $mobilenumber, $UserPassword) {
        $hashedPassword = password_hash($UserPassword, PASSWORD_DEFAULT);

        $sql = "INSERT INTO landlord (Username, MobileNumber, UserPassword) VALUES ('$username', '$mobilenumber', '$hashedPassword');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed1");
            exit();
        }

    
    mysqli_stmt_bind_param($stmt, 'sss', $username, $mobilenumber, $hashedPassword);

    // mysqli_stmt_bind_param($stmt, 'sss', $username, $mobilenumber, $UserPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();

    }

/////////////////////////////////////////////////////

    function createTenant($conn, $tenantName, $tenantMobile, $tenantPassword) {
        $hashedPassword = password_hash($tenantPassword, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tenant (tenantName, tenantMobile, tenantPassword) VALUES ('$tenantName', '$tenantMobile', '$hashedPassword');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../tenantSignup.php?error=stmtfailed1");
            exit();
        }

    
    mysqli_stmt_bind_param($stmt, 'sss', $tenantName, $mobilenumber, $hashedPassword);

    // mysqli_stmt_bind_param($stmt, 'sss', $username, $mobilenumber, $UserPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../tenantSignup.php?error=none");
    exit();

    }

//////////////////////////////////////////////////////

    function addhouse($conn, $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID) {
        $sql = "INSERT INTO house (houseNumber, bedrooms, bath, rent, tenantID, landlordID, estateID) VALUES ('$houseNumber', '$bedrooms', '$bath', '$rent', '$tenantID', '$landlordID', '$estateID');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../addhouse.php?error=stmtfailed1");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 'siiiiii', $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../addhouse.php?error=none1");
    exit();

    }

//////////////////////////////////////////////////////

    function updateHouse($conn, $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID) {
        $updateHouseID = $_GET['editHouse'];
        // $sql = "UPDATE house SET houseNumber='J005', bedrooms='3', bath='1', rent='22200', tenantID='3', landlordID='10', estateID='1' WHERE houseID = '20';";
        $sql = "UPDATE house SET houseNumber='$houseNumber', bedrooms='$bedrooms', bath='$bath', rent='$rent', tenantID='$tenantID', landlordID='$landlordID', estateID='$estateID' WHERE houseNumber = '$houseNumber';";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../updateHouse.php?error=stmtfailed3");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 'siiiiii', $houseNumber, $bedrooms, $bath, $rent, $tenantID, $landlordID, $estateID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../viewHouses.php?error=none1&editHouse=$houseNumber");
    exit();

    }

    //////////////////////////////////////////////////////

    function createEstate($conn, $estateName, $estateLocation ,$landlordID) {
        $sql = "INSERT INTO estate (estateName, estateLocation, landlordID) VALUES ('$estateName', '$estateLocation', '$landlordID');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../addEstate.php?error=stmtfailed1");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 'ssi', $estateName, $estateLocation, $landlordID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../addEstate.php?error=none1");
    exit();

    }

//////////////////////////////////////////////////////

function assignHouse($conn, $tenantID, $landlordID, $houseID) {
    $sql = "UPDATE house SET tenantID = '$tenantID' WHERE houseID = '$houseID' ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../assignHouse.php?error=stmtfailed1");
        exit();
    }

mysqli_stmt_bind_param($stmt, 'i', $tenantID);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../assignHouse.php?error=none1");
exit();

}

//////////////////////////////////////////////////////

    function uidExists($conn, $username) {
        $sql = "SELECT * FROM landlord WHERE Username = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

    }

    //////////////////////////////////////////////////////

    function TenantUidExists($conn, $tenantName) {
        $sql = "SELECT * FROM tenant WHERE tenantName = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../tenantSignup.php?error=stmtfailed");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 's', $tenantName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

    }

/////////////////////////////////////////////////////

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

/////////////////////////////////////////////////////

    function tenantLogin($conn, $tenantName, $tenantPassword) {

        $TenantUidExists = TenantUidExists($conn, $tenantName);
    
        if($TenantUidExists === false) {
            header("location: ../tenantLogin.php?error=wrongLogin1");
            exit();
        }
    
        $password_hashed = $TenantUidExists["tenantPassword"];
    
        $checkpassword = password_verify($tenantPassword, $password_hashed);
    
        if($checkpassword === false) {
            header("location: ../tenantLogin.php?error=wrongLogin2");
            exit();
        }
        else if ($checkpassword === true) {
            session_start();
            $_SESSION["tenantID"] = $TenantUidExists["tenantID"];
            $_SESSION["tenantName"] = $TenantUidExists["tenantName"];
            header("location: ../tenant.php");
            exit();
        }
    
        }


    //////////////////////////////////////////////////////

    function addOffence($conn, $offenceDescription, $tenantID, $landlordID, $offenceDate) {
        $sql = "INSERT INTO offence (OffenceDescription, tenantID, landlordID, offenceDate) VALUES ('$offenceDescription', '$tenantID', '$landlordID', '$offenceDate');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../offence.php?error=stmtfailed1");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 'siis', $offenceDescription, $tenantID, $landlordID, $offenceDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../offence.php?error=none1");
    exit();

    }

    //////////////////////////////////////////////////////

    function requestPermission($conn, $statusLandlord, $tenantID, $landlordID) {
        // $sql = "UPDATE house SET tenantID = '$tenantID' WHERE houseID = '$houseID' ;";
        $sql = "INSERT INTO request (statusLandlord, tenantID, landlordID) VALUES ('$statusLandlord', '$tenantID', '$landlordID');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../requestOffence.php?error=stmtfailed1");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 'sii', $statusLandlord, $tenantID, $landlordID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../requestOffence.php?error=none1");
    exit();

    }


    //////////////////////////////////////////////////////

    function viewRequest($conn, $statusTenant, $tenantID) {
        // $sql = "UPDATE house SET tenantID = '$tenantID' WHERE houseID = '$houseID' ;";
        // $sql = "INSERT INTO request (statusTenant) VALUES ('$statusTenant');";
        $sql = "UPDATE request SET statusTenant = '$statusTenant' WHERE tenantID = '$tenantID' ;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../viewRequest.php?error=stmtfailed1");
            exit();
        }

    mysqli_stmt_bind_param($stmt, 's', $statusTenant);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../viewRequest.php?error=none1");
    exit();

    }

?>