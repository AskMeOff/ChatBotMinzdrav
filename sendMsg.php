<?php
$token = "6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A";
$chat_id = $_GET["idChat"];

$textMessage = $_GET["message"];
$textMessage = urlencode($textMessage);
$replyMarkup = $_GET['reply_markup'];

$urlQuery = "https://api.telegram.org/bot". $token ."/sendMessage?chat_id=". $chat_id ."&text=" . $textMessage;

$data = array(
    'chat_id' => $chat_id,
    'text' => $textMessage,
    'reply_markup' => $replyMarkup
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($urlQuery, false, $context);
echo "ok";