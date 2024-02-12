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
                            switch (item.message.text){
                                case "привет":
                                    answer = "Здравствуйте";
                                    break;
                                case "пока":
                                    answer = "Досвидания";
                                    break;
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


                        // body.innerHTML = JSON.stringify(last);
                    }
                })
            }, 2000);
        }
    });

})