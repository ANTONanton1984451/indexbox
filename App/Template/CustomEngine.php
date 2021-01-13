<?php


namespace App\Template;



use App\Interfaces\TemplateEngine;

class CustomEngine implements TemplateEngine
{

    private array $renderData;

    private string $templatePath;


    public function __get($value)
    {
        if (isset($this->renderData[$value])){
            $neededValue = $this->renderData[$value];
        }else {
            $neededValue = '';
        }
        return $neededValue;
    }

    public function render(array $data)
    {
        $this->renderData = $data;
        ob_start();
        require_once $this->templatePath;
        echo ob_get_clean();
    }

    public function setTemplatePath(string $templatePath)
    {
        $this->templatePath = $templatePath;
    }
}