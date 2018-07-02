<?php

namespace JJ\ImageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


use JJ\ImageBundle\Form\ImageConcertType;
use JJ\ImageBundle\Form\TitreType;

class DisqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', TextType::class)
        ->add('annee', DateType::class)
        ->add('image', ImageConcertType::class)
        ->add('titres', CollectionType::class, array(
          'entry_type' => TitreType::class,
          'allow_add' => true,
          'allow_delete' => true
        ))
        ->add('save', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JJ\ImageBundle\Entity\Disque'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jj_imagebundle_disque';
    }


}
