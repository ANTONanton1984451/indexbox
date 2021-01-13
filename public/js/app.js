import {elementsId,classes} from "./modules/configs.js";
import {scrollHandler} from "./modules/croller.js";

let sideBar = document.getElementById(elementsId.sizeBar),
    burgerIcon = document.getElementById(elementsId.burger),
    closeIcon = document.getElementById(elementsId.closeIcon);

burgerIcon.addEventListener('click',function (Item){
    sideBar.classList.add(classes.fullSideBar);
    sideBar.classList.remove('col-lg-3','col-4');
    closeIcon.addEventListener('click',closeSideBar);
});

window.addEventListener('scroll',scrollHandler);

function closeSideBar(){
    sideBar.classList.remove(classes.fullSideBar);
    sideBar.classList.add('col-lg-3','col-4')
}
