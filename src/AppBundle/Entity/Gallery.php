<?php

namespace AppBundle\Entity;

/**
 * Gallery
 */
class Gallery
{

//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return $this->header;
//    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return Gallery
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @var \AppBundle\Entity\Header
     */
    private $header;


    /**
     * Set header
     *
     * @param \AppBundle\Entity\Header $header
     *
     * @return Gallery
     */
    public function setHeader(\AppBundle\Entity\Header $header = null)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return \AppBundle\Entity\Header
     */
    public function getHeader()
    {
        return $this->header;
    }
}
