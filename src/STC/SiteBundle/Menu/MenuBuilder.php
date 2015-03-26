<?php

namespace STC\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class MenuBuilder
 * @package STC\SiteBundle\Menu
 */
class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * @param FactoryInterface $factory
     * @param TranslatorInterface $translator
     * @param ContainerInterface $container
     */
    public function __construct(FactoryInterface $factory, TranslatorInterface $translator, ContainerInterface $container) {
        $this->factory = $factory;
        $this->translator = $translator;
        $this->container = $container;
    }

    /**
     * @param  Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('menu');
        $route = $this->getRequest()->get('_route');
        $menu->setChildrenAttributes(array('class' => 'nav pull-right'));

        $menu->addChild(
            $this->translator->trans('label.whoWeAre', array(), 'messages'),
            array('route' => 'whoWeAre')
        );

        $menu->addChild(
            $this->translator->trans('label.planning', array(), 'messages'),
            array('route' => 'symfony_planning')
        );

        $menu->addChild(
            $this->translator->trans('label.workshop', array(), 'messages'),
            array('route' => 'symfony_workshop')
        );

        $menu->addChild(
            $this->translator->trans('label.sponsor', array(), 'messages'),
            array('route' => 'symfony_sponsor')
        );

        $menu->addChild(
            $this->translator->trans('label.contact', array(), 'messages'),
            array('route' => 'contact')
        );



        return $menu;
    }


    public function getRequest()
    {
        return $this->container->get('request');
    }
}
