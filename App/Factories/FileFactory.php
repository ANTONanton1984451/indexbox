<?php


namespace App\Factories;


use Helpers\FileWorker;

class FileFactory
{
    public static function getWorker()
    {
        return new FileWorker();
    }
}