<?php
include 'connection.php';
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
                        ['text' => 'Жалоба']

                    ],
                    [

                        ['text' => 'Вопрос'],
                    ],
                    [

                        ['text' => 'Предложение']
                    ],
                    [

                        ['text' => 'Главное меню']
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

            ],
            [
                ['text' => 'Главное меню']
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
                ["text" => 'Барановичский'],
                ["text" => 'Березовский']
            ],
            [
                ["text" => 'Брестский'],
                ["text" => 'Ганцевичский']
            ],
            [
                ["text" => 'Дрогичинский'],
                ["text" => 'Жабинковский']
            ],
            [
                ["text" => 'Ивановский'],
                ["text" => 'Ивацевичский']
            ],
            [
                ["text" => 'Каменецкий'],
                ["text" => 'Кобринский']
            ],
            [
                ["text" => 'Лунинецкий'],
                ["text" => 'Ляховичский']
            ],
            [
                ["text" => 'Малоритский'],
                ["text" => 'Пинский']
            ],
            [
                ["text" => 'Пружанский'],
                ["text" => 'Столинский']
            ],
            [
                ["text" => 'Малоритский'],
                ["text" => 'Пинский']
            ],
            [
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
                ["text" => 'Бешенковичский'],
                ["text" => 'Богушевский']
            ],
            [
                ["text" => 'Ветринский'],
                ["text" => 'Витебский']
            ],
            [
                ["text" => 'Городокский'],
                ["text" => 'Дриссенский']
            ],
            [
                ["text" => 'Дубровенский'],
                ["text" => 'Лепельский']
            ],
            [
                ["text" => 'Лиозненский'],
                ["text" => 'Меховский']
            ],
            [
                ["text" => 'Оршанский'],
                ["text" => 'Освейский']
            ],
            [
                ["text" => 'Полоцкий'],
                ["text" => 'Россонский']
            ],
            [
                ["text" => 'Сенненский'],
                ["text" => 'Сиротинский']
            ],
            [
                ["text" => 'Суражский'],
                ["text" => 'Толочинский']
            ],
            [
                ["text" => 'Ушачский'],
                ["text" => 'Чашникский']
            ],
            [
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
                ["text" => 'Гомельский'],
                ["text" => 'Буда-Кошелёвский']
            ],
            [
                ["text" => 'Ветковский'],
                ["text" => 'Добрушский']
            ],
            [
                ["text" => 'Жлобинский'],
                ["text" => 'Журавичский']
            ],
            [
                ["text" => 'Кормянский'],
                ["text" => 'Лоевский']
            ],
            [
                ["text" => 'Речицкий'],
                ["text" => 'Рогачёвский']
            ],
            [
                ["text" => 'Светиловичский'],
                ["text" => 'Уваровичский']
            ],
            [
                ["text" => 'Тереховский'],
                ["text" => 'Чечерский']
            ],
            [
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
                ["text" => 'Берестовицкий'],
                ["text" => 'Волковысский']
            ],
            [
                ["text" => 'Вороновский'],
                ["text" => 'Гродненский']
            ],
            [
                ["text" => 'Дятловский'],
                ["text" => 'Зельвенский']
            ],
            [
                ["text" => 'Ивьевский'],
                ["text" => 'Кореличский']
            ],
            [
                ["text" => 'Лидский'],
                ["text" => 'Мостовский']
            ],
            [
                ["text" => 'Новогрудский'],
                ["text" => 'Островецкий']
            ],
            [
                ["text" => 'Ошмянский'],
                ["text" => 'Свислочский']
            ],
            [
                ["text" => 'Слонимский'],
                ["text" => 'Сморгонский']
            ],
            [
                ["text" => 'Щучинский'],
                ["text" => 'Гродно']
            ],
            [
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
                ["text" => 'Березинский'],
                ["text" => 'Борисовский']
            ],
            [
                ["text" => 'Вилейский'],
                ["text" => 'Воложинский']
            ],
            [
                ["text" => 'Дзержинский'],
                ["text" => 'Клецкий']
            ],
            [
                ["text" => 'Копыльский'],
                ["text" => 'Крупский']
            ],
            [
                ["text" => 'Логойский'],
                ["text" => 'Любанский']
            ],
            [
                ["text" => 'Минский'],
                ["text" => 'Молодечненский']
            ],
            [
                ["text" => 'Мядельский'],
                ["text" => 'Несвижский']
            ],
            [
                ["text" => 'Пуховичский'],
                ["text" => 'Слуцкий']
            ],
            [
                ["text" => 'Смолевичский'],
                ["text" => 'Солигорский']
            ],
            [
                ["text" => 'Стародорожский'],
                ["text" => 'Столбцовский']
            ],
            [
                ["text" => 'Узденский'],
                ["text" => 'Червенский']
            ],
            [
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
                ["text" => 'Белыничский'],
                ["text" => 'Бобруйский']
            ],
            [
                ["text" => 'Быховский'],
                ["text" => 'Глусский']
            ],
            [
                ["text" => 'Горецкий'],
                ["text" => 'Дрибинский']
            ],
            [
                ["text" => 'Кировский'],
                ["text" => 'Климовичский']
            ],
            [
                ["text" => 'Кличевский'],
                ["text" => 'Костюковичский']
            ],
            [
                ["text" => 'Краснопольский'],
                ["text" => 'Кричевский']
            ],
            [
                ["text" => 'Круглянский'],
                ["text" => 'Могилёвский']
            ],
            [
                ["text" => 'Мстиславский'],
                ["text" => 'Осиповичский']
            ],
            [
                ["text" => 'Славгородский'],
                ["text" => 'Хотимский']
            ],
            [
                ["text" => 'Чаусский'],
                ["text" => 'Чериковский']
            ],
            [
                ["text" => 'Шкловский']
            ],
            [
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

    case "берестовицкий":
        $sql = "SELECT * FROM ab1_table_org";
        $result = mysqli_query($con, $sql);
        $currentPage = "берестовицкий";
        $method = 'sendMessage';
        $buttons = [];

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row["name"];
                    $button =
                        [
                            ["text" => $name]
                        ];
                    array_push($buttons,$button);
                }
            }
            else{
                $text = "Ошибка".mysqli_error($con)."";
                $send_data = [
                    "text" => $text

                ];
            }
            $reply_markup = [
                "keyboard" => $buttons,
                "resize_keyboard" => true
            ];

            $text = "Выберите организацию";
            $send_data = [
                "text" => $text,
                "reply_markup" => $reply_markup
            ];
break;


case "берестовицкая центральная районная больница":
            $method = 'sendMessage';
            $text = "Опишите вашу проблему";
    $buttons = [
        [
            ["text" => 'Чат с оператором']

        ]
    ];
            $reply_markup = [
                  "keyboard" => $buttons,
                  "resize_keyboard" => true
            ];
            $send_data = [
                "text" => $text,
                "reply_markup" => $reply_markup
            ];
        break;

    case "":

        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Решено'],
                ["text" => 'Не решено']
            ],
            [
                ["text" => 'Главное меню']

            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];

        $text = "Перейдите в чат с оператором для решения вашего вопроса \n Открыть чат с оператором \n tg: https://t.me/ai_sotikin \n После того как вы завершите диалог с оператором - оставьте отзыв с помощью кнопок действия";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
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

$send_data['chat_id'] = $data['chat']['id'];

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