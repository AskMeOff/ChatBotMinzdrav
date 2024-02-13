$(document).ready(function () {
    let lastRes ;

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
                            if (item.message.text.toLowerCase().includes("привет") || item.message.text.toLowerCase().includes("/start")) {
                                answer = "Здравствуйте, " + (item.message["from"].first_name === "NaN" ? item.message["from"].last_name : item.message["from"].first_name + "\nВыберите тип запроса");
                                let buttons = [
                                    [{ text: "Жалоба" }, { text: "Предложение" }],
                                    [{ text: "Вопрос" }]
                                ];
                                replyMarkup = { keyboard: buttons, resize_keyboard: true };
                            }
                            else if (item.message.text.toLowerCase().includes("пока")){
                                    answer = "До свидания, " + (item.message["from"].first_name === "NaN" ? item.message["from"].last_name : item.message["from"].first_name);
                            }else if (item.message.text.toLowerCase().includes("жалоба") ||
                                item.message.text.toLowerCase().includes("предложение") ||
                                item.message.text.toLowerCase().includes("вопрос")){
                                answer = "Выберите область";
                                let buttons = [
                                    [{ text: "Брестская" }, { text: "Витебская" }],
                                    [{ text: "Гомельская" }], [{ text: "Гродненская" }],
                                    [{ text: "Могилевская" }], [{ text: "Минская" }]
                                ];
                                replyMarkup = { keyboard: buttons, resize_keyboard: true };
                            }
                            else {
                                answer = "ответ еще не существует";
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
            }, 2000);
        }
    });

})