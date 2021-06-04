<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f91ad18e4a.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Panel Administracyjny</h1>
        <div class="log-out"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></div>
    </div>
    <div class="navbar">
        <div class="logo"><img src="img/logo.png" alt="logo"></div>
        <ul>
            <li><i class="fas fa-folder-open"></i> Treść</li>
            <li><i class="fas fa-comments"></i> Forum</li>
            <li><i class="fas fa-users"></i> Użytkownicy</li>
            <li><i class="fas fa-desktop"></i> Grafika</li>
            <li><i class="fas fa-wrench"></i> Narzędzia</li>
            <li><i class="fas fa-cog"></i> Konfiguracja</li>
            <li><i class="fas fa-tachometer-alt"></i> System</li>
        </ul>
    </div>
    <div class="container">
        
    </div>
    <div class="footer">
        <p>Projekt został wykonany przez:</p>
        <p>Adrian Lewek, Daniel Żymek, Sebastain Pietras</p>
    </div>

    <?php 
        session_start();
        if ($_SESSION['username'] != 'Admin') {
            header('location: /login.php');
            exit;
        }
    ?>
</body>
</html>