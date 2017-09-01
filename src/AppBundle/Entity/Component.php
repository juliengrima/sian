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
     * @var \AppBundle\Entity\SubGallery
     */
    private $subgallery;

    /**
     * @var \AppBundle\Entity\collection
     */
    private $collection;

    /**
     * @var \AppBundle\Entity\media
     */
    private $media;


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
     * Set collection
     *
     * @param \AppBundle\Entity\collection $collection
     *
     * @return Component
     */
    public function setCollection(\AppBundle\Entity\collection $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \AppBundle\Entity\collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set media
     *
     * @param \AppBundle\Entity\media $media
     *
     * @return Component
     */
    public function setMedia(\AppBundle\Entity\media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\media
     */
    public function getMedia()
    {
        return $this->media;
    }
}
