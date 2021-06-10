<?php 
    session_start();
        if (!(isset($_SESSION['username']))) {
             header('location: login.php');
            exit;
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="https://technikum.wroclaw.pl/templates/technikum_ne_v3/images/designer/fa9c37de50ee3da213beadf66018b164_logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f91ad18e4a.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Panel Administracyjny</h1>

        <div>
        <i class="fas fa-user-cog"></i>
            <?php echo $_SESSION['username']?>
            
        </div>

        <div class="log-out"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></div>
    </div>
    <div class="navbar">
        <div class="logo" id="logo"><img src="img/logo.png" alt="logo"></div>
        <ul id="list" class='hide-li'>
            <a href="index.php?web=main"><li><i class="fas fa-folder-open"></i> Treść</li></a>
            <a href="index.php?web=forum"><li><i class="fas fa-comments"></i> Forum</li></a>
            <a href="index.php?web=users"><li><i class="fas fa-users"></i> Użytkownicy</li></a>
            <a href="index.php?web=images"><li><i class="fas fa-desktop"></i> Grafika</li></a>
            <a href="index.php?web=system"><li><i class="fas fa-tachometer-alt"></i> System</li></a>
        </ul>
    </div>
    <div id="container" class="container">
        <?php

        
        $web = $_GET['web'];
        if (isset($_GET['web'])) {
            require($web.'.php');
        } else{
            require('main.php');
        }

        ?>
    </div>
    <div class="footer">
        <p>Projekt został wykonany przez:</p>
        <p>Adrian Lewek, Daniel Żymek, Sebastain Pietras</p>
    </div>
    <script src="js/navbar.js"></script>

</body>
</html>
