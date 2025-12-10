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
let posting = [
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHiK4EzNGEkjQeqAVixdWMqIINeBzdLoT5nw&s",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSds80y3C6IPtHGw9uHTlKCrmCAZhaTlxloqg&s",
  "https://gsamahoro.my-board.org/Images/cropped_image.png",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSALmmbwqATT_c5K6wy0WKgUKrFCMaEPU9j9A&s",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK2DUk6lABjCUuHqe5TL9iVSeyjZG3bgp3FA&s",
  "https://gsamahoro.my-board.org/Images/IMG1.jpg",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDE3sXuFtGjmba3Fro2ziDKnbR9jf9Q2l-WA&s",
  "https://pbs.twimg.com/media/GMZNrhxW4AAVL7z.jpg",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGYAevOu2SiZvXiuSmVzmgUFiPZKc2MEQRoA&s",
  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqxmhMltzG7qsgb4vdkqAmEQYZsHmJorBKOw&s",
  "https://pbs.twimg.com/media/Fw-iZE-XsAEJFZo.jpg",
  "https://pbs.twimg.com/media/Fv6Yh24XwAE6DKh.jpg",
  "https://pbs.twimg.com/media/Fv7prLdWIAc_PJc.jpg",
  "https://pbs.twimg.com/media/F2rDTO6XsAAv3vf.jpg",
  "https://pbs.twimg.com/media/Fv6XRGmXsAAP_CP.jpg",
  "https://pbs.twimg.com/media/GdoWJNFX0AAN-dT.jpg",
];
setInterval(function(){
let random=Math.floor(Math.random()*posting.length);
let posteds=posting[random];
document.querySelector(".posted").src=posteds;
},800);
//for example if the user select the class where will they go 
const selection=document.querySelector(".selec").value;
if(selection.contains("primary")){
    fetch(index.php){
        
    }

}
