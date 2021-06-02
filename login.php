<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/other.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f91ad18e4a.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="login-container">
        <form action="" method="post">
            <h1>Logowanie</h1>
            <label class="label-text" for="username">Login:</label>
            <input class="input-text" type="text" id="username" name="username" required>
            <label class="label-text" for="passwd">Hasło:</label>
            <input class="input-text" type="password" id="passwd" name="passwd" required>
            <input type="submit" name="login" value="Zaloguj">
        </form>
    </div>

    <div class="wrongPasswd"><?php 
        $dir = dirname(dirname(__FILE__));
        $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);   
        }
        if(isset($_POST['login'])){
            $usernameW=$_POST['username'];
            $passwordW=$_POST['passwd'];

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if (($usernameW == $row["login"])&&($passwordW == $row["password"])){
                        session_start();
                        $_SESSION['username'] = 'Admin';
                        header('location: index.php');
                    } else {
                        echo "Zły login lub hasło";
                    }
                }
            }
        }
        $conn->close();
    ?></div>
</body>
</html>