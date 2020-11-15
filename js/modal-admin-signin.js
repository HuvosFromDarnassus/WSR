// ОТКРЫТИЕ/ЗАКРЫТИЕ МОДАЛЬНОГО ОКНА АВТОРИЗАЦИИ АДМИНА

const adminSigninOpen = document.querySelector(".add-news-button");
const adminSigninClose = document.querySelector(".admin-sighin-close-buttom");

const adminSigninPopup = document.querySelector(".news-admin-signin");

adminSigninOpen.addEventListener("click", function (evt) {
  evt.preventDefault();

  adminSigninPopup.classList.add("admin-show");
});

adminSigninClose.addEventListener("click", function (evt) {
  evt.preventDefault();

  adminSigninPopup.classList.remove("admin-show");
});

