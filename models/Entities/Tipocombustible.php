<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Tipocombustible
 *
 * @Table(name="tipocombustible")
 * @Entity
 */
class Tipocombustible
{

function __construct() {}

    /**
     * @var string
     *
     * @Column(name="id", type="string", length=1, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=30, nullable=true)
     */
    private $descripcion;


    /** 
     * Set id
     *
     * @param string $id
     * @return Tipocombustible
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /** 
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tipocombustible
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
