<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gbahmed
 * Date: 12/02/14
 * Time: 16:15
 * To change this template use File | Settings | File Templates.
 */

namespace STC\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function showAction($slug)
    {

        return $this->render('STCEventBundle:Event:show.html.twig');
    }
}
