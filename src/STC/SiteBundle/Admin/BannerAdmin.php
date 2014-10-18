<?php

namespace STC\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class BannerAdmin
 * @package STC\SiteBundle\Admin
 */
class BannerAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('client')
            ->add('start_date')
            ->add('enabled')
            ->add('status');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('client')
            ->add('start_date')
            ->add('duration')
            ->add('enabled')
            ->add('url')
            ->add('status')
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                )
            );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('client')
            ->add('start_date')
            ->add('duration')
            ->add('enabled')
            ->add('url')
            ->add('status')
            ->add(
                'media',
                'sonata_type_model_list',
                array('required' => false, 'btn_list' => false),
                array(
                    'link_parameters' => array(
                        'context' => 'sonata_banner'
                    )
                )
            );
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('client')
            ->add('start_date')
            ->add('duration')
            ->add('enabled')
            ->add('url')
            ->add('status');
    }
}
