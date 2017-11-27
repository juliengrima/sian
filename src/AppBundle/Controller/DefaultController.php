<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Gallery;
use AppBundle\Form\GalleryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $subGalleries = $em->getRepository('AppBundle:SubGallery')->findBy( array('slider' => 1));

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'subGalleries' => $subGalleries
        ));

    }

    /**
     * @Route("/", name="layout")
     */
    public function layoutAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personnages = $em->getRepository('AppBundle:Gallery')->findAll();

        if( $personnages != ""){
            $normalizer = new ObjectNormalizer(); //Normalisation des données pour passer en JSON
            $normalizer->setIgnoredAttributes(array('id'));
            $encoder = new JsonEncoder(); // Encodage des données en JSON
            $serializer = new Serializer(array($normalizer), array($encoder));

            $jsonObject = $serializer->serialize($personnages, 'json');

            $content = $this->renderView('gallery/index.html.twig', array(
                'personnages'=>$personnages
            ));
            $response = new JsonResponse($content);

            return $response;
        }
        else{

            return $this->render('layout.html.twig');

        }

    }
}
