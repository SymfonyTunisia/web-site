<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace STC\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sonata\PageBundle\Model\SiteInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Parser;

/**
 * Class BaseLoadPageData
 * @package STC\SiteBundle\DataFixtures\ORM
 */
class BaseLoadPageData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    protected $yaml;

    protected $site;

    public function __construct()
    {
        $this->yaml = new Parser();
    }

    public function getOrder()
    {
        return 3;
    }


    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

    }

    /**
     * @return SiteInterface $site
     */
    public function createSite()
    {
        $site = $this->getSiteManager()->create();

        $site->setHost('localhost');
        $site->setEnabled(true);
        $site->setName('localhost');
        $site->setEnabledFrom(new \DateTime('now'));
        $site->setEnabledTo(new \DateTime('+10 years'));
        $site->setRelativePath("");
        $site->setIsDefault(true);

        $this->getSiteManager()->save($site);

        return $site;
    }

    /**
     * @param SiteInterface $site
     * @param $pageConfiguration
     * @return object
     */
    public function createPage(SiteInterface $site, $pageConfiguration)
    {
        $pageManager = $this->getPageManager();
        $page = $pageManager->create();
        $page->setSlug(sprintf('/%s', $pageConfiguration['slug']));
        $page->setUrl(sprintf('/%s', $pageConfiguration['url']));
        $page->setName($pageConfiguration['name']);
        $page->setTitle($pageConfiguration['title']);
        $page->setEnabled(true);
        $page->setDecorate(1);
        $page->setRequestMethod('GET|POST|HEAD|DELETE|PUT');
        $page->setTemplateCode($pageConfiguration['template']);
        $page->setRouteName($pageConfiguration['route']);
        $page->setMetaKeyword($pageConfiguration['meta']['keywords']);
        $page->setMetaDescription($pageConfiguration['meta']['description']);
        $page->setSite($site);
        $page->setParent($this->getReference($pageConfiguration['reference']));

        return $page;
    }

    /**
     * @return \Sonata\PageBundle\Model\SiteManagerInterface
     */
    public function getSiteManager()
    {
        return $this->container->get('sonata.page.manager.site');
    }

    /**
     * @return \Sonata\PageBundle\Model\PageManagerInterface
     */
    public function getPageManager()
    {
        return $this->container->get('sonata.page.manager.page');
    }

    /**
     * @return \Sonata\BlockBundle\Model\BlockManagerInterface
     */
    public function getBlockManager()
    {
        return $this->container->get('sonata.page.manager.block');
    }

    /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }

    /**
     * @return \Sonata\PageBundle\Entity\BlockInteractor
     */
    public function getBlockInteractor()
    {
        return $this->container->get('sonata.page.block_interactor');
    }
}
