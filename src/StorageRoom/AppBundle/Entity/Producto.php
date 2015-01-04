<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Producto
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="EventoFestivo", inversedBy="productos")
     */
    private $eventoFestivo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * Set precio
     *
     * @param string $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set eventoFestivo
     *
     * @param \StorageRoom\AppBundle\Entity\EventoFestivo $eventoFestivo
     * @return Producto
     */
    public function setEventoFestivo(\StorageRoom\AppBundle\Entity\EventoFestivo $eventoFestivo = null)
    {
        $this->eventoFestivo = $eventoFestivo;

        return $this;
    }

    /**
     * Get eventoFestivo
     *
     * @return \StorageRoom\AppBundle\Entity\EventoFestivo 
     */
    public function getEventoFestivo()
    {
        return $this->eventoFestivo;
    }
}
