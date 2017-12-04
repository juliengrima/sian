<?php

namespace AppBundle\Entity;

/**
 * Media
 */
class Media
{
    // Variable temporaire pour upload de fichier
    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($picture)
    {
        $this->file = $picture;
        return $this;
    }


    function __toString()
    {
        return $this->getPicname() . " | " . $this->getPicpath();
    }


    // GENERATED CODE
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $picname;

    /**
     * @var string
     */
    private $picpath;

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
     * Set picname
     *
     * @param string $picname
     *
     * @return Media
     */
    public function setPicname($picname)
    {
        $this->picname = $picname;

        return $this;
    }

    /**
     * Get picname
     *
     * @return string
     */
    public function getPicname()
    {
        return $this->picname;
    }

    /**
     * Set picpath
     *
     * @param string $picpath
     *
     * @return Media
     */
    public function setPicpath($picpath)
    {
        $this->picpath = $picpath;

        return $this;
    }

    /**
     * Get picpath
     *
     * @return string
     */
    public function getPicpath()
    {
        return $this->picpath;
    }
}
