const formSendMoney = document.getElementById("form-send-money");
formSendMoney.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(formSendMoney);
    console.log('data: ', data)
    fetch("/learn-php/i-coin/service/methodsMoney/sendMoney.php", {
        method: "POST",
        body: data
    })
        .then((response) => response.json())
        .then((result) => {
            if (result.ok) {
                alert('Деньги успешно отправлены');
                location.reload();
            } else if (!result.ok) {
                alert('не прошло')
            }
        })
});


const formGetMoney = document.getElementById("form-get-money");
formGetMoney.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(formGetMoney);
    console.log('data: ', data)
    fetch("/learn-php/i-coin/service/methodsMoney/getMoney.php", {
        method: "POST",
        body: data
    })
        .then((response) => response.json())
        .then((result) => {
            if (result.ok) {
                alert('Деньги успешно получены');
                location.reload();
            } else if (!result.ok) {
                alert(`не прошло, ${result.message}`);
            }
        })
});