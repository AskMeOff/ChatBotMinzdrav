let currentPage = "main";
let lastRes ;
$(document).ready(function () {


    $.ajax({
        url: 'getAllMsgs.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            lastRes = data.result;
            setInterval(() => {
                $.ajax({
                    url: 'getAllMsgs.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        let res = data.result;
                        let filteredRes = res.filter(item => !lastRes.some(obj => obj.update_id === item.update_id));
                        console.log(filteredRes);

                        filteredRes.forEach(item => {
                            let replyMarkup;
                            let answer;
                            if (item.message.text === undefined){
                                currentPage = "create_request";
                                answer = "Выберите тип запроса";
                                let buttons = [
                                    [{text: "Жалоба"}, {text: "Предложение"}], [{text: "Вопрос"}], [{text: "Главное меню"}]
                                    , [{text: "Назад"}]
                                ];
                                replyMarkup = {keyboard: buttons, resize_keyboard: true};
                            }else {
                                if (item.message.text.toLowerCase().includes("привет") || item.message.text.toLowerCase().includes("/start")) {
                                    currentPage = "main";
                                    answer = "Здравствуйте, " + (item.message["from"].first_name === "NaN" ? item.message["from"].last_name : item.message["from"].first_name + "\nВыберите действие из меню");
                                    let buttons = [
                                        [{text: "Создать запрос", request_contact: true}, {text: "Помощь"}],
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("пока")) {
                                    currentPage = "exit";
                                    answer = "До свидания, " + (item.message["from"].first_name === "NaN" ? item.message["from"].last_name : item.message["from"].first_name);
                                } else if (item.message.text.toLowerCase().includes("создать запрос")) {
                                    currentPage = "create_request";
                                    answer = "Выберите тип запроса";
                                    let buttons = [
                                        [{text: "Жалоба"}, {text: "Предложение"}], [{text: "Вопрос"}], [{text: "Главное меню"}]
                                        , [{text: "Назад"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("помощь")) {
                                    currentPage = "help";
                                    answer = "Раздел помощи:";
                                    let buttons = [
                                        [{text: "Назад"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("жалоба") ||
                                    item.message.text.toLowerCase().includes("предложение") ||
                                    item.message.text.toLowerCase().includes("вопрос")) {
                                    currentPage = "select_area";
                                    answer = "Выберите область";
                                    let buttons = [
                                        [{text: "Брестская"}, {text: "Витебская"}],
                                        [{text: "Гомельская"}], [{text: "Гродненская"}],
                                        [{text: "Могилевская"}], [{text: "Минская"}]
                                        , [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("гомельская")) {
                                    currentPage = "homel_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("брестская")) {
                                    currentPage = "brest_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("витебская")) {
                                    currentPage = "vitebsk_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("гродненская")) {
                                    currentPage = "grodno_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("могилевская")) {
                                    currentPage = "mogilev_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("минская")) {
                                    currentPage = "minsk_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Район1"}, {text: "Район2"}],
                                        [{text: "Район3"}], [{text: "Район4"}],
                                        [{text: "Район5"}], [{text: "Район6"}],
                                        [{text: "Район7"}], [{text: "Район8"}],
                                        [{text: "Район9"}], [{text: "Район10"}],
                                        [{text: "Район11"}], [{text: "Район12"}],
                                        [{text: "Район13"}], [{text: "Район14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район1")) {
                                    currentPage = "rayon1_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район2")) {
                                    currentPage = "rayon2_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район3")) {
                                    currentPage = "rayon3_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район4")) {
                                    currentPage = "rayon4_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район5")) {
                                    currentPage = "rayon5_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район6")) {
                                    currentPage = "rayon6_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район7")) {
                                    currentPage = "rayon7_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район8")) {
                                    currentPage = "rayon8_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район9")) {
                                    currentPage = "rayon9_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район10")) {
                                    currentPage = "rayon10_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район11")) {
                                    currentPage = "rayon11_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район12")) {
                                    currentPage = "rayon12_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район13")) {
                                    currentPage = "rayon13_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("район14")) {
                                    currentPage = "rayon14_area";
                                    answer = "Выберите район";
                                    let buttons = [
                                        [{text: "Организация1"}, {text: "Организация2"}],
                                        [{text: "Организация3"}], [{text: "Организация4"}],
                                        [{text: "Организация5"}], [{text: "Организация6"}],
                                        [{text: "Организация7"}], [{text: "Организация8"}],
                                        [{text: "Организация9"}], [{text: "Организация10"}],
                                        [{text: "Организация11"}], [{text: "Организация12"}],
                                        [{text: "Организация13"}], [{text: "Организация14"}],
                                        [{text: "Назад"}], [{text: "Главное меню"}]
                                    ];
                                    replyMarkup = {keyboard: buttons, resize_keyboard: true};
                                } else if (item.message.text.toLowerCase().includes("назад")) {
                                    console.log(item.message.text + "asdasdasd");
                                    handleButtonClick(item, "Назад", res);
                                    return;
                                } else if (item.message.text.toLowerCase().includes("главное меню")) {
                                    handleButtonClick(item, "Главное меню", res);
                                    return;
                                } else {
                                    answer = "Неизвестная команда введите /start чтобы начать";
                                }
                            }

                            $.ajax({
                                url: 'sendMsg.php',
                                type: 'GET',
                                data: {idChat: item.message.chat.id, message: answer, reply_markup: JSON.stringify(replyMarkup)},
                                success:  (response) => {
                                console.log(response);
                                lastRes = res;
                            }
                            })

                        })

                    }
                })
            }, 3000);
        }
    });

})



function handleButtonClick(item, buttonText, res) {
    console.log (buttonText);
    if (buttonText === "Назад") {
        if (currentPage === "create_request") {
            currentPage = "main";
            let answer = "Выберите действие из меню";
            let buttons = [
                [{ text: "Создать запрос" }, { text: "Помощь" }]
            ];
            let replyMarkup = { keyboard: buttons, resize_keyboard: true };

            $.ajax({
                url: 'sendMsg.php',
                type: 'GET',
                data: { idChat: item.message.chat.id, message: answer, reply_markup: JSON.stringify(replyMarkup) },
                success: (response) => {
                    console.log(response);
                    lastRes = res;
                }
            })
        } else if (currentPage === "homel_area" || currentPage === "brest_area" || currentPage === "vitebsk_area" || currentPage === "grodno_area" || currentPage === "mogilev_area" || currentPage === "minsk_area") {
            currentPage = "select_area";
            let answer = "Выберите область";
            let buttons = [
                [{ text: "Брестская" }, { text: "Витебская" }],
                [{ text: "Гомельская" }], [{ text: "Гродненская" }],
                [{ text: "Могилевская" }], [{ text: "Минская" }],
                [{ text: "Назад" }], [{ text: "Главное меню" }]
            ];
            let replyMarkup = { keyboard: buttons, resize_keyboard: true };

            $.ajax({
                url: 'sendMsg.php',
                type: 'GET',
                data: { idChat: item.message.chat.id, message: answer, reply_markup: JSON.stringify(replyMarkup) },
                success: (response) => {
                    console.log(response);
                    lastRes = res;
                }
            })
        } else if (currentPage === "rayon1_area" || currentPage === "rayon2_area" || currentPage === "rayon3_area" || currentPage === "rayon4_area" || currentPage === "rayon5_area" || currentPage === "rayon6_area" || currentPage === "rayon7_area" || currentPage === "rayon8_area" || currentPage === "rayon9_area" || currentPage === "rayon10_area" || currentPage === "rayon11_area" || currentPage === "rayon12_area" || currentPage === "rayon13_area" || currentPage === "rayon14_area") {
            currentPage = "select_area";
            let answer = "Выберите область";
            let buttons = [
                [{ text: "Брестская" }, { text: "Витебская" }],
                [{ text: "Гомельская" }], [{ text: "Гродненская" }],
                [{ text: "Могилевская" }], [{ text: "Минская" }],
                [{ text: "Назад" }], [{ text: "Главное меню" }]
            ];
            let replyMarkup = { keyboard: buttons, resize_keyboard: true };

            $.ajax({
                url: 'sendMsg.php',
                type: 'GET',
                data: { idChat: item.message.chat.id, message: answer, reply_markup: JSON.stringify(replyMarkup) },
                success: (response) => {
                    console.log(response);
                    lastRes = res;
                }
            })
        }
    } else if (buttonText === "Главное меню") {
        currentPage = "main";
        let answer = "Здравствуйте, " + (item.message["from"].first_name === "NaN" ? item.message["from"].last_name : item.message["from"].first_name + "\nВыберите действие из меню");
        let buttons = [
            [{ text: "Создать запрос" }, { text: "Помощь" }]
        ];
        let replyMarkup = { keyboard: buttons, resize_keyboard: true };

        $.ajax({
            url: 'sendMsg.php',
            type: 'GET',
            data: { idChat: item.message.chat.id, message: answer, reply_markup: JSON.stringify(replyMarkup) },
            success: (response) => {
                console.log(response);
                lastRes = res;
            }
        })
    }
}