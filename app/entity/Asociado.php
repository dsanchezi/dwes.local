<?php
namespace dwes\app\entity;

use dwes\app\entity\IEntity;

class Asociado implements IEntity
{
    const RUTA_LOGOS_ASOCIADOS ='/public/images/asociados/';

    private $id;

    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $logo;
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */
    public function __construct(string $nombre="", string $logo="", string $descripcion="")
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $nombre
     * @return Asociado
     */
    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUrl () : string
    {
        return self::RUTA_LOGOS_ASOCIADOS.$this->getLogo();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'logo' => $this->getLogo(),
            'descripcion' => $this->getDescripcion()
        ];
    }
    
    public function __toString(): string
    {
        return $this->getDescripcion();
    }

}