<?php

namespace JJ\ImageBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use JJ\ImageBundle\Entity\Image;
use JJ\ImageBundle\Form\ImageType;

class ImageController extends Controller
{
    public function indexAction()
    {
        return $this->render('@JJImage/Images/index.html.twig');
    }

    public function addAction(Request $request)
    {
        $image = new Image();
        // $image->setDate(2015);
        // $image->setName('photo_2');

        // $em = $this->getDoctrine()->getManager();
        // $em->persist($image);
        // $em->flush();

        // return new Response('Contenu ajouté !!');

        $form = $this->get('form.factory')->create(ImageType::class, $image);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notification', 'image bien ajoutée');

        }

        return $this->render('@JJImage/Images/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function viewAction()
    {
        $encoder = array(new JsonEncoder());
        $normalizer = array(new ObjectNormalizer());

        

        $images = $this->getDoctrine()->getManager()->getRepository('JJImageBundle:Image')->findAll();

        $serializer = new Serializer($normalizer, $encoder);

        $imagejson = $serializer->serialize($images, 'json');

        // foreach ($images as $image) {
        //     $reponse = $serializer->serialize($image, 'json');
        //     array_push($imagejson, $reponse);
        // }

        return new Response($imagejson);
    }
}