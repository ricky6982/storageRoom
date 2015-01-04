<?php

namespace StorageRoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use StorageRoom\AppBundle\Entity\Persona;
use StorageRoom\AppBundle\Form\Type\PersonaType;

class PersonaController extends Controller
{
    public function indexAction()
    {
        $persona = new Persona();
        $formPersona = $this->createForm(new PersonaType, $persona);

        return $this->render('AppBundle:Persona:index.html.twig', array(
                'formPersona' => $formPersona->createView(),
            ));
    }


}
