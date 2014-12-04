<?php

namespace STC\SiteBundle\Helper;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Templating\Helper\Helper;

/**
 * Class SocialBarHelper
 * @package STC\SiteBundle\Helper
 */
class SocialBarHelper extends Helper
{
    protected $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    public function socialButtons($parameters)
    {
        return $this->templating->render('STCSiteBundle:Helper:socialButtons.html.twig', $parameters);
    }

    public function facebookButton($parameters)
    {
        return $this->templating->render('STCSiteBundle:Helper:facebookButton.html.twig', $parameters);
    }

    public function twitterButton($parameters)
    {
        return $this->templating->render('STCSiteBundle:Helper:twitterButton.html.twig', $parameters);
    }

    public function googlePlusButton($parameters)
    {
        return $this->templating->render('STCSiteBundle:Helper:googlePlusButton.html.twig', $parameters);
    }

    public function getName()
    {
        return 'socialButtons';
    }
}
