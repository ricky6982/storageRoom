<?php

namespace StorageRoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonaController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Persona:index.html.twig');
    }
}
