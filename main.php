<?php
    $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
    $sql2 = "SELECT ocena, COUNT(ocena) as cnt FROM opinie_uzytkownikow GROUP BY ocena";
    $result2 = $conn->query($sql2);

    

    $dataPoints = array(
    );
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            array_push($dataPoints, array("label"=> $row['ocena'], "y"=> $row['cnt']));
        }
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subpage.css">
    <script>
        window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "Oceny użytkowników o naszej stronie"
        },
        axisY: {
            title: "ilość ocen"
        },
        axisX: {
            title: "Ocena"
        },
        data: [{
            type: "column",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }
    </script>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="Z96F7jrx"></script>
<div class="main-panel-container">
    <div class="container-fb"><div class="fb-page" data-href="https://www.facebook.com/TechnikumAkademickie" data-tabs="timeline" data-width="" data-height="380px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TechnikumAkademickie" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TechnikumAkademickie">Technikum Akademickie przy MWSLiT</a></blockquote></div></div>
    <div class="posts">
    <span class="title">Ostatnie 3 posty</span>
    <?php 
    $sql = "SELECT posty.ID_watku, posty.autor, posty.tresc, watki.tytul, watki.ID, users.ID AS uID, users.username FROM posty LEFT JOIN users ON posty.autor = users.ID LEFT JOIN watki ON posty.ID_watku = watki.ID ORDER BY posty.ID DESC LIMIT 3;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo('<div class="post-preview"><a href="index.php?web=forum&topic=' . $row['ID'] . '"<span>' .  mb_strimwidth($row['tresc'], 0, 70, '...') . ' - @' . $row['username'] . ' w ' . $row['tytul'] . '</span></a></div>');
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
    
    <div class="opinion-chart">
        <div id="chartContainer" style=""></div>
        <div class="opinions">
        <span class="title">Ostatnie 3 opinie</span>
            <?php 
                $sql3 = "SELECT * FROM opinie_uzytkownikow ORDER BY ID DESC LIMIT 3;";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while($row = $result3->fetch_assoc()) {
                        echo('<div class="post-preview"><span>' . 'Ocena: '. $row['ocena']. '<br>'. $row['komentarz'] . ' - @' . $row['autor'] . '</span></div>');
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php 

?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>