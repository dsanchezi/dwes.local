<?php

use dwes\core\App;
use dwes\core\Request;
use dwes\app\excepciones\AppException;
use dwes\app\excepciones\NotFoundException;

try {
    require_once 'core/bootstrap.php';

    App::get('router')->direct(Request::uri(), Request::method());

}
catch ( AppException $appException ) {
	$appException->handleError();
}
catch (Exception $exception)
{
    die($exception->getMessage());
}