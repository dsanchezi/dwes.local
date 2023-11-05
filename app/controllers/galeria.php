<?php
use dwes\app\excepciones\AppException;
use dwes\app\excepciones\FileException;
use dwes\app\excepciones\QueryException;
use dwes\app\excepciones\CategoriaException;
use dwes\app\entity\Imagen;
use dwes\app\repository\CategoriasRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\utils\Utils;
use dwes\core\database\Connection;

$errores=[]; $titulo=""; $descripcion=""; $mensaje="";

try {
    $imagenesRepository = new ImagenesRepository();
    $imagenes = $imagenesRepository->findAll();
    
    $categoriasRepository = new CategoriasRepository();
    $categorias = $categoriasRepository->findAll();
    
}
catch ( QueryException $queryException ){
    $errores[] = $queryException->getMessage();
}
catch ( AppException $appException ){
    $errores[] = $appException->getMessage();
}
catch ( CategoriaException ) {
    $errores[] = "No se ha seleccionado una categoría válida";
}
catch ( Exception $error) {
    $errores[] = $error->getMessage();
}
   

require_once __DIR__ . '/../views/galeria.view.php';

