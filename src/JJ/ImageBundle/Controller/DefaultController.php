<?php

namespace JJ\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JJImageBundle:Default:index.html.twig');
    }
}
