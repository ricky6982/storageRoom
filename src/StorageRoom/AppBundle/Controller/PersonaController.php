<?php

namespace StorageRoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use StorageRoom\AppBundle\Entity\Persona;
use StorageRoom\AppBundle\Form\Type\PersonaType;

class PersonaController extends Controller
{
    public function indexAction()
    {
        $persona = new Persona();
        $formPersona = $this->createForm(new PersonaType, $persona);

        $em = $this->getDoctrine()->getManager();
        $personas = $em->getRepository('AppBundle:Persona')->findAll();

        return $this->render('AppBundle:Persona:index.html.twig', array(
                'formPersona' => $formPersona->createView(),
                'personas' => $personas,
            ));
    }

    public function crearAction(Request $request)
    {
        $persona = new Persona();
        $formPersona = $this->createForm(new PersonaType, $persona);
        $formPersona->handleRequest($request);
        if ($formPersona->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->flush();

            $request->getSession()->getFlashBag()->add(
                    'success', 'Se Creo una Persona Correctamente'
                );
        }else{
            $request->getSession()->getFlashBag()->add(
                    'error', 'No se pudo Crear la Persona'
                );
        }

        return $this->redirect($this->generateUrl('persona_homepage'));
    }
}
