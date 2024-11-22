const modalWrapper = document.querySelector(".modal-wrapper");
const modalButtons = document.querySelectorAll(".modal-open");
const closeButton = document.querySelector(".modal-close");

const openModal = function () {
  modalWrapper.classList.add("active");
};

const closeModal = function () {
  modalWrapper.classList.remove("active");
};

modalButtons.forEach((btn) => btn.addEventListener("click", openModal));
closeButton.addEventListener("click", closeModal);
