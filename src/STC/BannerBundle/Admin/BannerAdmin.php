<?php

namespace STC\BannerBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

class BannerAdmin extends BaseAdmin
{
	protected function configureDatagridFilters(DatagridMapper $filterMapper)
	{
		$filterMapper
		->add('name', NULL, array('label'=> 'Banner Name'))
		;
	}
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('name')
		->add('client')
		->add('duration')
		->add('url','url')
		->add('start_date','date')
		->add('status')
		->add('banner_type')
		->add('media', 'sonata_media_type', array(
				'provider' => 'sonata.media.provider.image',
				'context'  => 'default'
		))
		->add('enabled');
	}

	/**
	 * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
	 *
	 * @return void
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->add('name',NULL,array('label'=>'Banner Name'))
		->add('client',NULL,array('label'=>'Client Name'))
		->add('created',NULL,array('label'=>'Created'))
		->add('media',null,array('label'=>'image','template'=>'STCBannerBundle:Admin:image_field.html.twig'))
				;

		$listMapper->add('_action', 'actions',array('actions' => array('edit' => array(), 'delete' => array(),)));
	}
}
