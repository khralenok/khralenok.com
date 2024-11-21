const accordion = document.querySelector(".component.accordion");
const accordionCards = document.querySelectorAll(".card.accordion");

const openAccordionCard = function (e) {
  if (!e.target.closest(".card.accordion")) return;
  accordionCards.forEach((card) => card.classList.remove("active"));
  e.target.closest(".card.accordion").classList.add("active");
};

accordion.addEventListener("click", (e) => openAccordionCard(e));
