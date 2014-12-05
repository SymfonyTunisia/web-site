<?php

namespace STC\ContactBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Class MapBlockService
 * @package STC\ContactBundle\Block
 */
class MapBlockService extends BaseBlockService
{


    /**
     * Constructor
     *
     * @param string $name
     * @param EngineInterface $templating
     */
    public function __construct($name, EngineInterface $templating)
    {
        parent::__construct($name, $templating);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {

        return $this->renderResponse(
            $blockContext->getTemplate(),
            array(
                'block' => $blockContext->getBlock(),
                'settings' => $blockContext->getSettings(),
            ),
            $response
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getJavascripts($media)
    {
        $javascripts = array(
            '//maps.googleapis.com/maps/api/js?sensor=false&extension=.js',
            '/bundles/stccontact/js/google-maps-contact.js'
        );

        return $javascripts;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Page Content map';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'template' => 'STCContactBundle:Block:block_map.html.twig'
            )
        );
    }
}
