<?php

$router = require_once '../App/bootstrap.php';

(new \App\Kernel($router))->handle();