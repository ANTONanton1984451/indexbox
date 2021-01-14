
import {request} from "./requestClient.js";
import {sortParams} from "./sortParams.js";
import {addTemplate} from "./templator.js";

sortParams.getSortString = function (){
    return "type="+this.currentSort.type+"&desc="+this.currentSort.desc+"&size="+this.currentSort.pageSize+"&offset="+this.currentSort.offset;
}

export function scrollHandler(){
    if(window.scrollY+1 >= document.documentElement.scrollHeight-document.documentElement.clientHeight){
        window.removeEventListener('scroll',scrollHandler);
        request.send('/additional?'+sortParams.getSortString())
                .then(function (response) {
                    let newResponse = response.clone()

                    newResponse.json().then((values)=>sortParams.currentSort.offset += Object.keys(values).length);

                    return response.json()}
                    )
                .then(addTemplate)
                .then(()=>{
                    window.addEventListener('scroll',scrollHandler);
                });
    }
}
