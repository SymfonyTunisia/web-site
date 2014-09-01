<?php
/**
 * Created by PhpStorm.
 * User: kadala
 * Date: 01/09/2014
 * Time: 17:42
 */

namespace STC\SiteBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FooterBlockService
 * @package STC\SiteBundle\Block
 */
class FooterBlockService extends BaseBlockService
{

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
    public function getName()
    {
        return 'Page Content Footer Top';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'template' => 'STCSiteBundle:Block:block_footer.html.twig'
            )
        );
    }
}
