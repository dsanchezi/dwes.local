<?php
namespace dwes\app\excepciones;

use dwes\app\excepciones\AppException;

class NotFoundException extends AppException
{
    public function __construct(string $message = "", int $code = 404)
    {
        parent::__construct($message, $code);
    }

}