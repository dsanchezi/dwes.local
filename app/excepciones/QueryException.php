<?php
namespace dwes\app\excepciones;

use dwes\app\excepciones\AppException;

class QueryException extends AppException
{
    public function __construct(string $message = "", int $code = 500)
    {
        parent::__construct($message, $code);
    }

}