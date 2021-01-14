import {addTemplate,mainSide} from "./templator.js";
import {request} from "./requestClient.js";

export function search(searchValue){
    request.send('/search?name='+searchValue)
        .then(response => response.json())
        .then(function (Response){
        let arr = [];
        arr[0] = Response;
        mainSide.innerHTML = ''
        addTemplate(arr);
    })
}