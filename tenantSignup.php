<!DOCTYPE html>
<html>
    <head>
        <title>Tenant Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Tangerine:wght@700&display=swap" rel="stylesheet">
        <!-- <script defer src="./js/signup.js"></script> -->
        
    </head>
    <body>
        <div class="sidenav">
            <a href="index.php">
                <span class="material-icons-outlined">
                    home
                    </span>
                Home
            </a>
            <a href="tenantLogin.php">
                <span class="material-icons-outlined">
                    login
                    </span>
                Log in
            </a>
        </div>

        <div class="main">
           <div class="signup_form">
               <h2>Sign Up</h2>
               <form id="sign_form" action = "includes/tenantSignup.inc.php" method="post">
                    <h3>Tenant:</h3>

                    <?php
                        if(isset($_GET["error"])) {
                            if($_GET["error"] == "emptyinput") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Fill in ALL fields.</p>";
                            }
                            else if ($_GET["error"] == "invaliduid") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Username can only contain letters and numbers.</p>";
                            }
                            else if ($_GET["error"] == "invalidMobile") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>phonelink_lock</span> Mobile Number must start with 07........  </p>";
                            }
                            else if ($_GET["error"] == "passwordsdontmatch") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>vpn_key_off</span> Passwords don't match.</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:300px;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> Succesfully Signed Up !</p>";
                            }
                        }
                    ?>

                   <div class="input-control">
                        <input id="tenantName" type="text" name="tenantName" placeholder="Username...">
                        <div class="error"></div>
                   </div>
                   <div class="input-control">
                        <input id="tenantMobile" type="tel" name="tenantMobile" placeholder="Mobile Number..." pattern="[0-9]{10}">
                        <div class="error"></div>
                   </div>
                   <div class="input-control">
                        <input id="tenantPassword" type="password" name="tenantPassword" placeholder="Password..." id="password">
                        <div class="error"></div>
                   </div>
                   <div class="input-control">
                        <input id="userpasswordrepeat" type="password" name="passwordrepeat" placeholder="Repeat Password..." id="confirmpassword">
                        <div class="error"></div>
                   </div>
                   <button type="submit" name="submit">Sign Up</button>
               </form>
           </div>
        </div>
        <!-- <script src="js/signup.js"></script> -->
    </body>
</html> 
