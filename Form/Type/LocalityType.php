<?php

namespace Feft\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Locality Form Type Class
 */
class LocalityType extends AbstractType
{
    /**
     * @inheritdoc
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('region');
    }

    /**
     * @inheritdoc
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Feft\AddressBundle\Entity\Locality'
        ));
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getName()
    {
        return 'feft_addressbundle_locality';
    }
}
