<?php
$token = "6558394235:AAHpGBvVs9IyDkhMpsWVJ7icYBV7QTGi8gY";

$baseUrl = "https://api.telegram.org/bot" . $token . "/getUpdates";

$allUpdates = [];

$offset = 0;
$limit = 100;


    $urlQuery = $baseUrl . "?offset=" . $offset . "&limit=" . $limit;
    $result = file_get_contents($urlQuery);


    echo $result;