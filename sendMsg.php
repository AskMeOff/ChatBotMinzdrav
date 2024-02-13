<?php
$token = "6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A";
$chat_id = $_GET["idChat"];

$textMessage = $_GET["message"];
$textMessage = urlencode($textMessage);

$urlQuery = "https://api.telegram.org/bot". $token ."/sendMessage?chat_id=". $chat_id ."&text=" . $textMessage;

$result = file_get_contents($urlQuery);
echo "ok";