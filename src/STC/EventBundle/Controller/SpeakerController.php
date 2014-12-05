<?php

namespace STC\EventBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use STC\EventBundle\Entity\Speaker;

/**
 * Speaker controller.
 *
 */
class SpeakerController extends Controller
{

    /**
     * Finds and displays a Speaker entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('STCEventBundle:Speaker')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speaker entity.');
        }

        return $this->render('STCEventBundle:Speaker:show.html.twig', array(
            'entity' => $entity,
        ));
    }
}
