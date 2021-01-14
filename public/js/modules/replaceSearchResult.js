import {addTemplate,mainSide} from "./templator.js";
import {sortParams} from "./sortParams.js";
import {request} from "./requestClient.js";

sortParams.getSortQuery = function (){
    return "type="+this.currentSort.type+"&desc="+this.currentSort.desc+"&size="+this.currentSort.pageSize;
}

export function replaceSearchResult(){
    request.send('/sort?'+sortParams.getSortQuery())
        .then(response => response.json())
        .then(function (response){
            mainSide.innerHTML = ''
            addTemplate(response);
            sortParams.currentSort.offset = response.count;
        })
}