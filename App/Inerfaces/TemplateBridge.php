<?php


namespace App\Interfaces;


interface TemplateBridge
{
    public function __construct(TemplateEngine $engine,string $viewName,array $data = []);
    public function showView();
}