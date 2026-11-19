function showToast(ok, message) {
  const old = document.querySelector(".toast");
  if (old) {
    old.remove();
  }

  const note = document.createElement("p");
  note.className = ok ? "toast toast_ok" : "toast toast_err";
  note.textContent = message;
  document.body.append(note);
  setTimeout(() => note.remove(), 2000);
}

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
      showToast(result.ok, message);
    });
});

const delegate = document.getElementById('delegate');
delegate.addEventListener("click", (e) =>{
  const tag = e.target.tagName;
  if (tag == 'INPUT') {
    fetch("/learn-php/i-coin/service/delegate.php", {
      method: "POST",
      body: new URLSearchParams({name: e.target.name})
    })
    .then((response) => response.json())
    .then((result) => {
      let message;
      if (result.ok) {
        message = "успешно изменено";
      } else {
        message = "не удоалось изменить";
      }
      showToast(result.ok, message);
    })
  }
})