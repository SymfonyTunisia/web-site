<?php

namespace STC\BannerBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

class BannerTypeAdmin extends BaseAdmin
{
	

	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->add('name',NULL,array('label'=>'Banner Type Name'))
		;

		$listMapper->add('_action', 'actions',array('actions' => array('edit' => array(), 'delete' => array(),)));
	}
}
