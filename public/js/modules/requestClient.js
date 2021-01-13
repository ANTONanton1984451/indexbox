import {requestParams} from "./configs.js";

export const request = {
    send : function (url){
      return  fetch(url,requestParams)
    }
}