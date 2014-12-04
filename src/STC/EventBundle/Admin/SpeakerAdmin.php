<?php

namespace STC\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SpeakerAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}