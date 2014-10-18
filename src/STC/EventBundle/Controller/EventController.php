<?php

namespace STC\EventBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use STC\EventBundle\Entity\Event;

/**
 * Event controller.
 *
 */
class EventController extends Controller
{

    /**
     * Lists all Event entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('STCEventBundle:Event')->findBy(array('enabled' => true));

        return $this->render(
            'STCEventBundle:Event:index.html.twig',
            array(
                'entities' => $entities,
            )
        );
    }

    /**
     * Finds and displays a Event entity.
     *
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('STCEventBundle:Event')->findOneBy(array('slug' => $slug, 'enabled' => true));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        return $this->render(
            'STCEventBundle:Event:show.html.twig',
            array(
                'entity' => $entity,
            )
        );
    }

    /**
     * Lists all Event entities.
     *
     */
    public function lastEventAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('STCEventBundle:Event')->findBy(array('enabled' => true));

        return $this->render(
            'STCEventBundle:Event:lastEvent.html.twig',
            array(
                'entities' => $entities,
            )
        );
    }
}
