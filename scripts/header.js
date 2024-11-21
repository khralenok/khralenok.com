const header = document.querySelector("header");
const obsTarget = document.getElementById("hero");

const obsCallback = function (entries) {
  const [entry] = entries;
  console.log(entry);
  if (!entry.isIntersecting) header.classList.add("sticky");
  else header.classList.remove("sticky");
};

const obsOptions = {
  root: null,
  threshold: [0, 0.2],
};

const observer = new IntersectionObserver(obsCallback, obsOptions);

observer.observe(obsTarget);

console.log(header);
