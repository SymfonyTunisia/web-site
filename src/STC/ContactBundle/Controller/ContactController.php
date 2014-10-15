<?php

namespace STC\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use STC\ContactBundle\Entity\Contact;
use STC\ContactBundle\Form\ContactType;
use Symfony\Component\Form\FormError;

/**
 * Contact controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Creates a new Contact entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Contact();
        $form = $this->createForm(
            new ContactType(),
            $entity,
            array(
                'action' => $this->generateUrl('contact'),
                'method' => 'POST',
                'attr' => array('id' => 'contact-form')
            )
        );

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactConfirm', array('id' => $entity->getId())));
        }

        return $this->render(
            'STCContactBundle:Contact:create.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function confirmAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('STCContactBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        return $this->render('STCContactBundle:Contact:confirmed.html.twig', array('entity' => $entity));
    }
}
