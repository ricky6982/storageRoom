<?php

namespace StorageRoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Participante
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
     * @var boolean
     *
     * @ORM\Column(name="estadoPago", type="boolean")
     */
    private $estadoPago;

    /**
     * @ORM\ManyToOne(targetEntity="EventoFestivo", inversedBy="participantes")
     */
    private $eventoFestivo;

    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="eventosAsistidos")
     */
    private $persona;


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
     * Set estadoPago
     *
     * @param boolean $estadoPago
     * @return Participante
     */
    public function setEstadoPago($estadoPago)
    {
        $this->estadoPago = $estadoPago;

        return $this;
    }

    /**
     * Get estadoPago
     *
     * @return boolean 
     */
    public function getEstadoPago()
    {
        return $this->estadoPago;
    }

    /**
     * Set eventoFestivo
     *
     * @param \StorageRoom\AppBundle\Entity\EventoFestivo $eventoFestivo
     * @return Participante
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

    /**
     * Set persona
     *
     * @param \StorageRoom\AppBundle\Entity\Persona $persona
     * @return Participante
     */
    public function setPersona(\StorageRoom\AppBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \StorageRoom\AppBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }
}
