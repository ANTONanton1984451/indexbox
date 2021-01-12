<?php

use App\Router\Router;

Router::get('/test',[\App\Http\Controllers\Test::class,'test']);