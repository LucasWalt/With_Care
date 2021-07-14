<?php
    $url = "https://api.hgbrasil.com/geoip?fields=only_results,latitude,longitude,city&key=34913316&address=remote";

    $html = file_get_contents("$url");

    $p1 = explode('<pre style="word-wrap: break-word; white-space: pre-wrap;">',$html);

    $p2 = explode('</pre>',$p1[0]);

    $json = $p2[0];

    $data = json_decode("$json");
?>






