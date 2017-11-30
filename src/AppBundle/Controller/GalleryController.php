<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Component;
use AppBundle\Entity\Gallery;
use AppBundle\Entity\SubGallery;
use AppBundle\Repository\ComponentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gallery controller.
 *
 */
class GalleryController extends Controller
{
    /**
     * Lists all gallery entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleries = $em->getRepository('AppBundle:Gallery')->findAll();

        return $this->render('gallery/index.html.twig', array(
            'galleries' => $galleries,
        ));
    }


    public function layoutAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleries = $em->getRepository('AppBundle:Gallery')->findAll();

        return $this->render('::layout.html.twig', array(
            'galleries' => $galleries,
        ));
    }

    /**
     * Creates a new gallery entity.
     *
     */
    public function newAction(Request $request)
    {
        $gallery = new Gallery();
        $form = $this->createForm('AppBundle\Form\GalleryType', $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallery);
            $em->flush();

            return $this->redirectToRoute('gallery_show', array('id' => $gallery->getId()));
        }

        return $this->render('gallery/new.html.twig', array(
            'gallery' => $gallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gallery entity.
     *
     */
    public function showAction(Gallery $gallery)
    {
        $deleteForm = $this->createDeleteForm($gallery);

        return $this->render('gallery/show.html.twig', array(
            'gallery' => $gallery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Lists all gallery entities.
     *
     */
    public function allgalleryAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gallery = $em->getRepository('AppBundle:Gallery')->findAll();

        return $this->render('gallery/show_all.html.twig', array(
            'galleries' => $gallery,
        ));
    }

    /**
     * Displays a form to edit an existing gallery entity.
     *
     */
    public function editAction(Request $request, Gallery $gallery)
    {
        $deleteForm = $this->createDeleteForm($gallery);
        $editForm = $this->createForm('AppBundle\Form\GalleryType', $gallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallery_edit', array('id' => $gallery->getId()));
        }

        return $this->render('gallery/edit.html.twig', array(
            'gallery' => $gallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gallery entity.
     *
     */
    public function deleteAction(Request $request, Gallery $gallery)
    {
        $form = $this->createDeleteForm($gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gallery);
            $em->flush();
        }

        return $this->redirectToRoute('gallery_index');
    }

    /**
     * Creates a form to delete a gallery entity.
     *
     * @param Gallery $gallery The gallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gallery $gallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallery_delete', array('id' => $gallery->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
