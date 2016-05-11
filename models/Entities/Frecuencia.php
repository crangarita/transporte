<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Frecuencia
 *
 * @Table(name="frecuencia")
 * @Entity
 */
class Frecuencia
{

function __construct() {}

    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="descripcion", type="string", length=50, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @Column(name="meses", type="integer", nullable=true)
     */
    private $meses;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Frecuencia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /** 
     * Set descripcion
     *
     * @param string $descripcion
     * @return Frecuencia
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

    /** 
     * Set meses
     *
     * @param integer $meses
     * @return Frecuencia
     */
    public function setMeses($meses)
    {
        $this->meses = $meses;

        return $this;
    }

    /**
     * Get meses
     *
     * @return integer 
     */
    public function getMeses()
    {
        return $this->meses;
    }
}
