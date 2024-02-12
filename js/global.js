$(document).ready(function () {
    let lastRes = [];

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
                            let answer;
                            if (item.message.text.includes("привет")) {
                                answer = "Здравствуйте";
                            }
                            else if (item.message.text.includes("пока")){
                                    answer = "Досвидания";
                            }else {
                                answer = "ответ еще не существует";
                            }

                            $.ajax({
                                url: 'sendMsg.php',
                                type: 'GET',
                                data: {idChat: item.message.chat.id, message: answer},
                            }).done(response => {
                                console.log(response);
                                lastRes = res;
                            })

                        })

                    }
                })
            }, 2000);
        }
    });

})