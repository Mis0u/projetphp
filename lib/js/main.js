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
window.addEventListener("scroll",headerScroll)
