<?php


namespace App\Template;


use App\Exceptions\TemplateNotFoundException;
use App\Interfaces\TemplateBridge;
use App\Interfaces\TemplateEngine;

class CustomBridge implements TemplateBridge
{

    private const TMPL_EXT = '.tpl';

    private TemplateEngine $engine;
    private array $data;

    public function __construct(TemplateEngine $engine, string $viewName, array $data = [])
    {
        $templatePath = $this->formViewPath($viewName);
        if(!@fopen($templatePath,'r')) {
            throw new TemplateNotFoundException("Template $viewName not found");
        }

        $engine->setTemplatePath($templatePath);
        $this->engine = $engine;
        $this->data = $data;
    }

    public function showView()
    {
        $this->engine->render($this->data);
    }

    private function formViewPath(string $viewName) : string
    {
        $templateBasePath = config('templates.base_path');
        return $templateBasePath.str_replace('.','/',$viewName).self::TMPL_EXT;
    }
}