import {elementsId} from "./configs.js";

export const mainSide = document.getElementById(elementsId.mainSide);

export function addTemplate(articleRows){
    for(let key in articleRows){
        mainSide.appendChild(formTemplate(articleRows[key].title,articleRows[key].description,articleRows[key].views,articleRows[key].href));
    }
}

function formTemplate(title,description,views,href){

    let card = document.createElement('div');
        card.className = 'card m-1';
        card.style = "width: 15rem";
        card.innerHTML = `<div class="card-body">
                <h5 class="card-title">${title} </h5>
                <p class="card-text">${description}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Просмотров : ${views} </li>
                <li class="list-group-item">
                    <a href="article?id=${href}" class="card-link">Перейти к посту</a>
                </li>
            </ul>`;

    return  card;
}