<?php

namespace JJ\ImageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageConcertType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->remove('categorie')
            ->remove('content')
            ->remove('save');
  }

  public function getParent()
  {
    return ImageType::class;
  }
}
