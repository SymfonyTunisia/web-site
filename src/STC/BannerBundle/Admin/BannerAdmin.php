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

	/**
	 * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
	 *
	 * @return void
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->add('name',NULL,array('label'=>'Banner Name'))
		->add('created',NULL,array('label'=>'Created'))
				;

		$listMapper->add('_action', 'actions',array('actions' => array('edit' => array(), 'delete' => array(),)));
	}
}
