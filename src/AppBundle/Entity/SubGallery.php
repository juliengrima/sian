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
}
