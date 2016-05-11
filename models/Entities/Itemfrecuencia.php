<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Itemfrecuencia
 *
 * @Table(name="itemfrecuencia", indexes={@Index(name="item", columns={"item"}), @Index(name="frecuencia", columns={"frecuencia"})})
 * @Entity
 */
class Itemfrecuencia
{



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
     * @Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado = 'A';

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
     * @var \Itemrevision
     *
     * @ManyToOne(targetEntity="Itemrevision")
     * @JoinColumns({
     *   @JoinColumn(name="item", referencedColumnName="id")
     * })
     */
    private $item;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Mantenimiento", mappedBy="itemfrecuencia")
     */
    private $mantenimiento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mantenimiento = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /** 
     * Set id
     *
     * @param integer $id
     * @return Itemfrecuencia
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
     * @return Itemfrecuencia
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
     * Set frecuencia
     *
     * @param \Frecuencia $frecuencia
     * @return Itemfrecuencia
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
     * Set item
     *
     * @param \Itemrevision $item
     * @return Itemfrecuencia
     */
    public function setItem($item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Itemrevision 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Add mantenimiento
     *
     * @param \Mantenimiento $mantenimiento
     * @return Itemfrecuencia
     */
    public function addMantenimiento($mantenimiento)
    {
        $this->mantenimiento[] = $mantenimiento;

        return $this;
    }

    /**
     * Remove mantenimiento
     *
     * @param \Mantenimiento $mantenimiento
     */
    public function removeMantenimiento($mantenimiento)
    {
        $this->mantenimiento->removeElement($mantenimiento);
    }

    /**
     * Get mantenimiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMantenimiento()
    {
        return $this->mantenimiento;
    }
}
