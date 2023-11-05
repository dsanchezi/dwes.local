<?php
use dwes\core\Request;
use dwes\core\Router;
use dwes\app\excepciones\NotFoundException;

try {
    require_once 'core/bootstrap.php';

    require Router::load('app/routes.php')->direct(Request::uri(), Request::method());

} catch (NotFoundException $notFoundException) {
    die($notFoundException->getMessage());
}
