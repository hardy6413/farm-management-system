const hamburgerMenu = document.getElementById("hamburger-icon");
const menu = document.getElementById("left-navi");
const main = document.querySelector("main");
const section = main.querySelector("section");
const list = menu.querySelector("ul");
const myFarmMenu = document.getElementById("upper-navi-menu");
const upperNaviContainer = main.querySelector("header");


hamburgerMenu.addEventListener('click',showLeftNavi);

myFarmMenu.addEventListener('click',showUpperNavi);


function showUpperNavi() {
    if (upperNaviContainer.style.display === 'block'){
        upperNaviContainer.style.display = 'none'
    }else {
        upperNaviContainer.style.display = 'block';
    }
}

function showLeftNavi() {
   if (main.contains(list)){
       main.removeChild(list)
       section.style.display = 'inherit';
       main.style.justifyContent = 'normal';
       upperNaviContainer.style.display = 'none'
   }else {
       main.appendChild(list);
       main.style.justifyContent = 'center';
       section.style.display = 'none';
   }
}