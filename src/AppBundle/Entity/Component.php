<?php

namespace AppBundle\Entity;

/**
 * Component
 */
class Component
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $compname;

    /**
     * @var string
     */
    private $description;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set compname
     *
     * @param string $compname
     *
     * @return Component
     */
    public function setCompname($compname)
    {
        $this->compname = $compname;

        return $this;
    }

    /**
     * Get compname
     *
     * @return string
     */
    public function getCompname()
    {
        return $this->compname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Component
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var \AppBundle\Entity\SubGallery
     */
    private $subgallery;

    /**
     * @var \AppBundle\Entity\Media
     */
    private $media;


    /**
     * Set subgallery
     *
     * @param \AppBundle\Entity\SubGallery $subgallery
     *
     * @return Component
     */
    public function setSubgallery(\AppBundle\Entity\SubGallery $subgallery = null)
    {
        $this->subgallery = $subgallery;

        return $this;
    }

    /**
     * Get subgallery
     *
     * @return \AppBundle\Entity\SubGallery
     */
    public function getSubgallery()
    {
        return $this->subgallery;
    }

    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Component
     */
    public function setMedia(\AppBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }
    /**
     * @var integer
     */
    private $prix;


    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Component
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
