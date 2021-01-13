<?php


namespace App\Interfaces;




interface TemplateEngine
{
    /**
     * TemplateEngine constructor.
     * @param string $templatePath
     */
    public function setTemplatePath(string $templatePath);
    public function render(array $data);
}