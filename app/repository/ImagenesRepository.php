<?php

namespace dwes\app\repository;

use dwes\app\entity\Imagen;
use dwes\app\entity\Categoria;
use dwes\app\repository\CategoriasRepository;
use dwes\core\database\QueryBuilder;
use dwes\core\App;

class ImagenesRepository extends QueryBuilder
{
    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'imagenes', string $classEntity = Imagen::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @return Categoria
     * @throws NotFoundException
     * @throws QueryException
     */
    public function getCategoria(Imagen $imagenGaleria): Categoria
    {
        $categoriaRepository = App::getRepository(CategoriasRepository::class);
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    public function guarda(Imagen $imagenGaleria)
    {
        $fnGuardaImagen = function () use ($imagenGaleria) { // Creamos una función anónima que se llama como callable
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = App::getRepository(CategoriasRepository::class);
            $categoriaRepository->nuevaImagen($categoria);
            $this->save($imagenGaleria);
        };
        $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
    }
}
