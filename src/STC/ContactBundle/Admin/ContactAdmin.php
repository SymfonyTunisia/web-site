<?php

namespace STC\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class ContactAdmin
 * @package STC\ContactBundle\Admin
 */
class ContactAdmin extends Admin
{
    /**
     * Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'updatedAt'
    );

    /**
     * {@inheritdoc}
     */
    public function getExportFormats()
    {
        return array(
            'csv',
            'xls'
        );
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('edit');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastName')
            ->add('firstName')
            ->add('email');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'civility',
                'string',
                array(
                    'template' => 'STCContactBundle:Admin:field_row_civility.html.twig'
                )
            )
            ->add('lastName')
            ->add('firstName')
            ->add('email')
            ->add('phone')
            ->add('createdAt')
            ->add('updatedAt')
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'show' => array(),
                        'delete' => array(),
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
            ->add(
                'civility',
                'string',
                array(
                    'template' => 'STCContactBundle:Admin:field_show_civility.html.twig'
                )
            )
            ->add('lastName')
            ->add('firstName')
            ->add('email')
            ->add('phone')
            ->add('message')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
