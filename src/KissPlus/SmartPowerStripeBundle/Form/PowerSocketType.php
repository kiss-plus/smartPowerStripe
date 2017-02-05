<?php
namespace KissPlus\SmartPowerStripeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PowerSocketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name'
            )
            ->add(
                'turnedOn',
                ChoiceType::class,
                [
                    'choices' =>
                        [
                            '0' => false,
                            '1' => true
                        ]
                ]
            );
    }

    public function getBlockPrefix()
    {
        return '';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['csrf_protection'   => false]
        );
    }
}