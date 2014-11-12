<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Help
 *
 * @ORM\Table(name="help")
 * @ORM\Entity
 */
class Help
{
    /**
     * @var integer
     *
     * @ORM\Column(name="help_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $helpId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=45, nullable=true)
     */
    private $facMfl;

    /**
     * @var string
     *
     * @ORM\Column(name="complaint", type="text", nullable=true)
     */
    private $complaint;


    /**
     * Get helpId
     *
     * @return integer 
     */
    public function getHelpId()
    {
        return $this->helpId;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Help
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return Help
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return string 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set complaint
     *
     * @param string $complaint
     * @return Help
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;
    
        return $this;
    }

    /**
     * Get complaint
     *
     * @return string 
     */
    public function getComplaint()
    {
        return $this->complaint;
    }
}