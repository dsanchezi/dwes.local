<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
use dwes\app\repository\CategoriasRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\utils\File;
use dwes\core\Response;
use dwes\app\excepciones\AppException;
use dwes\app\excepciones\FileException;
use dwes\app\excepciones\QueryException;
use dwes\app\excepciones\CategoriaException;
use Exception;

class GaleriaController
{
    /**
     * @throws QueryException
     */
    public function index()
    {

        $errores = [];
        $titulo = "";
        $descripcion = "";
        $mensaje = "";

        try {
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $imagenes = $imagenesRepository->findAll();

            $categoriasRepository = App::getRepository(CategoriasRepository::class);
            $categorias = $categoriasRepository->findAll();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (CategoriaException) {
            $errores[] = "No se ha seleccionado una categoría válida";
        } catch (Exception $error) {
            $errores[] = $error->getMessage();
        }

        Response::renderView(
            'galeria',
            'layout',
            compact('imagenes', 'categorias', 'imagenesRepository', 'errores', 'titulo', 'descripcion', 'mensaje')
        );
    }

    public function nueva()
    {

        $errores = [];
        $titulo = "";
        $descripcion = "";
        $mensaje = "";

        try {
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $categoria = trim(htmlspecialchars($_POST['categoria']));
            if (empty($categoria))
                throw new CategoriaException;

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $imagenesRepository->guarda($imagenGaleria);
            App::get('logger')->add("Se ha guardado una imagen: " . $imagenGaleria->getNombre());

            $mensaje = "Se ha guardado la imagen correctamente";
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (CategoriaException) {
            $errores[] = "No se ha seleccionado una categoría válida";
        }

        App::get('router')->redirect('galeria');
    }

    public function show ( $id )
    {
        $imagenesRepository = App::getRepository(ImagenesRepository::class);
        $imagen = $imagenesRepository->find($id);
        //$imagen = App::getRepository(ImagenesRepository::class)->find($id);

        Response::renderView(
            'imagen-show',
            'layout',
            compact ( 'imagen','imagenesRepository')
        );
    }
}
