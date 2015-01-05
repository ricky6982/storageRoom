<?php 

namespace StorageRoom\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecaudacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('evento', 'hidden', array(
                    'data' => $options['idEvento']
                ))
            ->add('recaudacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'idEvento' => 0,
        ));
    }

    public function getName()
    {
        return 'recaudacion';
    }
}

