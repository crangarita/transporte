<?php


/* Date: 07/05/2016 11:10:03 */

namespace Entities;

/**
 * Itemrevision
 *
 * @Table(name="itemmantenimientoprev")
 * @Entity
 */
class Itemmantenimientoprev
{

function __construct() {}

    /**
     * @Id
     * @ManyToOne(targetEntity="Mantenimiento")
     * @JoinColumns({
     *   @JoinColumn(name="mantenimiento", referencedColumnName="id")
     * })
     */
    private $mantenimiento;

    /**
     * @Id
     * @ManyToOne(targetEntity="ItemFrecuencia")
     * @JoinColumns({
     *   @JoinColumn(name="itemfrecuencia", referencedColumnName="id")
     * })
     */
    private $itemFrecuencia;

    /**
     * @Column(name="estado", type="integer", nullable=true)
     */
    private $estado;


    public function setMantenimiento($mantenimiento)
    {
        $this->mantenimiento = $mantenimiento;

        return $this;
    }

    public function getMantenimiento()
    {
        return $this->mantenimiento;
    }

    public function setItemFrecuencia($itemFrecuencia)
    {
        $this->itemFrecuencia = $itemFrecuencia;

        return $this;
    }

    public function getItemFrecuencia()
    {
        return $this->itemFrecuencia;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

}
