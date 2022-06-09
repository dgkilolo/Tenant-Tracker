<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>
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
            <a href="landlord.php">
                <span class="material-icons-outlined">
                    home
                    </span>
                Home
            </a>
        </div>

        <div class="main">
           <div class="login_form">
               <h2>Log Out</h2>
               <form action="includes/logout.inc.php" method="post">
                   
                   <button style='font-size:20px' type="submit" name="submit"><span class="material-icons-outlined">logout</span>     Log Out</button>
               </form>
           </div>
        </div>
    </body>
</html> 
