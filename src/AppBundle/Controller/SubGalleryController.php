<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Media;
use AppBundle\Entity\Gallery;
use AppBundle\Entity\SubGallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Subgallery controller.
 *
 */
class SubGalleryController extends Controller
{
    /**
     * Lists all subGallery entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $subGalleries = $em->getRepository('AppBundle:SubGallery')->findAll ();

        return $this->render('subgallery/index.html.twig', array(
            'subGalleries' => $subGalleries,
        ));
    }

    /**
     * Lists subGallery entity in function Gallery.
     *
     */
    public function indexSubAction(Request $request)
    {
        $gallery = new gallery;
        $gallery = $_GET['id'];

        $em = $this->getDoctrine()->getManager();

        $subGallery = $em->getRepository('AppBundle:SubGallery')->findby(array('gallery' => $gallery));

        return $this->render('subgallery/list.html.twig', array(
            'subGalleries' => $subGallery,
        ));
    }

    /**
     * Creates a new subGallery entity.
     *
     */
    public function newAction(Request $request)
    {
        $subGallery = new Subgallery();
        $form = $this->createForm('AppBundle\Form\SubGalleryType', $subGallery);
        $form->setData ($subGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /* ON RECUP LE FICHIER IMAGE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            $subGallery->setMedia ($image);

            if (isset($image)) {

                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
                $image->setPicname (preg_replace ('/\W/', '_', "Object_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($subGallery);
            $em->flush();

            return $this->redirectToRoute('subgallery_show', array('id' => $subGallery->getId()));
        }

        return $this->render('subgallery/new.html.twig', array(
            'subGallery' => $subGallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subGallery entity.
     *
     */
    public function showAction(SubGallery $subGallery)
    {
        $deleteForm = $this->createDeleteForm($subGallery);

        return $this->render('subgallery/show.html.twig', array(
            'subGallery' => $subGallery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subGallery entity.
     *
     */
    public function editAction(Request $request, SubGallery $subGallery)
    {
        $deleteForm = $this->createDeleteForm($subGallery);
        $editForm = $this->createForm('AppBundle\Form\SubGalleryType', $subGallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /* ON RECUP LE FICHIER IMAGE */
            $imageForm = $editForm->get ('media');
            $image = $imageForm->getData ();
            $subGallery->setMedia ($image);

            if (isset($image)) {

                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
                $image->setPicname (preg_replace ('/\W/', '_', "Object_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subgallery_edit', array('id' => $subGallery->getId()));
        }

        return $this->render('subgallery/edit.html.twig', array(
            'subGallery' => $subGallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subGallery entity.
     *
     */
    public function deleteAction(Request $request, SubGallery $subGallery)
    {
        $form = $this->createDeleteForm($subGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subGallery);
            $em->flush();
        }

        return $this->redirectToRoute('subgallery_index');
    }

    /**
     * Creates a form to delete a subGallery entity.
     *
     * @param SubGallery $subGallery The subGallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubGallery $subGallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subgallery_delete', array('id' => $subGallery->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
