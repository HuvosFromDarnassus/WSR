const modalLoginOpen = document.querySelector(".modal-login-open-button");
const modalLoginClose = document.querySelector(".modal-login-close-button");
const modalLogin = document.querySelector(".modal-login");

modalLoginOpen.addEventListener("click", function (evt) {
  evt.preventDefault();

  modalLogin.classList.add("modal-show");
});

modalLoginClose.addEventListener("click", function (evt) {
  evt.preventDefault();

  modalLogin.classList.remove("modal-show");
})
