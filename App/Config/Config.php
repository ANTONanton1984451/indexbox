<?php


namespace App\Config;


use Helpers\Traits\Singleton;

class Config
{
    use Singleton;

    private static $instance;

    public static function get() : array
    {
        if(self::$instance === null){
         $configPath = dirname(__DIR__,2).'/config.php';

         return self::$instance = require_once $configPath;
        }

        return self::$instance;
    }

}