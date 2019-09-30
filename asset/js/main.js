function headerScroll(){
    const nav = document.querySelector("nav");
    const logo= document.querySelector(".logo");
        if(window.scrollY > nav.offsetHeight){
            logo.style.position = "absolute";
            logo.style.top = "-100px";
        }
        else{
            logo.style.position="relative";
            logo.style.top="0";
        }
}

function bgFill(){
    const navHome = document.querySelector(".accueil nav");
    if (window.scrollY > navHome.offsetHeight) {
        navHome.classList.add("effect");
    } 
    else{
        navHome.classList.remove("effect");
    }
}

function adminSideBar(){
    const hamb= document.querySelector(".hamb")
    const lines= document.querySelectorAll(".line")
    const ul = document.querySelector("ul")
    const content = document.querySelector(".container")
    hamb.addEventListener("click", () => {
    lines.forEach(line =>{
        line.classList.toggle("actif")
    })
    ul.classList.toggle("actif")
    content.classList.toggle("actif")
    })
}


window.addEventListener("scroll",headerScroll);
window.addEventListener("scroll",bgFill);
adminSideBar();
