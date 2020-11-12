const modalMenuOpen = document.querySelector(".modal-menu-open-button");
const modalMenuClose = document.querySelector(".modal-menu-close-button");
const modalMenu = document.querySelector(".modal-menu");

modalMenuOpen.addEventListener("click", function (evt) {
  evt.preventDefault();

  modalMenu.classList.add("modal-show");
})

modalMenuClose.addEventListener("click", function (evt) {
  evt.preventDefault();

  modalMenu.classList.remove("modal-show");
})

window.addEventListener("keydown", function (evt) {
  if (evt.key === "Escape") {
    if (modalMenu.classList.contains("modal-show")) {
      evt.preventDefault();

      modalMenu.classList.remove("modal-show");
    }
  }
})
