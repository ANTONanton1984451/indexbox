<div class="col row justify-content-center" style="align-items: center" id="main-side">
    <?php foreach($this->blogs as $blog) { ?>

        <div class="card m-1" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $blog['title'] ?> </h5>
                <p class="card-text"><?= $blog['description'] ?> </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Просмотров : <?= $blog['views'] ?> </li>
                <li class="list-group-item">
                    <a href="article?id=<?=$blog['href'] ?>" class="card-link">Перейти к посту</a>
                </li>
            </ul>
        </div>

    <?php } ?>
</div>