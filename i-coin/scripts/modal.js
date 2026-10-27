const btnRegistration = document.getElementById("registration-btn");
const btnLogin = document.getElementById("login-btn");
const modal = document.getElementById("modal");
const btnModalClose = document.querySelector(".modal-content-close");

const btnCreateUsualAcc = document.getElementById("rerular-btn");
const btnCreateSavingsAcc = document.getElementById("savings-btn");
const wrapperBtnsCreateAcc = document.querySelector(".modal-content .type-btn");
const formCreateAcc = document.querySelector(".modal-content-form");
const formLogin = document.getElementById("login-form");
const btnCreateAcc = document.getElementById("create-btn");
const loginFormMessage = document.getElementById("login-form-message");

function hideModal() {
  modal.classList.remove("active");
  wrapperBtnsCreateAcc.classList.add("active");
  formCreateAcc.classList.remove("active");
  formLogin.classList.remove("active");
  btnCreateAcc.value = "usual";
}

btnRegistration?.addEventListener("click", () => {
  modal.classList.add("active");
  formLogin.classList.remove("active");
  wrapperBtnsCreateAcc.classList.add("active");
  formCreateAcc.classList.remove("active");
});

btnLogin?.addEventListener("click", () => {
  modal.classList.add("active");
  wrapperBtnsCreateAcc.classList.remove("active");
  formCreateAcc.classList.remove("active");
  formLogin.classList.add("active");
});

btnModalClose.addEventListener("click", () => hideModal());

modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    hideModal();
  }
});

function hideBtnsCreateAcc() {
  wrapperBtnsCreateAcc.classList.remove("active");
}

wrapperBtnsCreateAcc.addEventListener("click", (e) => {
  hideBtnsCreateAcc();
  formCreateAcc.classList.add("active");
  if (e.target === btnCreateSavingsAcc) {
    btnCreateAcc.value = "savings";
  }
});

formLogin.addEventListener("submit", (e) => {
  e.preventDefault();
  const data = new FormData(formLogin);

  fetch("service/sign-in.php", {
    method: "POST",
    body: data
  })
  .then((response) => response.json())
  .then((result) => {
    if (result.ok) {
      loginFormMessage.textContent = `${result.message}`;
      setTimeout(() => {
        location.reload();
      }, 1000);
      return;
    }
    loginFormMessage.textContent = `${result.message}`;
  })
});

formCreateAcc.addEventListener("submit", (e) => {
  e.preventDefault();
  const data = new FormData(formCreateAcc, e.submitter); //просто так кнопка не передастся в данные, отправляем её вторым элементом

  fetch("service/create-acc.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      if (result.ok) {
        location.reload();
        return;
      }
      document.getElementById('message').innerHTML = `<h2>${result.message}</h2>`;
    })
    .catch((error) => {
      console.error(error);
      document.getElementById('message').innerHTML = `<h2>${result.message}</h2>`;
    })
    .finally(() => {
      hideModal();
    })
});
