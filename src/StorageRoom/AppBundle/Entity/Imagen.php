<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Imagen
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
     * @ORM\Column(name="ruta", type="string", length=255)
     */
    private $ruta;

    /**
     * @ORM\ManyToOne(targetEntity="EventoFestivo", inversedBy="imagenes")
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
     * Set ruta
     *
     * @param string $ruta
     * @return Imagen
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set eventoFestivo
     *
     * @param \StorageRoom\AppBundle\Entity\EventoFestivo $eventoFestivo
     * @return Imagen
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
