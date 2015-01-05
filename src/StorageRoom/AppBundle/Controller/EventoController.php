<?php

namespace StorageRoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

use StorageRoom\AppBundle\Entity\EventoFestivo;
use StorageRoom\AppBundle\Entity\Saldo;
use StorageRoom\AppBundle\Entity\Participante;
use StorageRoom\AppBundle\Form\Type\EventoFestivoType;
use StorageRoom\AppBundle\Form\Type\RecaudacionType;

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
        $evento->setFecha(new \DateTime());
        $form = $this->createForm(new EventoFestivoType(), $evento);

        $em = $this->getDoctrine()->getManager();
        $personas = $em->getRepository('AppBundle:Persona')->findAll();

        return $this->render('AppBundle:Evento:crear.html.twig', array(
                'form' => $form->createView(),
                'personas' => $personas
            ));
    }

    public function guardarAction(Request $request)
    {
        $evento = new EventoFestivo();
        $form = $this->createForm(new EventoFestivoType(), $evento);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $participantes = $form->get('participantes')->getData();
            foreach ($participantes as $participante) {
                $p = new Participante();
                $p->setEventoFestivo($evento);
                $p->setPersona($participante);
                $p->setEstadoPago(false);
                $evento->addParticipante($p);
            }

            $saldoAnterior = $em->getRepository('AppBundle:Saldo')->findSaldoAnterior();
            if (!$saldoAnterior) {
                $saldo = new Saldo();
                $saldo
                    ->setMonto(0)
                    ->setFecha(new \DateTime('now'))
                ;
                $em->persist($saldo);
                $em->flush();
                $saldoAnterior = $saldo;
            }

            $evento->setSaldoActual($saldoAnterior->getId());

            $gasto = 0;
            foreach ($evento->getProductos() as $producto) {
                $gasto = $gasto + $producto->getPrecio();
            }
            $evento->setGasto($gasto);

            if ($evento->getGasto() <= $saldoAnterior->getMonto()) {
                $recaudacion = 0;
            }else{
                $recaudacion = $evento->getGasto() - $saldoAnterior->getMonto();
            }

            $evento->setRecaudacion($recaudacion);

            $em->persist($evento);
            $em->flush();

            return $this->redirect($this->generateUrl('evento_festivo_resumen', array('id' => $evento->getId())));
        }
        
        return $this->render('AppBundle:Evento:guardar.html.twig', array());
    }

    /**
     * @ParamConverter("evento", class="AppBundle:EventoFestivo")
     */
    public function resumenAction(EventoFestivo $evento)
    {
        $em = $this->getDoctrine()->getManager();
        $saldo = $em->getRepository('AppBundle:Saldo')->findSaldoAnterior();

        $formRecaudacion = $this->createForm(new RecaudacionType(), null, array('idEvento' => $evento->getId()));

        return $this->render('AppBundle:Evento:resumen.html.twig', array(
                'evento' => $evento,
                'saldo' => $saldo,
                'formRecaudacion' => $formRecaudacion->createView(),
            ));
    }

    public function confirmarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $formRecaudacion = $this->createForm(new RecaudacionType());
        $formRecaudacion->handleRequest($request);

        $evento = $em->getRepository('AppBundle:EventoFestivo')->find($formRecaudacion->get('evento')->getData());

        return $this->redirect($this->generateUrl('evento_festivo_imprimir', array('id' => $evento->getId())));
    }

    /**
     * @ParamConverter("evento", class="AppBundle:EventoFestivo")
     */
    public function imprimirAction(EventoFestivo $evento)
    {
        $em = $this->getDoctrine()->getManager();
        $saldo = $em->getRepository('AppBundle:Saldo')->findSaldoAnterior();
        return $this->render('AppBundle:Evento:imprimir.html.twig', array(
                'evento' => $evento,
                'saldo' => $saldo
            ));
    }
}
