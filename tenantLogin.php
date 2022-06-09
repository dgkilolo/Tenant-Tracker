<!DOCTYPE html>
<html>
    <head>
        <title>Tenant Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/landlordstyles.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Tangerine:wght@700&display=swap" rel="stylesheet">
       
    </head>
    <body>
        <div class="sidenav">
            <a href="index.php">
                <span class="material-icons-outlined">
                    home
                    </span>
                Home
            </a>
        </div>

        <div class="main">
           <div class="login_form">
               <h2>Log In</h2>
               <form action="includes/tenantLogin.inc.php" method="post">
                   <h4>Tenant:</h4>

                   <?php
                        if(isset($_GET["error"])) {
                            if($_GET["error"] == "emptyinput") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Fill in ALL fields.</p>";
                            }
                            else if ($_GET["error"] == "wrongLogin1") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>warning</span> Username does NOT exist.</p>";
                            }
                            else if ($_GET["error"] == "wrongLogin2") {
                                echo "<p style='color:red;font-family: VT323, monospace;font-size:25px;text-align:center;width:300px;background-color:#DEC6C1' ><span class='material-icons-outlined'>vpn_key_off</span> Invalid Password.</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p style='color:#0DD318;font-size:25px;text-align:center;width:300px;background-color:#CCEACE' ><span class='material-icons-outlined'>check_box</span> Succesfull Log In !</p>";
                            }
                        }
                    ?>
                    
                   <input type="text" name="tenantName" placeholder="Username...">
                   <input type="password" name="tenantPassword" placeholder="Password...">
                   <button type="submit" name="submit">Log In</button>
               </form>
           </div>
        </div>
    </body>
</html> 
