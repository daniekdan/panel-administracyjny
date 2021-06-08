<?php
    $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if(isset($_POST['addUser'])){

        $usernameW=$_POST['newusername'];
        $loginW=$_POST['login'];
        $passwordW=$_POST['newpasswd'];

    $addUser = "INSERT INTO users (username, login, password)
    VALUES ('$usernameW', '$loginW', '$loginW')";
    echo "<meta http-equiv='refresh' content='0'>";
    if ($conn->query($addUser) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $addUser . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subpage.css">
</head>
<body>
<div class="user-panel-container">
    <div class="usr-table">
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Nazwa użytkownika</td>
            <td>Rola</td>
        </tr>
    </thead>
    <tbody>
    <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['username'] . "</td><td>";
                    switch ($row['admin']) {
                        case 0:
                            echo "Użytkownik</td></tr>";
                            break;
                        case 1:
                            echo "Administrator</td></tr>";
                            break;
                        }
                    }
                }
        ?>
    </tbody>
</table>
            </div>
<h2>Dodaj użytkownika</h2>
<div class="addUser-container">
        <form action="" method="post">
            <label class="label-text" for="login">Login:</label>
            <input class="input-text" type="text" id="login" name="login" required>
            <label class="label-text" for="username">Nazwa użytkownika:</label>

            <input class="input-text" type="text" id="newusername" name="newusername" required>
            <label class="label-text" for="newpasswd">Hasło:</label>
            <input class="input-text" type="password" id="newpasswd" name="newpasswd" required>

            <input type="submit" name="addUser" value="Dodaj">
        </form>
    </div>
</div>

</body>
</html>