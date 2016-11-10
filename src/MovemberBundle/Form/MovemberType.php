<?php

namespace MovemberBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovemberType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('codepost')
            ->add('ville')
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MovemberBundle\Entity\Movember'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     *
     * @deprecated Deprecated since Symfony 2.8, to be removed in Symfony 3.0.
     *             Use the fully-qualified class name of the type instead.
     */
    public function getName()
    {
        return 'movember';

    }
}
