<?php

namespace AppBundle\Entity;

/**
 * About
 */
class About
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $about;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return About
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }
    /**
     * @var \AppBundle\Entity\Media
     */
    private $media;


    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return About
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
}
