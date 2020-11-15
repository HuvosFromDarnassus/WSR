// ОТКРЫТИЕ/ЗАКРЫТИЕ МОДАЛЬНОГО ОКНА НОВОЙ НОВОСТИ

const newsAdminClose = document.querySelector(".modal-admin-close-button");
const newsAdminPopup = document.querySelector(".modal-news-admin");

const newsAdminForm = document.querySelector(".news-admin-form");
const newsTitle = document.querySelector(".news-admin-title-input");
const newsText = document.querySelector(".news-admin-text-area");

newsAdminClose.addEventListener("click", function (evt) {
  evt.preventDefault();

  newsAdminPopup.classList.remove("admin-show");
})

window.addEventListener("keydown", function (evt) {
  if (evt.key === "Escape") {
    if (newsAdminPopup.classList.contains("admin-show")) {
      evt.preventDefault();

      newsAdminPopup.classList.remove("admin-show");
      newsAdminPopup.classList.remove("modal-error");
    }
  }
})
