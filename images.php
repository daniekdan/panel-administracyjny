<?php
    $conn = new mysqli('sql11.freesqldatabase.com', 'sql11415253', 'w8V7l128UD', 'sql11415253');
    $sql = "SELECT * FROM images";
    $result = $conn->query($sql);
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
<div class="img-panel-container">
        <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo('<div class="img-panel-elem"><img src="' . $row['url'] . '"><span>' . $row['description'] . '</span></div>');
                }
            }
        ?>
    </div>

</body>
</html>