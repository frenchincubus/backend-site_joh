<?php

namespace JJ\ImageBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ViewController extends Controller
{
  public function viewImageAction()
  {
      // $encoder = array(new JsonEncoder());
      // $normalizer = array(new ObjectNormalizer());

      $images = $this->getDoctrine()->getManager()->getRepository('JJImageBundle:Image')->findAll();

      // $serializer = new Serializer($normalizer, $encoder);

      $imagejson = $this->serializator()->serialize($images, 'json');

      return new Response($imagejson);
  }


  public function viewConcertAction()
  {
      // $encoder = array(new JsonEncoder());
      // $normalizer = array(new ObjectNormalizer());

      $concerts = $this->getDoctrine()->getManager()->getRepository('JJImageBundle:Concert')->findAll();

      // $serializer = new Serializer($normalizer, $encoder);

      // $imagejson = $serializer->serialize($images, 'json');
      $concertjson = $this->serializator()->serialize($concerts, 'json');

      return new Response($concertjson);
  }


  public function viewAlbumsAction()
  {
      $disques = $this->getDoctrine()->getManager()->getRepository('JJImageBundle:Disque')->findAll();

      $disquesjson = $this->serializator()->serialize($disques, 'json');

      return new Response($disquesjson);
  }

  public function serializator()
  {
    $encoder = array(new JsonEncoder());
    $normalizer = new ObjectNormalizer();

    $normalizer->setCircularReferenceLimit(2);
    $normalizer->setCircularReferenceHandler(function($object) {
      return $object->getId();
    });

    $normalizers = array($normalizer);

    $serializer = new Serializer($normalizers, $encoder);

    return $serializer;
  }
}
