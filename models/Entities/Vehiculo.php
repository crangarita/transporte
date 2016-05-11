<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Vehiculo
 *
 * @Table(name="vehiculo", indexes={@Index(name="combustible", columns={"combustible"}), @Index(name="marca", columns={"marca"}), @Index(name="tipo", columns={"tipo"}), @Index(name="radio", columns={"radio"})})
 * @Entity
 */
class Vehiculo
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
     * @Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = 'S';

    /**
     * @var string
     *
     * @Column(name="placa", type="string", length=10, nullable=false)
     */
    private $placa;

    /**
     * @var string
     *
     * @Column(name="nummotor", type="string", length=30, nullable=true)
     */
    private $nummotor;

    /**
     * @var string
     *
     * @Column(name="linea", type="string", length=50, nullable=true)
     */
    private $linea;

    /**
     * @var string
     *
     * @Column(name="numchasis", type="string", length=50, nullable=true)
     */
    private $numchasis;

    /**
     * @var string
     *
     * @Column(name="tipocarroceria", type="string", length=50, nullable=true)
     */
    private $tipocarroceria;

    /**
     * @var string
     *
     * @Column(name="cilindraje", type="string", length=10, nullable=true)
     */
    private $cilindraje;

    /**
     * @var integer
     *
     * @Column(name="capacidad", type="integer", nullable=true)
     */
    private $capacidad;

    /**
     * @var integer
     *
     * @Column(name="area", type="integer", nullable=true)
     */
    private $area;

    /**
     * @var string
     *
     * @Column(name="servicio", type="string", length=30, nullable=true)
     */
    private $servicio;

    /**
     * @var string
     *
     * @Column(name="modelo", type="string", length=4, nullable=true)
     */
    private $modelo;

    /**
     * @var integer
     *
     * @Column(name="numpuertas", type="integer", nullable=true)
     */
    private $numpuertas;

    /**
     * @var string
     *
     * @Column(name="numlicencia", type="string", length=20, nullable=true)
     */
    private $numlicencia;

    /**
     * @var string
     *
     * @Column(name="numtarjoperacional", type="string", length=30, nullable=true)
     */
    private $numtarjoperacional;

    /**
     * @var \DateTime
     *
     * @Column(name="fecvenctarjoperacional", type="date", nullable=true)
     */
    private $fecvenctarjoperacional;

    /**
     * @var \DateTime
     *
     * @Column(name="fecvenctecnomecanico", type="date", nullable=true)
     */
    private $fecvenctecnomecanico;

    /**
     * @var \DateTime
     *
     * @Column(name="feciniciolabores", type="date", nullable=true)
     */
    private $feciniciolabores;

    /**
     * @var string
     *
     * @Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var \Radioaccion
     *
     * @ManyToOne(targetEntity="Radioaccion")
     * @JoinColumns({
     *   @JoinColumn(name="radio", referencedColumnName="id")
     * })
     */
    private $radio;

    /**
     * @var \Marca
     *
     * @ManyToOne(targetEntity="Marca")
     * @JoinColumns({
     *   @JoinColumn(name="marca", referencedColumnName="id")
     * })
     */
    private $marca;

    /**
     * @var \Tipo
     *
     * @ManyToOne(targetEntity="Tipo")
     * @JoinColumns({
     *   @JoinColumn(name="tipo", referencedColumnName="id")
     * })
     */
    private $tipo;

    /**
     * @var \Tipocombustible
     *
     * @ManyToOne(targetEntity="Tipocombustible")
     * @JoinColumns({
     *   @JoinColumn(name="combustible", referencedColumnName="id")
     * })
     */
    private $combustible;


    /**
     * @OneToMany(targetEntity="Mantenimiento", mappedBy="vehiculo")
     */
    private $mantenimientos;

    /** 
     * Set id
     *
     * @param integer $id
     * @return Vehiculo
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
     * Set estado
     *
     * @param string $estado
     * @return Vehiculo
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
     * Set placa
     *
     * @param string $placa
     * @return Vehiculo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string 
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /** 
     * Set nummotor
     *
     * @param string $nummotor
     * @return Vehiculo
     */
    public function setNummotor($nummotor)
    {
        $this->nummotor = $nummotor;

        return $this;
    }

    /**
     * Get nummotor
     *
     * @return string 
     */
    public function getNummotor()
    {
        return $this->nummotor;
    }

    /** 
     * Set linea
     *
     * @param string $linea
     * @return Vehiculo
     */
    public function setLinea($linea)
    {
        $this->linea = $linea;

        return $this;
    }

    /**
     * Get linea
     *
     * @return string 
     */
    public function getLinea()
    {
        return $this->linea;
    }

    /** 
     * Set numchasis
     *
     * @param string $numchasis
     * @return Vehiculo
     */
    public function setNumchasis($numchasis)
    {
        $this->numchasis = $numchasis;

        return $this;
    }

    /**
     * Get numchasis
     *
     * @return string 
     */
    public function getNumchasis()
    {
        return $this->numchasis;
    }

    /** 
     * Set tipocarroceria
     *
     * @param string $tipocarroceria
     * @return Vehiculo
     */
    public function setTipocarroceria($tipocarroceria)
    {
        $this->tipocarroceria = $tipocarroceria;

        return $this;
    }

    /**
     * Get tipocarroceria
     *
     * @return string 
     */
    public function getTipocarroceria()
    {
        return $this->tipocarroceria;
    }

    /** 
     * Set cilindraje
     *
     * @param string $cilindraje
     * @return Vehiculo
     */
    public function setCilindraje($cilindraje)
    {
        $this->cilindraje = $cilindraje;

        return $this;
    }

    /**
     * Get cilindraje
     *
     * @return string 
     */
    public function getCilindraje()
    {
        return $this->cilindraje;
    }

    /** 
     * Set capacidad
     *
     * @param integer $capacidad
     * @return Vehiculo
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return integer 
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /** 
     * Set area
     *
     * @param integer $area
     * @return Vehiculo
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /** 
     * Set servicio
     *
     * @param string $servicio
     * @return Vehiculo
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /** 
     * Set modelo
     *
     * @param string $modelo
     * @return Vehiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /** 
     * Set numpuertas
     *
     * @param integer $numpuertas
     * @return Vehiculo
     */
    public function setNumpuertas($numpuertas)
    {
        $this->numpuertas = $numpuertas;

        return $this;
    }

    /**
     * Get numpuertas
     *
     * @return integer 
     */
    public function getNumpuertas()
    {
        return $this->numpuertas;
    }

    /** 
     * Set numlicencia
     *
     * @param string $numlicencia
     * @return Vehiculo
     */
    public function setNumlicencia($numlicencia)
    {
        $this->numlicencia = $numlicencia;

        return $this;
    }

    /**
     * Get numlicencia
     *
     * @return string 
     */
    public function getNumlicencia()
    {
        return $this->numlicencia;
    }

    /** 
     * Set numtarjoperacional
     *
     * @param string $numtarjoperacional
     * @return Vehiculo
     */
    public function setNumtarjoperacional($numtarjoperacional)
    {
        $this->numtarjoperacional = $numtarjoperacional;

        return $this;
    }

    /**
     * Get numtarjoperacional
     *
     * @return string 
     */
    public function getNumtarjoperacional()
    {
        return $this->numtarjoperacional;
    }

    /** 
     * Set fecvenctarjoperacional
     *
     * @param \DateTime $fecvenctarjoperacional
     * @return Vehiculo
     */
    public function setFecvenctarjoperacional($fecvenctarjoperacional)
    {
        $this->fecvenctarjoperacional = $fecvenctarjoperacional;

        return $this;
    }

    /**
     * Get fecvenctarjoperacional
     *
     * @return \DateTime 
     */
    public function getFecvenctarjoperacional()
    {
        return $this->fecvenctarjoperacional;
    }

    /** 
     * Set fecvenctecnomecanico
     *
     * @param \DateTime $fecvenctecnomecanico
     * @return Vehiculo
     */
    public function setFecvenctecnomecanico($fecvenctecnomecanico)
    {
        $this->fecvenctecnomecanico = $fecvenctecnomecanico;

        return $this;
    }

    /**
     * Get fecvenctecnomecanico
     *
     * @return \DateTime 
     */
    public function getFecvenctecnomecanico()
    {
        return $this->fecvenctecnomecanico;
    }

    /** 
     * Set feciniciolabores
     *
     * @param \DateTime $feciniciolabores
     * @return Vehiculo
     */
    public function setFeciniciolabores($feciniciolabores)
    {
        $this->feciniciolabores = $feciniciolabores;

        return $this;
    }

    /**
     * Get feciniciolabores
     *
     * @return \DateTime 
     */
    public function getFeciniciolabores()
    {
        return $this->feciniciolabores;
    }

    /** 
     * Set observacion
     *
     * @param string $observacion
     * @return Vehiculo
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /** 
     * Set radio
     *
     * @param \Radioaccion $radio
     * @return Vehiculo
     */
    public function setRadio($radio = null)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return \Radioaccion 
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /** 
     * Set marca
     *
     * @param \Marca $marca
     * @return Vehiculo
     */
    public function setMarca($marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \Marca 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /** 
     * Set tipo
     *
     * @param \Tipo $tipo
     * @return Vehiculo
     */
    public function setTipo($tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Tipo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /** 
     * Set combustible
     *
     * @param \Tipocombustible $combustible
     * @return Vehiculo
     */
    public function setCombustible($combustible = null)
    {
        $this->combustible = $combustible;

        return $this;
    }

    /**
     * Get combustible
     *
     * @return \Tipocombustible 
     */
    public function getCombustible()
    {
        return $this->combustible;
    }


    public function getMantenimientos()
    {
        return $this->mantenimientos;
    }
}
