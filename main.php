<?php
    $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subpage.css">
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="Z96F7jrx"></script>
<div class="main-panel-container">
    <div><div class="fb-page" data-href="https://www.facebook.com/TechnikumAkademickie" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TechnikumAkademickie" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TechnikumAkademickie">Technikum Akademickie przy MWSLiT</a></blockquote></div></div>
    <div>
    <span class="title">Ostatnie 3 posty</span>
    <?php 
    $sql = "SELECT posty.ID_watku, posty.autor, posty.tresc, watki.tytul, watki.ID, users.ID AS uID, users.username FROM posty LEFT JOIN users ON posty.autor = users.ID LEFT JOIN watki ON posty.ID_watku = watki.ID ORDER BY posty.ID DESC LIMIT 3;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo('<div class="post-preview"><a href="index.php?web=forum&topic=' . $row['ID'] . '"<span>' . cutText($row['tresc']) . ' - @' . $row['username'] . ' w ' . $row['tytul'] . '</span></a></div>');
        }
    }

    function cutText($text)
{
    if(strlen($text) > 32) {
        $text = substr($text, 0, strpos($text, ' ', 32));
        $text .= "...";
    }

    return $text;
}
    ?>
    </div>
</div>

</body>
</html>