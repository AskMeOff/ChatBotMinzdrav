<?php

$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
//file_put_contents('file.txt', '$data: ' . print_r($data, 1) . "\n", FILE_APPEND);

$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

define('TOKEN', '6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A');

$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');

$currentPage = "";
switch ($message) {
    case '/start':
    case 'главное меню':
        $currentPage = "main";
        $method = 'sendMessage';
        $buttons = [
            [
                [
                    "text" => 'Создать запрос',
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

    case false:
        $method = 'sendMessage';
        $send_data = [
            'text' => 'Выберите тип запроса:',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [

                        ['text' => 'Главное меню']
                    ],
                    [
                        ['text' => 'Жалоба']

                    ],
                    [

                        ['text' => 'Вопрос'],
                    ],
                    [

                        ['text' => 'Предложение']
                    ]
                ]
            ]
        ];
        break;
    case 'жалоба':
    case 'вопрос':
    case 'предложение':
        $currentPage = "select_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Брестская'],
                ["text" => 'Витебская']

            ],
            [
                ["text" => 'Гомельская'],
                ["text" => 'Гродненская']

            ],
            [
                ["text" => 'Минская'],
                ["text" => 'Могилевская']

            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите область";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;

    case 'брестская':
        $currentPage = "brest_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case 'витебская':
        $currentPage = "vitebsk_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case 'гомельская':
        $currentPage = "homel_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case "гродненская":
        $currentPage = "grodno_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case "минская":
        $currentPage = "minsk_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case "могилевская":
        $currentPage = "mogilev_area";
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Район1'],
                ["text" => 'Район2']
            ],
            [
                ["text" => 'Район3'],
                ["text" => 'Район4']
            ],
            [
                ["text" => 'Район5'],
                ["text" => 'Район6']
            ],
            [
                ["text" => 'Район7'],
                ["text" => 'Район8']
            ],
            [
                ["text" => 'Район9'],
                ["text" => 'Район10']
            ],
            [
                ["text" => 'Район11'],
                ["text" => 'Район12']
            ],
            [
                ["text" => 'Район13'],
                ["text" => 'Район14']
            ],
            [
                ["text" => 'Назад'],
                ["text" => 'Главное меню']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];
        $text = "Выберите район";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
        break;
    case 'назад':
        if ($currentPage == "homel_area" || $currentPage == "brest_area" ||
            $currentPage == "vitebsk_area" || $currentPage == "grodno_area" ||
            $currentPage == "mogilev_area" || $currentPage == "minsk_area") {
            $currentPage = "select_area";
            $method = 'sendMessage';
            $text = "Выберите область";
            $buttons = [
                [
                    ["text" => "Брестская"],
                    ["text" => "Витебская"]
                ],
                [
                    ["text" => "Гомельская"],
                    ["text" => "Гродненская"]
                ],
                [
                    ["text" => "Могилевская"],
                    ["text" => "Минская"]
                ],
                [
                    ["text" => "Назад"],
                    ["text" => "Главное меню"]
                ]
            ];

            $replyMarkup = [
                "keyboard" => $buttons,
                "resize_keyboard" => true
            ];
            $send_data = [
                "text" => $text,
                "reply_markup" => $replyMarkup
            ];
        }
        break;
    default:
        echo $message;
        $currentPage = "main";
        $method = 'sendMessage';
        $buttons = [
            [
                [
                    "text" => 'Главное меню'
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