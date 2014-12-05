<?php

namespace STC\EventBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SpeakerAdmin extends Admin
{
    public function getParentAssociationMapping()
    {
        return 'event';
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

        $datagridMapper
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
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
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
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
            ->add(
                'logo',
                'sonata_type_model_list',
                array(
                    'required' => false,
                    'btn_list' => false
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'sonata_speaker'
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
            ->add('firstName')
            ->add('lastName')
            ->add('function')
            ->add('company')
            ->add('description')
            ->add('blog')
            ->add('urlTwitter')
            ->add('urlGit')
            ->add('topic')
            ->add('topicDescription');
    }
}
