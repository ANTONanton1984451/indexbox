
import {request} from "./requestClient.js";
import {sortParams} from "./sortParams.js";
import {addTemplate} from "./templator.js";

sortParams.getSortQuery = function (){
    return "type="+this.currentSort.type+"&desc="+this.currentSort.desc+"&size="+this.currentSort.pageSize;
}

export function scrollHandler(){
    if(window.scrollY+1 >= document.documentElement.scrollHeight-document.documentElement.clientHeight){
        window.removeEventListener('scroll',scrollHandler);
        request.send('/additional?'+sortParams.getSortQuery())
                .then(response => response.json())
                .then(addTemplate)
                .then(()=>{
                    window.addEventListener('scroll',scrollHandler);
                });
    }
}
