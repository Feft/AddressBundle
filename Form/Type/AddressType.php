<?php

namespace Feft\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 *  Address Form Type Class - build form
 */
class AddressType extends AbstractType
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
            ->add('country')
            ->add('region')
            ->add('postalCode')
            ->add('locality')
            ->add('street')
            ->add('number');
    }

    /**
     * @inheritdoc
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Feft\AddressBundle\Entity\Address'
        ));
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getName()
    {
        return 'feft_addressbundle_address';
    }
}
