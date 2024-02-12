<?php
$token = "6975059354:AAHLeE-_uDIOsVbql13DgSHP-PJN5B8WGQg";

$urlQuery = "https://api.telegram.org/bot". $token ."/getUpdates";

//$curl
//    =
//    curl_init();
//curl_setopt($curl, CURLOPT_URL, $urlQuery);
//curl_exec($curl);
//curl_setopt($curl,
//    CURLOPT_RETURNTRANSFER
//    , 1);
//$result = curl_exec($curl);
$result = file_get_contents($urlQuery);

echo $result;