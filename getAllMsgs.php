<?php
$token = "6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A";

$baseUrl = "https://api.telegram.org/bot" . $token . "/getUpdates";

$allUpdates = [];

$offset = 0;
$limit = 100;


    $urlQuery = $baseUrl . "?offset=" . $offset . "&limit=" . $limit;
    $result = file_get_contents($urlQuery);


    echo $result;