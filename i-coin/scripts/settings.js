const displayBalance = document.getElementById("displayBalance");
displayBalance.addEventListener("change", (e) => {
  const data = new FormData(); //пустое
  data.append("displayBalance", e.target.checked ? "1" : "0");

  fetch("/learn-php/i-coin/service/settings.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      let message;
      if (result.ok) {
        message = "успешно изменено";
      } else {
        message = "не удоалось изменить";
      }
      const note = document.createElement("p");
      note.textContent = message;
      document.getElementById("wrapDisplayBalance").append(note);
    });
});
