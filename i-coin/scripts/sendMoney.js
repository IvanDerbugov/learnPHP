const formSendMoney = document.getElementById("form-send-money");
formSendMoney.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(formSendMoney);
    console.log('data: ',data)
    fetch("/learn-php/i-coin/service/sendMoney.php", {
        method: "POST",
        body: data
    })
    .then((response) => response.json())
    .then((result) => {
        if (result.ok) {
            alert('Деньги успешно отправлены')
        } else if (result.false) {
            alert('не прошло')
        }
    })
});
