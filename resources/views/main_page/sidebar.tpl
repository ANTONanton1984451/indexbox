<div class="col-lg-3 col-4 d-md-flex d-none flex-column align-items-center side-bar h-auto ml-2" id="side-bar">
    <div class="px-2 my-1">
        Поиск : <input type="text" placeholder="Введите название продукта">
        <button type="button" class="btn btn-outline-primary p-1">Найти</button>
    </div>
    <div class="px-2 my-1">
        <form action="">
            <p><b>Сортировать по :</b></p>
            <p><input name="dzen" type="radio" value="view"> Количество просмотров</p>
            <p><input name="dzen" type="radio" value="date"> Дата добавления</p>
        </form>
    </div>
    <div class="px-2 my-1">
        <label for="page-count">Выводить по</label>
        <select id="page-count">
            <option value="1" >1</option>
            <option value="3" >3</option>
            <option value="5" >5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
    </div>
    <img src="images/close.svg" class="close" id="close" style="width:24px;height: 24px">
</div>