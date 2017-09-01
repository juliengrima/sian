<?php

namespace AppBundle\Services;

use AppBundle\Entity\Media;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class mediaInterface extends Controller
{
	protected $container;

	public function __construct(Container $container) {
		$this->container = $container;

	}

// Uploads a media
	public function mediaUpload(Media $media)
	{
		$file = $media->getFile();
		if ($media->getPicpath() != null) {	// Si le média contenait déjà un fichier uploadé
			$tmp = explode('/', $media->getPicpath());
			$filename = end($tmp);    // On récupère le nom du fichier ({{media.picname}}.extension
			// On supprime ce fichier de la mémoire
			unlink($this->container->getParameter('medias_directory') . '/' . $filename);
			$media->setPicpath(null);
		}
		// Puis on upload le nouveau fichier
		$extension = $file->guessExtension();
		$file->move($this->container->getParameter('medias_directory'), $media->getPicname().'.'.$extension);
		$media->setPicpath('images/dowloads/'.$media->getPicname().'.'.$extension);
	}
}