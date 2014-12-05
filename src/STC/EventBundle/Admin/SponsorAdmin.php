<?php

namespace STC\EventBundle\Admin;
use STC\EventBundle\Entity\Sponsor;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SponsorAdmin extends Admin
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
            ->add('name')
            ->add('enable')
            ->add('url')
            ->add('position')
            ->add('type')
            ->add('createdAt')
            ->add('updatedAt');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('enable')
            ->add('url')
            ->add('position')
            ->add('type')
            ->add('createdAt')
            ->add('updatedAt')
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
            ->add('name')
            ->add('enable')
            ->add('url','url')
            ->add('position')
            ->add(
                'type',
                'choice',
                array(
                    'label' => 'form.sponsor.type',
                    'empty_value' => 'form.sponsor.type_empty_value',
                    'required' => true,
                    'translation_domain' => 'EventtBundle',
                    'choices' => Sponsor::$typeList
                )
            )
            ->add(
                'logo',
                'sonata_type_model_list',
                array(
                    'required' => false,
                    'btn_list' => false
                ),
                array(
                    'link_parameters' => array(
                        'context' => 'sonata_event_sponsor'
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
            ->add('enable')
            ->add('url')
            ->add('position')
            ->add('type')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
