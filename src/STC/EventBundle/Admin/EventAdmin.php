<?php

namespace STC\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class EventAdmin
 * @package STC\EventBundle\Admin
 */
class EventAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('date')
            ->add('enabled');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('date')
            ->add('startDate')
            ->add('endDate')
            ->add('location')
            ->add('description')
            ->add('enabled')
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
            ->add('title')
            ->add('category')
            ->add('enabled')
            ->add('date', 'sonata_type_datetime_picker')
            ->add('startDate', 'sonata_type_datetime_picker')
            ->add('endDate', 'sonata_type_datetime_picker')
            ->add('location')
            ->add('description')

            ->add(
                'content',
                'sonata_formatter_type',
                array(
                    'required' => false,
                    'source_field' => 'rawContent',
                    'source_field_options' => array('attr' => array('class' => 'span10', 'rows' => 20)),
                    'format_field' => 'contentFormatter',
                    'target_field' => 'content',
                    'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher()
                )
            )
            ->add(
                'image',
                'sonata_type_model_list',
                array(
                    'required' => false,
                    'btn_list' => false
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'sonata_event'
                    )
                )
            )
            ->add(
                'images',
                'sonata_type_model_list',
                array(
                    'required' => false,
                    'btn_list' => false
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'sonata_event'
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
            ->add('title')
            ->add('date')
            ->add('startDate', 'sonata_type_datetime_picker')
            ->add('endDate', 'sonata_type_datetime_picker')
            ->add('location')
            ->add('description')
            ->add('content')
            ->add('enabled')
            ->add('slug')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
