<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Mantenimiento
 *
 * @Table(name="mantenimiento", indexes={@Index(name="vehiculo", columns={"vehiculo"}), @Index(name="frecuencia", columns={"frecuencia"})})
 * @Entity
 */
class Mantenimiento
{

//function __construct() {}

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
     * @Column(name="observaciones", type="string", length=1000, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @Column(name="conductor", type="string", length=15, nullable=true)
     */
    private $conductor;

    /**
     * @var string
     *
     * @Column(name="revisor", type="string", length=15, nullable=true)
     */
    private $revisor;

    /**
     * @var string
     *
     * @Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var \Frecuencia
     *
     * @ManyToOne(targetEntity="Frecuencia")
     * @JoinColumns({
     *   @JoinColumn(name="frecuencia", referencedColumnName="id")
     * })
     */
    private $frecuencia;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Itemfrecuencia", inversedBy="mantenimiento")
     * @JoinTable(name="itemmantenimientoprev",
     *   joinColumns={
     *     @JoinColumn(name="mantenimiento", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="itemfrecuencia", referencedColumnName="id")
     *   }
     * )
     */
    private $itemfrecuencia;


    /**
     * @var string
     *
     * @Column(name="falla", type="string", length=1000, nullable=true)
     */
    private $falla;


    /**
     * @var string
     *
     * @Column(name="reparacion", type="string", length=1000, nullable=true)
     */
    private $reparacion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemfrecuencia = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /** 
     * Set id
     *
     * @param integer $id
     * @return Mantenimiento
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
     * @return Mantenimiento
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
     * Set observaciones
     *
     * @param string $observaciones
     * @return Mantenimiento
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /** 
     * Set conductor
     *
     * @param string $conductor
     * @return Mantenimiento
     */
    public function setConductor($conductor)
    {
        $this->conductor = $conductor;

        return $this;
    }

    /**
     * Get conductor
     *
     * @return string 
     */
    public function getConductor()
    {
        return $this->conductor;
    }

    /** 
     * Set revisor
     *
     * @param string $revisor
     * @return Mantenimiento
     */
    public function setRevisor($revisor)
    {
        $this->revisor = $revisor;

        return $this;
    }

    /**
     * Get revisor
     *
     * @return string 
     */
    public function getRevisor()
    {
        return $this->revisor;
    }

    /** 
     * Set tipo
     *
     * @param string $tipo
     * @return Mantenimiento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /** 
     * Set frecuencia
     *
     * @param \Frecuencia $frecuencia
     * @return Mantenimiento
     */
    public function setFrecuencia($frecuencia = null)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return \Frecuencia 
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /** 
     * Set vehiculo
     *
     * @param \Vehiculo $vehiculo
     * @return Mantenimiento
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
     * Add itemfrecuencia
     *
     * @param \Itemfrecuencia $itemfrecuencia
     * @return Mantenimiento
     */
    public function addItemfrecuencium($itemfrecuencia)
    {
        $this->itemfrecuencia[] = $itemfrecuencia;

        return $this;
    }

    /**
     * Remove itemfrecuencia
     *
     * @param \Itemfrecuencia $itemfrecuencia
     */
    public function removeItemfrecuencium($itemfrecuencia)
    {
        $this->itemfrecuencia->removeElement($itemfrecuencia);
    }

    /**
     * Get itemfrecuencia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItemfrecuencia()
    {
        return $this->itemfrecuencia;
    }

    /** 
     * Set falla
     *
     * @param string $falla
     * @return Mantenimiento
     */
    public function setFalla($falla)
    {
        $this->falla = $falla;

        return $this;
    }

    /**
     * Get falla
     *
     * @return string 
     */
    public function getFalla()
    {
        return $this->falla;
    }

    /** 
     * Set reparacion
     *
     * @param string $reparacion
     * @return Mantenimiento
     */
    public function setReparacion($reparacion)
    {
        $this->reparacion = $reparacion;

        return $this;
    }

    /**
     * Get reparacion
     *
     * @return string 
     */
    public function getReparacion()
    {
        return $this->reparacion;
    }
}
