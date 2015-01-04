<?php

namespace StorageRoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use StorageRoom\AppBundle\Entity\EventoFestivo;
use StorageRoom\AppBundle\Form\Type\EventoFestivoType;

class EventoController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listadoEventos = $em->getRepository('AppBundle:EventoFestivo')->findAll();

        return $this->render('AppBundle:Evento:index.html.twig', array(
                'listadoEventos' => $listadoEventos,
            ));
    }

    public function crearAction()
    {
        $evento = new EventoFestivo();
        $form = $this->createForm(new EventoFestivoType(), $evento);

        return $this->render('AppBundle:Evento:crear.html.twig', array(
                'form' => $form->createView()
            ));
    }
}
