const stickOnScrollMenu = function () {
  const header = document.querySelector("header");
  const obsTarget = document.getElementById("hero");

  const obsCallback = function (entries) {
    const [entry] = entries;
    if (!entry.isIntersecting) header.classList.add("sticky");
    else header.classList.remove("sticky");
  };

  const obsOptions = {
    root: null,
    threshold: [0, 0.2],
  };

  const observer = new IntersectionObserver(obsCallback, obsOptions);

  observer.observe(obsTarget);

  const navigation = document.querySelector("nav");
  const menuItems = navigation.querySelector("ul");
  const menuIcon = document.querySelector(".menu-icon");

  const showMenu = function () {
    navigation.classList.toggle("active");
    document.body.classList.toggle("no-scroll");
  };

  const hideMenu = function () {
    navigation.classList.remove("active");
    document.body.classList.remove("no-scroll");
  };

  menuIcon.addEventListener("click", showMenu);
  menuItems.addEventListener("click", hideMenu);
};

window.addEventListener("load", stickOnScrollMenu);
