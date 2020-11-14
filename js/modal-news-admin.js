const newsAdminOpen = document.querySelector(".add-news-button");
const newsAdminClose = document.querySelector(".modal-admin-close-button");
const newsAdminPopup = document.querySelector(".modal-news-admin");

const newsAdminForm = document.querySelector(".news-admin-form");
const newsTitle = document.querySelector(".news-admin-title-input");
const newsText = document.querySelector(".news-admin-text-area");

newsAdminOpen.addEventListener("click", function (evt) {
  evt.preventDefault();

  newsAdminPopup.classList.add("admin-show");
})

newsAdminClose.addEventListener("click", function (evt) {
  evt.preventDefault();

  newsAdminPopup.classList.remove("admin-show");
})

newsAdminForm.addEventListener("submit", function (evt) {
  if (!newsTitle.value || !newsText.value) {
    newsAdminPopup.classList.remove("modal-error");
    newsAdminPopup.offsetWidth = newsAdminPopup.offsetWidth;
    newsAdminPopup.classList.add("modal-error");
  } else {
    newsAdminPopup.classList.remove("admin-show");
  }
})

window.addEventListener("keydown", function (evt) {
  if (evt.key === "Escape") {
    if (newsAdminPopup.classList.contains("admin-show")) {
      evt.preventDefault();

      newsAdminPopup.classList.remove("admin-show");
      newsAdminPopup.classList.add("modal-error");
    }
  }
})
