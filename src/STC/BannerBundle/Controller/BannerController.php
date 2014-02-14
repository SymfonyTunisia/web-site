<?php
namespace STC\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BannerController extends Controller{

	public function showAction($position)
	{

		$banners = $this->getDoctrine()->getRepository("STCBannerBundle:Banner")->findEnabledByType($position);

		if (count($banners) > 0)
		{
			$bannerType = null;
		}
		else
		{
			$bannerType = $this->getDoctrine()->getRepository("STCBannerBundle:BannerType")->findEnabledByType($position);
		}
		$this->get('session')->set('aaaa',$bannerType);
		return $this->render("STCBannerBundle:Banner:show.html.twig",array("banners"=>$banners,"bannerType"=>$bannerType));
		
	}
}
