<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Persona
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
     * @ORM\Column(name="apellido", type="string", length=30)
     */
    private $apellido;

    /**
     * @ORM\OneToMany(targetEntity="EventoFestivo", mappedBy="persona")
     */
    private $eventosAsistidos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eventosAsistidos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getApellido() . ", " . $this->getNombre();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Add eventosAsistidos
     *
     * @param \StorageRoom\AppBundle\Entity\EventoFestivo $eventosAsistidos
     * @return Persona
     */
    public function addEventosAsistido(\StorageRoom\AppBundle\Entity\EventoFestivo $eventosAsistidos)
    {
        $this->eventosAsistidos[] = $eventosAsistidos;

        return $this;
    }

    /**
     * Remove eventosAsistidos
     *
     * @param \StorageRoom\AppBundle\Entity\EventoFestivo $eventosAsistidos
     */
    public function removeEventosAsistido(\StorageRoom\AppBundle\Entity\EventoFestivo $eventosAsistidos)
    {
        $this->eventosAsistidos->removeElement($eventosAsistidos);
    }

    /**
     * Get eventosAsistidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventosAsistidos()
    {
        return $this->eventosAsistidos;
    }
}
