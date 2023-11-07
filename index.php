<?php
use dwes\core\Request;
use dwes\core\App;
use dwes\app\excepciones\NotFoundException;

try {
    require_once 'core/bootstrap.php';

    App::get('router')->direct(Request::uri(), Request::method());

} catch (NotFoundException $notFoundException) {
    die($notFoundException->getMessage());
}
