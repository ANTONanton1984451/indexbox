<?php

/**
 * @param string $configName
 * @return mixed|null
 */
function config(string $configName)
{
    $searchIndexes = explode('.',$configName);

    $configs = \App\Config\Config::get();

    $configValue = $configs[$searchIndexes[0]];

    for ($i=1;$i<count($searchIndexes);$i++){
         $configValue = $configValue[$searchIndexes[$i]];
    }

    return $configValue;
}