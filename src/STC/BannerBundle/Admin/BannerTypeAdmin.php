<?php

namespace STC\BannerBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

class BannerTypeAdmin extends BaseAdmin
{
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('name')
		->add('position')
		->add('default_media', 'sonata_media_type', array(
				'provider' => 'sonata.media.provider.image',
				'context'  => 'default'
		))
		->add('enabled');
	}

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->add('name',NULL,array('label'=>'Banner Type Name'))
		->add('defaut_media',null,array('label'=>'image','template'=>'STCBannerBundle:Admin:default_media_field.html.twig'))
		->add('enabled')
		;

		$listMapper->add('_action', 'actions',array('actions' => array('edit' => array(), 'delete' => array(),)));
	}
}
