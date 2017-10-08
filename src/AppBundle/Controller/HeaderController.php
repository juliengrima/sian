<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Header;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Header controller.
 *
 */
class HeaderController extends Controller
{
    /**
     * Lists all header entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $headers = $em->getRepository('AppBundle:Header')->findAll();
        $galleries = $em->getRepository('AppBundle:Gallery')->findBy(array ('header' => $headers)); //array ('id' => $headers)

        return $this->render('header/index.html.twig', array(
            'headers' => $headers,
            'galleries' => $galleries,
        ));
    }

    /**
     * Lists all header entities.
     *
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();

        $headers = $em->getRepository('AppBundle:Header')->findAll();

        return $this->render('header/show_all.html.twig', array(
            'headers' => $headers,
        ));
    }

    /**
     * Creates a new header entity.
     *
     */
    public function newAction(Request $request)
    {
        $header = new Header();
        $form = $this->createForm('AppBundle\Form\HeaderType', $header);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($header);
            $em->flush();

            return $this->redirectToRoute('header_show', array('id' => $header->getId()));
        }

        return $this->render('header/new.html.twig', array(
            'header' => $header,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a header entity.
     *
     */
    public function showAction(Header $header)
    {
        $deleteForm = $this->createDeleteForm($header);

        return $this->render('header/show.html.twig', array(
            'header' => $header,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing header entity.
     *
     */
    public function editAction(Request $request, Header $header)
    {
        $deleteForm = $this->createDeleteForm($header);
        $editForm = $this->createForm('AppBundle\Form\HeaderType', $header);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('header_show', array('id' => $header->getId()));
        }

        return $this->render('header/edit.html.twig', array(
            'header' => $header,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a header entity.
     *
     */
    public function deleteAction(Request $request, Header $header)
    {
        $form = $this->createDeleteForm($header);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($header);
            $em->flush();
        }

        return $this->redirectToRoute('header_index');
    }

    /**
     * Creates a form to delete a header entity.
     *
     * @param Header $header The header entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Header $header)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('header_delete', array('id' => $header->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
