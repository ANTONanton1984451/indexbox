<?php


namespace App\Interfaces;


interface FormatterInterFace
{

    /**
     * FormatterInterFace constructor.
     * @param array|string|\stdClass $data
     * @param int $code
     */
    public function __construct($data,int $code);

    public function showResponse() : void;
}