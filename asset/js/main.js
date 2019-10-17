function headerScroll(){
    if (document.body.className != "admin"){
        const nav = document.querySelector("nav");
        const logo= document.querySelector(".logo");
            if(window.scrollY > nav.offsetHeight){
                logo.style.position = "absolute";
                logo.style.top = "-100px";
                nav.classList.add("effect")
            }
            else{
                logo.style.position="relative";
                logo.style.top="0";
                nav.classList.remove("effect");
            }
    }

}

function adminSideBar(){
    if (document.body.className == "admin"){
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

}

function hamburgerResponsive(){
    if (document.body.className != "admin" && document.body.classname != "adminLog"){
        const hamb = document.getElementById("header_icon");
         const lines = document.querySelectorAll(".line")
         const ul = document.querySelector("header nav ul")
            hamb.addEventListener("click", () => {
                lines.forEach(line =>{
                    line.classList.toggle("actif")
                })
                ul.classList.toggle("actif")
                })
    }
    
    
}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

  function scaleBg(){
    if (document.body.className == "accueil"){
        let bgHomepage = document.querySelector(".accueil .bg");
        let textBg = document.querySelector(".accueil .bg p");
        bgHomepage.style.transform = "scale(1.2)";
        textBg.style.opacity = 1;
    }
  }


window.addEventListener("scroll",headerScroll);

adminSideBar();
scaleBg()
hamburgerResponsive()
