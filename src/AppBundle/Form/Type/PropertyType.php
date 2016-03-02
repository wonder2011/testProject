<?php

namespace AppBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plants', IntegerType::class)
            ->add('surface',NumberType::class)
            ->add('price',MoneyType::class)
            ->add('roomNumbers',IntegerType::class)
            ->add('bathroomsNumber', IntegerType::class)
            ->add('conditions',TextareaType::class)
            ->add('available',CheckboxType::class)
            ->add('availableFrom', DateType::class)
            ->add('availableTo', DateType::class)
            ->add('description', TextareaType::class)
            ->add('address',EntityType::class, array('class'=>'AppBundle\Entity\Address'))
            ->add('type',EntityType::class, array('class'=>'AppBundle\Entity\Type'))
            ->add('categories',EntityType::class, array('class'=>'AppBundle\Entity\Category','multiple'=>true))
            ->add('services',EntityType::class,array('class'=>'AppBundle\Entity\Service','multiple'=>true))
            ->add('manager',EntityType::class,array('class'=>'AppBundle\Entity\Manager'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Property'
        ));
    }
}
