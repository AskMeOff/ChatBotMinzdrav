<?php
include 'connection.php';
$dataupdate = json_decode(file_get_contents('php://input'), TRUE);

//пишем в файл лог сообщений
file_put_contents('file.txt', '$data: ' . print_r($dataupdate, 1) . "\n", FILE_APPEND);

$data = $dataupdate['callback_query'] ? $dataupdate['callback_query'] : $dataupdate['message'];

define('TOKEN', '6975059354:AAE-Vjnx_RPyjqZJQh_zr80CmfY7YMp4q_A');

$message = ($data['text'] ? $data['text'] : $data['data']);


if ($message == '/start' || $message == 'Главное меню') {
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
} elseif (!$message) {
    $id_chat = $data['chat']['id'];
    $phone_number = $data['contact']['phone_number'];
    $username = $data['from']['username'];
    if($username == "") {
        $username = $data['from']['first_name'];
        if($username == "") {
            $username = $data['from']['last_name'];
        }
    }

    $query = "INSERT INTO ab1_zayavka (phone_number,id_chat, username) values('$phone_number','$id_chat', '$username')";
    mysqli_query($con, $query);
    $method = 'sendMessage';
    $send_data = [
        'text' => 'Выберите тип запроса:',
        'reply_markup' => [
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => 'Жалоба']],
                [['text' => 'Вопрос']],
                [['text' => 'Предложение']],
                [['text' => 'Главное меню']]
            ]
        ]
    ];
} elseif ($message == 'Жалоба' || $message == 'Вопрос' || $message == 'Предложение') {
    $id_chat = $data['chat']['id'];
    $query = "update ab1_zayavka set id_type = '$message' where id_chat = '$id_chat'";
    mysqli_query($con, $query);
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
        [['text' => 'Главное меню']]
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
} elseif ($message == 'Брестская') {

    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Барановичский'], ["text" => 'Березовский']],
        [["text" => 'Брестский'], ["text" => 'Ганцевичский']],
        [["text" => 'Дрогичинский'], ["text" => 'Жабинковский']],
        [["text" => 'Ивановский'], ["text" => 'Ивацевичский']],
        [["text" => 'Каменецкий'], ["text" => 'Кобринский']],
        [["text" => 'Лунинецкий'], ["text" => 'Ляховичский']],
        [["text" => 'Малоритский'], ["text" => 'Пинский']],
        [["text" => 'Пружанский'], ["text" => 'Столинский']],
        [["text" => 'Малоритский'], ["text" => 'Пинский']],
        [["text" => 'Главное меню']]
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
} else if ($message == 'Витебская') {

    $currentPage = "vitebsk_area";
    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Бешенковичский'], ["text" => 'Богушевский']],
        [["text" => 'Ветринский'], ["text" => 'Витебский']],
        [["text" => 'Городокский'], ["text" => 'Дриссенский']],
        [["text" => 'Дубровенский'], ["text" => 'Лепельский']],
        [["text" => 'Лиозненский'], ["text" => 'Меховский']],
        [["text" => 'Оршанский'], ["text" => 'Освейский']],
        [["text" => 'Полоцкий'], ["text" => 'Россонский']],
        [["text" => 'Сенненский'], ["text" => 'Сиротинский']],
        [["text" => 'Суражский'], ["text" => 'Толочинский']],
        [["text" => 'Ушачский'], ["text" => 'Чашникский']],
        [["text" => 'Главное меню']]
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
} elseif ($message == 'Гомельская') {

    $currentPage = "homel_area";
    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Гомельский'], ["text" => 'Буда-Кошелёвский']],
        [["text" => 'Ветковский'], ["text" => 'Добрушский']],
        [["text" => 'Жлобинский'], ["text" => 'Журавичский']],
        [["text" => 'Кормянский'], ["text" => 'Лоевский']],
        [["text" => 'Речицкий'], ["text" => 'Рогачёвский']],
        [["text" => 'Светиловичский'], ["text" => 'Уваровичский']],
        [["text" => 'Тереховский'], ["text" => 'Чечерский']],
        [["text" => 'Главное меню']]
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
} elseif ($message == 'Гродненская') {
    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Берестовицкий'], ["text" => 'Волковысский']],
        [["text" => 'Вороновский'], ["text" => 'Гродненский']],
        [["text" => 'Дятловский'], ["text" => 'Зельвенский']],
        [["text" => 'Ивьевский'], ["text" => 'Кореличский']],
        [["text" => 'Лидский'], ["text" => 'Мостовский']],
        [["text" => 'Новогрудский'], ["text" => 'Островецкий']],
        [["text" => 'Ошмянский'], ["text" => 'Свислочский']],
        [["text" => 'Слонимский'], ["text" => 'Сморгонский']],
        [["text" => 'Щучинский'], ["text" => 'Гродно']],
        [["text" => 'Главное меню']]
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
} elseif ($message == 'Минская') {

    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Березинский'], ["text" => 'Борисовский']],
        [["text" => 'Вилейский'], ["text" => 'Воложинский']],
        [["text" => 'Дзержинский'], ["text" => 'Клецкий']],
        [["text" => 'Копыльский'], ["text" => 'Крупский']],
        [["text" => 'Логойский'], ["text" => 'Любанский']],
        [["text" => 'Минский'], ["text" => 'Молодечненский']],
        [["text" => 'Мядельский'], ["text" => 'Несвижский']],
        [["text" => 'Пуховичский'], ["text" => 'Слуцкий']],
        [["text" => 'Смолевичский'], ["text" => 'Солигорский']],
        [["text" => 'Стародорожский'], ["text" => 'Столбцовский']],
        [["text" => 'Узденский'], ["text" => 'Червенский']],
        [["text" => 'Главное меню']]
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
} elseif ($message == 'Могилевская') {
    $method = 'sendMessage';
    $buttons = [
        [["text" => 'Белыничский'], ["text" => 'Бобруйский']],
        [["text" => 'Быховский'], ["text" => 'Глусский']],
        [["text" => 'Горецкий'], ["text" => 'Дрибинский']],
        [["text" => 'Кировский'], ["text" => 'Климовичский']],
        [["text" => 'Кличевский'], ["text" => 'Костюковичский']],
        [["text" => 'Краснопольский'], ["text" => 'Кричевский']],
        [["text" => 'Круглянский'], ["text" => 'Могилёвский']],
        [["text" => 'Мстиславский'], ["text" => 'Осиповичский']],
        [["text" => 'Славгородский'], ["text" => 'Хотимский']],
        [["text" => 'Чаусский'], ["text" => 'Чериковский']],
        [["text" => 'Шкловский']],
        [["text" => 'Главное меню']]
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
} elseif ($message == 'Берестовицкий') {
    $sql = "SELECT * FROM ab1_table_org where rayon = '$message'";
    $result = mysqli_query($con, $sql);
    $method = 'sendMessage';
    $buttons = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $button =
                [
                    ["text" => $name]
                ];
            array_push($buttons, $button);
        }
    } else {
        $text = "Ошибка" . mysqli_error($con) . "";
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
}
elseif ($message == 'Гродно') {

    $sql = "SELECT * FROM ab1_table_org where rayon = '$message'";
    $result = mysqli_query($con, $sql);
    $method = 'sendMessage';
    $buttons = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $button =
                [
                    ["text" => $name]
                ];
            array_push($buttons, $button);
        }
    } else {
        $text = "Ошибка" . mysqli_error($con) . "";
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
}
elseif ($message == "Берестовицкая центральная районная больница") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
} elseif ($message == "Эйсмонтовская больница сестринского ухода") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "М. Берестовицкая АВОП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Макаровская АВОП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Пограничная АВОП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Эисмонтовская АВОП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Олекшицкая АВОП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Кватерский ФАП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Конюховский ФАП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Массолянский ФАП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Пархимовский ФАП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == "Поплавский ФАП") {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif ($message == 'УЗ "Городская клиническая больница №2 г.Гродно"') {
    selectOrg($data,$con,$message);
    $method = 'sendMessage';
    $text = 'Опишите вашу проблему';
    $send_data = [
        "text" => $text,
        "reply_markup" => json_encode([
            "remove_keyboard" => true
        ])
    ];
}
elseif (($message == "Решено") || ($message== "Не решено")) {
    $query = "SELECT login_telegram  FROM ab1_table_org where `name` = '$message'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $login_telegram = $row['login_telegram'];
    }
    updStatus($data, $con, $message);
    $method = 'sendMessage';
    $text = 'Спасибо за обращение. Ваше обращение будет рассмотрено администрацией. Чтобы вернуться в главное меню введите /start или воспользуйтесь кнопкой действия Главное меню';
    $buttons = [
        [["text" => 'Главное меню']]];
    $reply_markup = [
        "keyboard" => $buttons,
        "resize_keyboard" => true
    ];
    $send_data = [
        "text" => $text,
        "reply_markup" => $reply_markup
    ];

}
else {
    $id_chat = $data['chat']['id'];
    $query = "SELECT id_type,id_obl,id_rayon,id_org,login_telegram  FROM ab1_zayavka where id_chat = '$id_chat' ORDER BY id_ab1_zayavka DESC LIMIT 1;";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_type = $row['id_type'];
        $id_obl = $row['id_obl'];
        $id_rayon = $row['id_rayon'];
        $id_org = $row['id_org'];
        $login_telegram = $row['login_telegram'];
    }
    if ($id_type != "" && $id_obl != "" && $id_rayon != "" && $id_org != "")
    {
        updAnswer($data, $con, $message);
        $method = 'sendMessage';
        $buttons = [
            [
                ["text" => 'Решено'],
                ["text" => 'Не решено']
            ]
        ];
        $reply_markup = [
            "keyboard" => $buttons,
            "resize_keyboard" => true
        ];

        $text = "Перейдите в чат с оператором для решения вашего вопроса \n Открыть чат с оператором \n tg: https://t.me/$login_telegram\n После того как вы завершите диалог с оператором - оставьте отзыв с помощью кнопок действия";
        $send_data = [
            "text" => $text,
            "reply_markup" => $reply_markup
        ];
    }
    else {


        $method = 'sendMessage';
        $buttons = [
            [["text" => 'Главное меню']]
        ];
        $send_data = [
            'text' => "Неизвестная команда \n Введите /start для создания запроса",
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => $buttons
            ]
        ];
    }
}
function selectOrg($data,$con,$message){
    $query = "SELECT login_telegram  FROM ab1_table_org where `name` = '$message'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $login_telegram = $row['login_telegram'];
    }
    updOrg($data, $con, $message,$login_telegram);

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

function updOrg($data, $con, $message, $login_telegram)
{
    $id_chat = $data['chat']['id'];
    $query = "SELECT id_ab1_zayavka  FROM ab1_zayavka where id_chat = '$id_chat' ORDER BY id_ab1_zayavka DESC LIMIT 1;";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_zayavka = $row['id_ab1_zayavka'];

    }
    $query = "SELECT oblast, rayon  FROM ab1_table_org where login_telegram = '$login_telegram' limit 1";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $oblast = $row['oblast'];
        $rayon = $row['rayon'];

    }
    
    $query1 = "UPDATE ab1_zayavka SET id_org = '$message', id_obl = '$oblast', id_rayon = '$rayon', login_telegram = '$login_telegram' where id_ab1_zayavka = '$id_zayavka'";
    mysqli_query($con, $query1);
}



function updAnswer($data, $con, $message)
{

    $id_chat = $data['chat']['id'];
    $query = "SELECT id_ab1_zayavka  FROM ab1_zayavka where id_chat = '$id_chat' ORDER BY id_ab1_zayavka DESC LIMIT 1;";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_zayavka = $row['id_ab1_zayavka'];

    }
    $query1 = "UPDATE ab1_zayavka SET answer = '$message' where id_ab1_zayavka = '$id_zayavka'";
    mysqli_query($con, $query1);
}
function updStatus($data, $con, $message)
{

    $id_chat = $data['chat']['id'];
    $query = "SELECT id_ab1_zayavka  FROM ab1_zayavka where id_chat = '$id_chat' ORDER BY id_ab1_zayavka DESC LIMIT 1;";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_zayavka = $row['id_ab1_zayavka'];

    }
    $query1 = "UPDATE ab1_zayavka SET status = '$message' where id_ab1_zayavka = '$id_zayavka'";
    mysqli_query($con, $query1);
}
?>