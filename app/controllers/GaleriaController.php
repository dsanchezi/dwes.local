<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\entity\Imagen;
use dwes\app\repository\CategoriasRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\utils\File;
use dwes\core\Response;
use dwes\app\excepciones\AppException;
use dwes\app\excepciones\FileException;
use dwes\app\excepciones\QueryException;
use dwes\app\excepciones\CategoriaException;
use Exception;
use dwes\core\helpers\FlashMessage;

class GaleriaController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        $errores = FlashMessage::get('errores', []);
        $mensaje = FlashMessage::get('mensaje');
        $descripcion = FlashMessage::get('descripcion');
        $categoriaSeleccionada = FlashMessage::get('categoriaSeleccionada');

        $titulo = "";
        $descripcion = "";

        try {
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $imagenes = $imagenesRepository->findAll();

            $categoriasRepository = App::getRepository(CategoriasRepository::class);
            $categorias = $categoriasRepository->findAll();
        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        } catch (CategoriaException) {
            FlashMessage::set('errores', ["No se ha seleccionado una categoría válida"]);
        }

        Response::renderView(
            'galeria',
            'layout',
            compact('imagenes', 'categorias', 'imagenesRepository', 'errores', 'titulo', 'descripcion', 'mensaje', 'categoriaSeleccionada')
        );
    }

    public function nueva()
    {
        try {
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            FlashMessage::set('descripcion', $descripcion);
            $categoria = trim(htmlspecialchars($_POST['categoria']));
            if (empty($categoria))
                throw new CategoriaException;
            FlashMessage::set('categoriaSeleccionada', $categoria);

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $imagenesRepository->guarda($imagenGaleria);

            $mensaje = "Se ha guardado una imagen: " . $imagenGaleria->getNombre();
            App::get('logger')->add($mensaje);
            FlashMessage::set('mensaje', $mensaje);

        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        } catch (CategoriaException) {
            FlashMessage::set('errores', ["No se ha seleccionado una categoría válida"]);
        }

        App::get('router')->redirect('galeria');
    }

    public function show($id)
    {
        try {
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $imagen = $imagenesRepository->find($id);
            //$imagen = App::getRepository(ImagenesRepository::class)->find($id);
        } catch (FileException $fileException) {
            FlashMessage::set('errores' , [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        } catch (CategoriaException) {
            FlashMessage::set('errores', ["No se ha seleccionado una categoría válida"]);
        }

        Response::renderView(
            'imagen-show',
            'layout',
            compact('imagen', 'imagenesRepository')
        );
    }
}
