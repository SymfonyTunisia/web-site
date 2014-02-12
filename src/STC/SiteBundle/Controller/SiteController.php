<?php

namespace STC\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
	public function homeAction()
	{
		
		return $this->render('STCSiteBundle:Site:home.html.twig');
	}
}
