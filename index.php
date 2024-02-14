<?php

$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
file_put_contents('file.txt', '$data: ' . print_r($data, 1) . "\n", FILE_APPEND);

$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

define('TOKEN', '6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A');

$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');

$currentPage = "";
switch ($message) {

    case '/start':
        $currentPage = "main";
        $method = 'sendMessage';
        $buttons = [
            [
                [
                    "text" => "Создать запрос",
                    "request_contact" => true
                ]
            ],
            [
                [
                    "text" => "Помощь"
                ]
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Здравствуйте, " . ($data["from"]["first_name"] === "null" ? $data["from"]["last_name"] : $data["from"]["first_name"]) . "\nВыберите действие из меню";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];

        break;
    case 'да':
        $method = 'sendMessage';
        $send_data = [
            'text' => 'Что вы хотите заказать?',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'Яблоки'],
                        ['text' => 'Груши'],
                    ],
                    [
                        ['text' => 'Лук'],
                        ['text' => 'Чеснок'],
                    ]
                ]
            ]
        ];
        break;
    case 'нет':
        $method = 'sendMessage';
        $send_data = ['text' => 'Приходите еще'];
        break;
    case 'яблоки':
        $method = 'sendMessage';
        $send_data = ['text' => 'заказ принят!'];
        break;
    case 'груши':
        $method = 'sendMessage';
        $send_data = ['text' => 'заказ принят!'];
        break;
    case 'лук':
        $method = 'sendMessage';
        $send_data = ['text' => 'заказ принят!'];
        break;
    case 'чеснок':
        $method = 'sendMessage';
        $send_data = ['text' => 'заказ принят!'];
        break;
    default:
        $currentPage = "main";
        $method = 'sendMessage';
        $buttons = [
            [
                [
                    "text" => "Создать запрос",
                    "request_contact" => true
                ]
            ],
            [
                [
                    "text" => "Помощь"
                ]
            ]
        ];
        $send_data = [
            'text' => "Неизвестная команда \n Введите /start для создания запроса",
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => $buttons
            ]
        ];
}

$send_data['chat_id'] = $data['chat'] ['id'];

$res = sendTelegram($method, $send_data);


function sendTelegram($method, $data, $headers = [])
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"))
    ]);
    $result = curl_exec($curl);
    curl_close($curl);
    return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}

?>