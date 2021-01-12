<?php

namespace Helpers;

class FileWorker
{
    public  function getFileObserve(string $dirName) : array
    {
        return scandir($dirName);
    }

    public  function getFileContent(string $fileName) : array
    {
       return json_decode(file_get_contents($fileName),true);
    }
}