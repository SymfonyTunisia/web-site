<?php

namespace STC\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('STCBannerBundle:Default:index.html.twig', array('name' => $name));
    }
}
