<?php

spl_autoload_register(function($className){
    require_once str_replace('\\','/',$className).'.php';
});