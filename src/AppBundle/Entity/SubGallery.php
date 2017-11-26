<?php

namespace AppBundle\Entity;

/**
 * SubGallery
 */
class SubGallery
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sgallery;

    /**
     * @var \AppBundle\Entity\gallery
     */
    private $gallery;

    /**
     * @var \AppBundle\Entity\Media
     */
    private $media;

    /**
     * @var integer
     */
    private $prix;

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
     * Set sgallery
     *
     * @param string $sgallery
     *
     * @return SubGallery
     */
    public function setSgallery($sgallery)
    {
        $this->sgallery = $sgallery;

        return $this;
    }

    /**
     * Get sgallery
     *
     * @return string
     */
    public function getSgallery()
    {
        return $this->sgallery;
    }

    /**
     * Set gallery
     *
     * @param \AppBundle\Entity\gallery $gallery
     *
     * @return SubGallery
     */
    public function setGallery(\AppBundle\Entity\gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \AppBundle\Entity\gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return SubGallery
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return SubGallery
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return SubGallery
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
}
