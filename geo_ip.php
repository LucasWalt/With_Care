<?php

$url = "https://api.hgbrasil.com/geoip?key=34913316&address=remote&precision=false";

$json = file_get_contents("$url");
$data = json_decode($json);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>geo</title>
</head>
<body>

<h1 style="text-align: center;"><?php echo $data->latitude; ?></h1>
<br><br>
<h1 style="text-align: center;"><?php echo $data->longitude; ?></h1>
    
</body>
</html>