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
