<?php

namespace AppBundle\Entity;

/**
 * Collection
 */
class Collection
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $colname;


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
     * Set colname
     *
     * @param string $colname
     *
     * @return Collection
     */
    public function setColname($colname)
    {
        $this->colname = $colname;

        return $this;
    }

    /**
     * Get colname
     *
     * @return string
     */
    public function getColname()
    {
        return $this->colname;
    }
}
