<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventoFestivo
 *
 * @ORM\Table()
 * @ORM\Entity()
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
     * @var \Date
     *
     * @ORM\Column(name="fecha", type="date")
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
     * @ORM\OneToMany(targetEntity="Imagen", mappedBy="eventoFestivo")
     */
    private $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="eventoFestivo", cascade={"persist"})
     */
    private $productos;

    /**
     * @ORM\OneToMany(targetEntity="Participante", mappedBy="eventoFestivo", cascade={"persist"})
     */
    private $participantes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participantes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Date $fecha
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
     * @return \Date 
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

    /**
     * Add imagenes
     *
     * @param \StorageRoom\AppBundle\Entity\Imagen $imagenes
     * @return EventoFestivo
     */
    public function addImagene(\StorageRoom\AppBundle\Entity\Imagen $imagenes)
    {
        $this->imagenes[] = $imagenes;

        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \StorageRoom\AppBundle\Entity\Imagen $imagenes
     */
    public function removeImagene(\StorageRoom\AppBundle\Entity\Imagen $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Add productos
     *
     * @param \StorageRoom\AppBundle\Entity\Producto $productos
     * @return EventoFestivo
     */
    public function addProducto(\StorageRoom\AppBundle\Entity\Producto $productos)
    {
        $productos->setEventoFestivo($this);
        $this->productos->add($productos);

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \StorageRoom\AppBundle\Entity\Producto $productos
     */
    public function removeProducto(\StorageRoom\AppBundle\Entity\Producto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Add participantes
     *
     * @param \StorageRoom\AppBundle\Entity\Participante $participantes
     * @return EventoFestivo
     */
    public function addParticipante(\StorageRoom\AppBundle\Entity\Participante $participantes)
    {
        $this->participantes[] = $participantes;

        return $this;
    }

    /**
     * Remove participantes
     *
     * @param \StorageRoom\AppBundle\Entity\Participante $participantes
     */
    public function removeParticipante(\StorageRoom\AppBundle\Entity\Participante $participantes)
    {
        $this->participantes->removeElement($participantes);
    }

    /**
     * Get participantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParticipantes()
    {
        return $this->participantes;
    }
}
