const userBtn = document.getElementById("user-btn");
const userModal = document.querySelector(".wrap-logged-in__user-modal");
const userModalClose = document.querySelector(".user-modal-close");

userBtn?.addEventListener("click", () => {
  userModal?.classList.toggle("active");
});

userModalClose?.addEventListener("click", () => {
  userModal?.classList.remove("active");
});
