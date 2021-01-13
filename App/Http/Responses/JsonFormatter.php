<?php


namespace App\Http\Responses;


use App\Interfaces\FormatterInterFace;

class JsonFormatter implements FormatterInterFace
{
    /**
     * @var array|\stdClass
     */
    private $data;
    private int $code;

    public function __construct($data, int $code)
    {
        if(is_array($data) || $data instanceof \stdClass){
            $this->data = $data;
        }else{
            throw new \TypeError("Data must be array or stdClass");
        }

        $this->code = $code;
    }

    public function showResponse(): void
    {
        http_response_code($this->code);
        header('Content-type: application/json');
        echo json_encode($this->data);
    }
}