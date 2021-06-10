<?php
    $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subpage.css">
    <script src="https://kit.fontawesome.com/f91ad18e4a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="forum-panel-container">
        <?php 
            if (!isset($_GET['topic'])) {
                $sql = "SELECT watki.ID, watki.tytul, watki.autor, users.ID AS uID, users.username FROM watki JOIN users ON watki.autor = users.ID;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo('<a href="index.php?web=forum&topic=' . $row['ID'] . '"><div class="topic"><div class="topic-title"><span class="topic-title-first">' . $row['tytul'] . '</span><span>Autor: ' . $row['username'] . '</span></div></div></a>');
                    }
                }
            } else {
                $topic = $_GET['topic'];
                $sql = "SELECT posty.ID_watku, posty.autor, posty.tresc, users.ID AS uID, users.username FROM posty JOIN users ON posty.autor = users.ID WHERE posty.ID_watku = $topic;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo('<div class="post"><div class="post-author"><img alt="profile picture" src="img/default_awatar.png" width="150" height="150"><span>' . $row['username'] . '</span></div><div class="post-content"><span>' . $row['tresc'] . '</span></div></div>');
                    }
                }
            }
        ?>
    </div>

</body>
</html>