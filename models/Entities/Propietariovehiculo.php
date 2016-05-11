<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Propietariovehiculo
 *
 * @Table(name="propietariovehiculo", indexes={@Index(name="persona", columns={"persona"}), @Index(name="vehiculo", columns={"vehiculo"})})
 * @Entity
 */
class Propietariovehiculo
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
     * @var \DateTime
     *
     * @Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var \Vehiculo
     *
     * @ManyToOne(targetEntity="Vehiculo")
     * @JoinColumns({
     *   @JoinColumn(name="vehiculo", referencedColumnName="id")
     * })
     */
    private $vehiculo;

    /**
     * @var \Persona
     *
     * @ManyToOne(targetEntity="Persona")
     * @JoinColumns({
     *   @JoinColumn(name="persona", referencedColumnName="documento")
     * })
     */
    private $persona;


    /** 
     * Set id
     *
     * @param integer $id
     * @return Propietariovehiculo
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Propietariovehiculo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /** 
     * Set estado
     *
     * @param string $estado
     * @return Propietariovehiculo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /** 
     * Set vehiculo
     *
     * @param \Vehiculo $vehiculo
     * @return Propietariovehiculo
     */
    public function setVehiculo($vehiculo = null)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \Vehiculo 
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /** 
     * Set persona
     *
     * @param \Persona $persona
     * @return Propietariovehiculo
     */
    public function setPersona($persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }
}
