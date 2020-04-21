<?php

namespace SwaggerBake\Lib;

use Exception;

class ExceptionHandler
{
    private $message = 'Unknown Error';
    private $code = 500;

    public function __construct(string $exceptionClass)
    {
        $this->message = empty($this->message) ? 'Unknown Error' : $this->message;
        $this->code = $this->code < 400 ? 500 : $this->code;
    }

    public function getCode() : int
    {
        return $this->code;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}