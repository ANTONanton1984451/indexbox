import {elementsId,classes} from "./modules/configs.js";
import {scrollHandler} from "./modules/scroller.js";
import {sortParams} from "./modules/sortParams.js";
import {replaceSearchResult} from "./modules/replaceSearchResult.js";
import {search} from "./modules/search.js";

let sideBar = document.getElementById(elementsId.sideBar),
    burgerIcon = document.getElementById(elementsId.burger),
    closeIcon = document.getElementById(elementsId.closeIcon),
    dateSort = document.getElementById(elementsId.dateSort),
    viewSort = document.getElementById(elementsId.viewSort),
    searchInput = document.getElementById(elementsId.searchInput),
    submitSearch = document.getElementById(elementsId.searchSubmit),
    pageSize = document.getElementById(elementsId.pageSize);

burgerIcon.addEventListener('click',function (Item){
    sideBar.classList.add(classes.fullSideBar);
    sideBar.classList.remove('col-lg-3','col-4');
    closeIcon.addEventListener('click',closeSideBar);
});


window.addEventListener('scroll',scrollHandler);

function closeSideBar(){
    sideBar.classList.remove(classes.fullSideBar);
    sideBar.classList.add('col-lg-3','col-4');
}

dateSort.addEventListener('click',function (Event){
    sortParams.currentSort.type = Event.target.value;
    sortParams.currentSort.offset = 0;
    replaceSearchResult();
});

viewSort.addEventListener('click',function (Event){
   sortParams.currentSort.type = Event.target.value;
   sortParams.currentSort.offset = 0;
   replaceSearchResult();
});

submitSearch.addEventListener('click',function (){
    search(searchInput.value);
});

pageSize.addEventListener('change',function (Event){
    sortParams.currentSort.pageSize = Event.target.value;
    sortParams.currentSort.offset = 0;
    replaceSearchResult();
});
