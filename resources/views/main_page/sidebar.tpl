<div class="col-lg-3 col-4 d-md-flex d-none flex-column align-items-center justify-content-center justify-content-md-start side-bar h-auto ml-2" id="side-bar">
    <div class="px-2 my-1">
        Поиск : <input type="text" id="search" placeholder="Введите название продукта">
        <button type="button" class="btn btn-outline-primary p-1" id="let-search">Найти</button>
    </div>
    <div class="px-2 my-1">
        <form action="">
            <p><b>Сортировать по :</b></p>
            <p><input name="dzen" selected type="radio" id="view" value="time_create"> Дата добавления</p>
            <p><input name="dzen" type="radio" id="date" value="views"> Количество просмотров</p>
        </form>
    </div>
    <div class="px-2 my-1">
        <label for="page-count">Выводить по</label>
        <select id="page-size">
            <option value="1" >1</option>
            <option value="3" >3</option>
            <option value="5" >5</option>
            <option selected value="10">10</option>
            <option value="20">20</option>
        </select>
    </div>
    <img src="images/close.svg" class="close d-md-none" id="close" style="width:24px;height: 24px">
</div>