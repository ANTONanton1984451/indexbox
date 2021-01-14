<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php require 'head.tpl' ?>
    <title> <?= $this->title ?> </title>
</head>
<body>
<div class="container p-0 main">
    <?php require 'header.tpl' ?>
    <div class="d-flex flex-column justify-content-start align-items-center">
        <div class="col-12" style="text-align: center">
            <h3>
              <?= $this->title ?>
            </h3>
        </div>
        <div class="col-12 row justify-content-between" style="border-top: 1px solid rgba(144,144,144,0.3);border-bottom: 1px solid rgba(144,144,144,0.3);">
            <i><b>Дата добавления : </b></i>
            <span>
              <?= $this->timeToStr($this->time_create) ?>
            </span>
        </div>
        <div class="col-12">
            <?= $this->body ?>
        </div>
    </div>
</div>
</body>
</html>