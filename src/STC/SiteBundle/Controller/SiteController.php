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
    public function sliderAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('STCSiteBundle:Banner')->findBy(array('enabled' => true));

        return $this->render('STCSiteBundle:Site:slider.html.twig', array('entities' => $entities));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sponsorAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('STCSiteBundle:Sponsor')->findSponsor();

        return $this->render('STCSiteBundle:Site:sponsor.html.twig', array('entities' => $entities));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function symfonyPlanningAction()
    {
        return $this->render('STCSiteBundle:Site:symfonyPlanning.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function symfonyWorkshopAction()
    {
        return $this->render('STCSiteBundle:Site:symfonyWorkshop.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function symfonySponsorAction()
    {
        return $this->render('STCSiteBundle:Site:symfonySponsor.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function codeOfConductAction()
    {
        return $this->render('STCSiteBundle:Site:codeOfConduct.html.twig');
    }
}
