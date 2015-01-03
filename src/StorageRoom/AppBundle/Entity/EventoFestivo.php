<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventoFestivo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EventoFestivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="gasto", type="decimal")
     */
    private $gasto;

    /**
     * @var string
     *
     * @ORM\Column(name="recaudacion", type="decimal")
     */
    private $recaudacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldoActual", type="integer")
     */
    private $saldoActual;


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
     * Set titulo
     *
     * @param string $titulo
     * @return EventoFestivo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return EventoFestivo
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
     * Set gasto
     *
     * @param string $gasto
     * @return EventoFestivo
     */
    public function setGasto($gasto)
    {
        $this->gasto = $gasto;

        return $this;
    }

    /**
     * Get gasto
     *
     * @return string 
     */
    public function getGasto()
    {
        return $this->gasto;
    }

    /**
     * Set recaudacion
     *
     * @param string $recaudacion
     * @return EventoFestivo
     */
    public function setRecaudacion($recaudacion)
    {
        $this->recaudacion = $recaudacion;

        return $this;
    }

    /**
     * Get recaudacion
     *
     * @return string 
     */
    public function getRecaudacion()
    {
        return $this->recaudacion;
    }

    /**
     * Set saldoActual
     *
     * @param integer $saldoActual
     * @return EventoFestivo
     */
    public function setSaldoActual($saldoActual)
    {
        $this->saldoActual = $saldoActual;

        return $this;
    }

    /**
     * Get saldoActual
     *
     * @return integer 
     */
    public function getSaldoActual()
    {
        return $this->saldoActual;
    }
}
