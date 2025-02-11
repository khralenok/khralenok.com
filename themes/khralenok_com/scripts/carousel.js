const carouselComponent = function () {
  const componentReviews = document.querySelector(".component.reviews");
  const carouselCards = document.querySelectorAll(".carousel .card");
  const pagination = document.querySelector(".pagination");
  let cardsPerPage = 3;
  if (window.screen.width < 1280) {
    cardsPerPage = 2;
  }
  if (window.screen.width < 640) {
    cardsPerPage = 1;
  }
  let curPage = 0;
  const numOfPages = Math.ceil(carouselCards.length / cardsPerPage);
  const shiftValue =
    Number(
      window
        .getComputedStyle(document.querySelector(".carousel .card"))
        .width.slice(0, -2)
    ) +
    Number(
      window
        .getComputedStyle(document.querySelector(".carousel .card"))
        .marginRight.slice(0, -2)
    );

  const updateCarouselUI = function () {
    if (numOfPages === 1) {
      componentReviews.querySelectorAll(".arrow").forEach((arrow) => {
        arrow.style.display = "none";
        pagination.style.display = "none";
      });
    }

    let paginationMarkup = "";

    for (let i = 0; i < numOfPages; i++) {
      if (i < curPage + 1) {
        paginationMarkup += '<a role="presentation" class="dot active"></a>';
      } else {
        paginationMarkup += '<a role="presentation" class="dot"></a>';
      }
    }
    pagination.innerHTML = paginationMarkup;

    componentReviews
      .querySelectorAll(".arrow")
      .forEach((arrow) => arrow.classList.remove("inactive"));

    if (curPage === numOfPages - 1) {
      componentReviews.querySelector(".arrow.right").classList.add("inactive");
      return;
    }
    if (curPage <= 0) {
      componentReviews.querySelector(".arrow.left").classList.add("inactive");
      return;
    }
  };

  const slideCarousel = function (e) {
    const targetBtn = e.target;
    if (!targetBtn.classList.contains("arrow")) return;
    targetBtn.classList.contains("right") ? curPage++ : curPage--;
    carouselCards.forEach((card) => {
      card.style.transform = `TranslateX(${
        -shiftValue * cardsPerPage * curPage
      }px)`;
    });
    updateCarouselUI();
  };

  componentReviews.addEventListener("click", slideCarousel);

  updateCarouselUI();
};

window.addEventListener("load", carouselComponent);
