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

use Doctrine\Common\Persistence\ObjectManager;
use Sonata\PageBundle\Model\SiteInterface;

/**
 * Class LoadPageData
 * @package STC\SiteBundle\DataFixtures\ORM
 */
class LoadPageData extends BaseLoadPageData
{
    public function getOrder()
    {
        return 4;
    }

    public function load(ObjectManager $manager)
    {
        $site = $this->createSite();
        $this->createParentPage($site);
        $datas = $this->yaml->parse(file_get_contents(__DIR__ . '/../data/page.yml'));
        foreach ($datas['pages'] as $pageConfiguration) {
            $this->createCMSContentPage($site, $pageConfiguration);
        }
    }

    /**
     * @param SiteInterface $site
     */
    public function createParentPage(SiteInterface $site)
    {
        $pageManager = $this->getPageManager();
        $blockManager = $this->getBlockManager();
        $blockInteractor = $this->getBlockInteractor();
        $datas = $this->yaml->parse(file_get_contents(__DIR__ . '/../data/parent.yml'));

        foreach ($datas['pages'] as $pageConfiguration) {
            $this->addReference($pageConfiguration['reference'], $page = $pageManager->create());
            $page->setSlug($pageConfiguration['slug']);
            $page->setUrl($pageConfiguration['url']);
            $page->setName($pageConfiguration['name']);
            $page->setTitle($pageConfiguration['title']);
            $page->setEnabled(true);
            $page->setDecorate(true);
            $page->setRequestMethod('GET|POST|HEAD|DELETE|PUT');
            $page->setTemplateCode('default');
            $page->setRouteName($pageConfiguration['route']);
            if (isset($pageConfiguration['parent'])) {
                $page->setParent($this->getReference($pageConfiguration['parent']));
            }

            $page->setSite($site);

            $pageManager->save($page);


            $pageManager->save($page);
        }
    }

    /**
     * Creates simple content pages
     *
     * @param SiteInterface $site
     * @param $pageConfiguration
     *
     * @return void
     */
    public function createCMSContentPage(SiteInterface $site, $pageConfiguration)
    {
        $pageManager = $this->getPageManager();
        $blockManager = $this->getBlockManager();
        $blockInteractor = $this->getBlockInteractor();

        $page = $this->createPage($site, $pageConfiguration);


        $pageManager->save($page);
    }
}
