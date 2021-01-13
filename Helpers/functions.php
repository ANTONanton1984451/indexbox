<?php

use App\Config\Config;

/**
 * @param string $configName
 * @return mixed|null
 */
function config(string $configName)
{
    $searchIndexes = explode('.',$configName);

    $configs = Config::get();

    $configValue = $configs[$searchIndexes[0]];

    for ($i=1;$i<count($searchIndexes);$i++){
         $configValue = $configValue[$searchIndexes[$i]];
    }

    return $configValue;
}

function view(string $viewName,array $data = []) : \App\Interfaces\TemplateBridge
{
    return new \App\Template\CustomBridge(new \App\Template\CustomEngine(),$viewName,$data);
}

/**
 * @param array|string $data
 * @param string $type
 * @param int $code
 * @return \App\Interfaces\FormatterInterFace
 */
function response($data,string $type,int $code = 200) : \App\Interfaces\FormatterInterFace
{
    $formatterClass = config('api_response.'.$type);

    if($formatterClass === null){
        throw new \App\Exceptions\UnsupportedFormatResponseException("Method $type not supported or not register in config.php");
    }

    return new $formatterClass($data,$code);
}