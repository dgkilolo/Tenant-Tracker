<!DOCTYPE html>
<html>
    <head>
        <title>Choose Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/chooseStyles.css">
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
               <h2>Log In as...</h2>

               <h4>Landlord:</h4>
               <form action="login.php" method="post">
                    <button style="color:white" type="submit" name="submit">Landlord Log In</button>
               </form>

               <h4>Tenant:</h4>
               <form action="tenantLogin.php" method="post">
                    <button style="color:white" type="submit" name="submit">Tenant Log In</button>
               </form>
           </div>
        </div>
    </body>
</html> 
