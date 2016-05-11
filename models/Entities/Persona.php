<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Persona
 *
 * @Table(name="persona")
 * @Entity
 */
class Persona
{

function __construct() {}

    /**
     * @var string
     *
     * @Column(name="documento", type="string", length=15, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $documento;

    /**
     * @var string
     *
     * @Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;


    /** 
     * Set documento
     *
     * @param string $documento
     * @return Persona
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /** 
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /** 
     * Set telefono
     *
     * @param string $telefono
     * @return Persona
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /** 
     * Set direccion
     *
     * @param string $direccion
     * @return Persona
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}
