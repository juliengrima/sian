<?php

namespace AppBundle\Entity;

/**
 * Partner
 */
class Partner
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $partner;

    /**
     * @var string
     */
    private $mail;


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
     * Set string
     *
     * @param string $string
     *
     * @return Partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get string
     *
     * @return string
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Partner
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
}

