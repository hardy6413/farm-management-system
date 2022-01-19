const hamburgerMenu = document.getElementById("hamburger-icon");
const menu = document.getElementById("left-navi");
const main = document.querySelector("main");
const section = main.querySelector("section");
const list = menu.querySelector("ul");
const myFarmMenu = document.getElementById("upper-navi-menu");
const upperNaviContainer = main.querySelector("header");

const headers = [...main.getElementsByTagName("header")];

hamburgerMenu.addEventListener('click',showLeftNavi);

myFarmMenu.addEventListener('click',showUpperNavi);


function showUpperNavi() {
    if (upperNaviContainer.style.display === 'none'){
        upperNaviContainer.style.display = 'flex'
    }else {
        upperNaviContainer.style.display = 'none';
    }
}

function showLeftNavi() {
    headers.forEach((header => {header.style.display = "none"}));
   if (main.contains(list)){
       headers.forEach((header => {header.style.display = "inherit"}));
       main.removeChild(list)
       section.style.display = 'flex';
       section.style.flexDirection = 'column';
       main.style.justifyContent = 'normal';
       upperNaviContainer.style.display = 'none'
   }else {

       main.appendChild(list);
       main.style.justifyContent = 'center';
       section.style.display = 'none';
   }
}