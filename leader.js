

let typeText = document.getElementById("typeText");
let index = 0;
let text = "Welcome to leader board of attendency";
function typeTexts() {
  if (index < text.length) {
    typeText.innerHTML += text.charAt(index);

    index++;
    setTimeout(typeTexts, 400);
  }
}
typeTexts();
