<?php

namespace AppBundle\Controller;

use AppBundle\Entity\About;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * About controller.
 *
 */
class AboutController extends Controller
{
    /**
     * Lists all about entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $abouts = $em->getRepository('AppBundle:About')->findAll();

        return $this->render('about/index.html.twig', array(
            'abouts' => $abouts,
        ));
    }

    /**
     * Creates a new about entity.
     *
     */
    public function newAction(Request $request)
    {
        $about = new About();
        $form = $this->createForm('AppBundle\Form\AboutType', $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /* ON RECUP LE FICHIER IMAGE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            $about->setMedia ($image);

            if (isset($image)) {

                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
                $image->setPicname (preg_replace ('/\W/', '_', "Object_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('about_index', array('id' => $about->getId()));
        }

        return $this->render('about/new.html.twig', array(
            'about' => $about,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a about entity.
     *
     */
    public function showAction(About $about)
    {
        $deleteForm = $this->createDeleteForm($about);

        return $this->render('about/show.html.twig', array(
            'about' => $about,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing about entity.
     *
     */
    public function editAction(Request $request, About $about)
    {
        $deleteForm = $this->createDeleteForm($about);
        $editForm = $this->createForm('AppBundle\Form\AboutType', $about);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $imageForm = $editForm->get ('media');
            $image = $imageForm->getData ();
            $about->setMedia ($image);

            if (isset($image)) {

                /* ON DEFINI UN NOM UNIQUE AU FICHIER UPLOAD : LE PREG_REPLACE PERMET LA SUPPRESSION DES ESPACES ET AUTRES CARACTERES INDESIRABLES*/
                $image->setPicname (preg_replace ('/\W/', '_', "Object_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('about_index', array('id' => $about->getId()));
        }

        return $this->render('about/edit.html.twig', array(
            'about' => $about,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a about entity.
     *
     */
    public function deleteAction(Request $request, About $about)
    {
        $form = $this->createDeleteForm($about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($about);
            $em->flush();
        }

        return $this->redirectToRoute('about_index');
    }

    /**
     * Creates a form to delete a about entity.
     *
     * @param About $about The about entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(About $about)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('about_delete', array('id' => $about->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
