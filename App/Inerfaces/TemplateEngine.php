<?php


namespace App\Interfaces;


use App\Exceptions\TemplateNotFoundException;

interface TemplateEngine
{
    /**
     * TemplateEngine constructor.
     * @param string $templatePath
     */
    public function setTemplatePath(string $templatePath);
    public function render(array $data);
}