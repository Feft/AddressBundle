<?php

namespace Feft\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Region Form Type Class
 */
class RegionType extends AbstractType
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
            ->add('country');
    }

    /**
     * @inheritdoc
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Feft\AddressBundle\Entity\Region'
        ));
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getName()
    {
        return 'feft_addressbundle_region';
    }
}
