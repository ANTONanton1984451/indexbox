<?php

use App\Router\Router;

Router::get('/article',[\App\Http\Controllers\ArticleController::class,'get']);

Router::get('/',[\App\Http\Controllers\MainPageController::class,'render']);

Router::get('/additional',[\App\Http\Controllers\MainPageController::class,'getAdditional']);

Router::get('/sort',[\App\Http\Controllers\MainPageController::class,'sort']);