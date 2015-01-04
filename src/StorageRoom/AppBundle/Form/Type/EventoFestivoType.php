<?php 

namespace StorageRoom\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use StorageRoom\AppBundle\Form\Type\ProductoType;

class EventoFestivoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('fecha')
            ->add('recaudacion')
            ->add('participantes', 'entity', array(
                    'class' => 'AppBundle:Persona',
                    'expanded' => true,
                    'multiple' => true,
                ))
            ->add('productos', 'collection', array(
                    'allow_add' => true,
                    'prototype' => true,
                    'type' => new ProductoType(),
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StorageRoom\AppBundle\Entity\EventoFestivo',
        ));
    }

    public function getName()
    {
        return 'evento_festivo';
    }
}