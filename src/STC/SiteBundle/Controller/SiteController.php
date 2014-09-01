<?php

namespace STC\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SiteController
 * @package STC\SiteBundle\Controller
 */
class SiteController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction()
	{
		return $this->render('STCSiteBundle:Site:home.html.twig');
	}

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function whoWeAreAction()
    {
        return $this->render('STCSiteBundle:Site:whoWeAre.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function copyrightAction()
    {
        return $this->render('STCSiteBundle:Site:copyright.html.twig');
    }
}
