<?php

namespace JJ\ImageBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JJ\ImageBundle\Entity\Image;
use JJ\ImageBundle\Entity\Concert;
use JJ\ImageBundle\Entity\Disque;
use JJ\ImageBundle\Entity\Bio;
use JJ\ImageBundle\Entity\Categorie;
use JJ\ImageBundle\Form\ImageType;
use JJ\ImageBundle\Form\ConcertType;
use JJ\ImageBundle\Form\DisqueType;
use JJ\ImageBundle\Form\BioType;
use JJ\ImageBundle\Form\TitreType;

class ImageController extends Controller
{
    public function addimageAction(Request $request)
    {
        $image = new Image();

        $form = $this->get('form.factory')->create(ImageType::class, $image);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notification', 'image bien ajoutée');

        }

        return $this->render('@JJImage/Images/addImage.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function addconcertAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $concert = new Concert();
      $id = 11;
      $categor = $em->getRepository('JJImageBundle:Categorie')->find($id);

      $form = $this->get('form.factory')->create(ConcertType::class, $concert);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $concert->setCategorie($categor);
          $em->persist($concert);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notification', 'image bien ajoutée');
      }

      return $this->render('@JJImage/Images/addConcert.html.twig', array(
        'form' => $form->createView()
      ));
    }


    public function addDisqueAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $disque = new Disque();
      $id = 3;
      $categor = $em->getRepository('JJImageBundle:Categorie')->find($id);

      $form = $this->get('form.factory')->create(DisqueType::class, $disque);

      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $disque->setCategorie($categor);
          $em->persist($disque);
          foreach ($disque->getTitres() as $titre) {
            $titre->setDisque($disque);
          }
          $em->flush();

          $request->getSession()->getFlashBag()->add('notification', 'image bien ajoutée');
      }

      return $this->render('@JJImage/Images/addDisque.html.twig', array(
        'form' => $form->createView()
      ));
    }


    public function editAction()
    {
      $em = $this->getDoctrine()->getManager();

      $images = $em->getRepository('JJImageBundle:Image')->findAll();
      $concerts = $em->getRepository('JJImageBundle:Concert')->findAll();
      $disques = $em->getRepository('JJImageBundle:Disque')->findAll();


      return $this->render('@JJImage/Images/edit.html.twig', array(
        'images' => $images,
        'concerts' => $concerts,
        'disques' => $disques
      ));
    }

    public function editImageAction ($id, Request $request)
    {

    }

    public function editConcertAction ($id, Request $request)
    {

    }

    public function editDisqueAction ($id, Request $request)
    {

    }

    public function deleteImageAction($id)
    {}

    public function deleteConcertAction($id)
    {}

    public function deleteDisqueAction($id)
    {}

}
