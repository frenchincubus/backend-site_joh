<?php

namespace JJ\ImageBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use JJ\ImageBundle\Entity\Categorie;

class LoadCategory implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = array(
            'accueil',
            'artiste',
            'discographie',
            'equipe_live',
            'equipe_studio',
            'autour_du_groupe',
            'audio',
            'video',
            'presse',
            'photos',
            'concerts_passes',
            'concert_futurs',
            'boutique',
            'contact',
            'liens',
            'livre_dor',
            'tablatures'
        );

        foreach($names as $name) {
            $category = new Categorie();
            $category->setName($name);

            $manager->persist($category);
        }

        $manager->flush();
    }
}