let increasing = 0;
const target = 20.4;
const step = 0.1;
const elements = document.querySelectorAll("#increasing");

let interval = setInterval(function () {
  increasing += step;

  if (increasing >= target) {
    increasing = target;
    clearInterval(interval);
  }

  elements.forEach((el) => {
    if (increasing > 10) {
      el.style.color = "rgb(111,112,234)";
    }
    el.innerText = increasing.toFixed(1) + "k";
  });
}, 50);
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1); 
};
