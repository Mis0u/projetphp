function headerScroll(){
    const nav = document.querySelector("nav");
    const logo= document.querySelector(".logo");
        if(window.scrollY > nav.offsetHeight){
            logo.style.position="absolute";
            logo.style.top="-100px";
        }
        else{
            logo.style.position="relative";
            logo.style.top="0";
        }
}

function bgFill(){
    const navHome = document.querySelector(".accueil header nav");
    if (window.scrollY > navHome.offsetHeight) {
        navHome.style.backgroundImage = "linear-gradient(-6deg, #FFFEFF 0%, #D7FFFE 100%)";
    } else {
        navHome.style.backgroundImage = "none";
    }
}


window.addEventListener("scroll",headerScroll)
window.addEventListener("scroll",bgFill)
