<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactsList
 *
 * @ORM\Table(name="contacts_list")
 * @ORM\Entity
 */
class ContactsList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cl_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clId;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_name", type="string", length=45, nullable=true)
     */
    private $clName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cl_phone_number", type="integer", nullable=true)
     */
    private $clPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_email_address", type="string", length=45, nullable=true)
     */
    private $clEmailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_country", type="string", length=45, nullable=false)
     */
    private $clCountry;


    /**
     * Get clId
     *
     * @return integer 
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set clName
     *
     * @param string $clName
     * @return ContactsList
     */
    public function setClName($clName)
    {
        $this->clName = $clName;
    
        return $this;
    }

    /**
     * Get clName
     *
     * @return string 
     */
    public function getClName()
    {
        return $this->clName;
    }

    /**
     * Set clPhoneNumber
     *
     * @param integer $clPhoneNumber
     * @return ContactsList
     */
    public function setClPhoneNumber($clPhoneNumber)
    {
        $this->clPhoneNumber = $clPhoneNumber;
    
        return $this;
    }

    /**
     * Get clPhoneNumber
     *
     * @return integer 
     */
    public function getClPhoneNumber()
    {
        return $this->clPhoneNumber;
    }

    /**
     * Set clEmailAddress
     *
     * @param string $clEmailAddress
     * @return ContactsList
     */
    public function setClEmailAddress($clEmailAddress)
    {
        $this->clEmailAddress = $clEmailAddress;
    
        return $this;
    }

    /**
     * Get clEmailAddress
     *
     * @return string 
     */
    public function getClEmailAddress()
    {
        return $this->clEmailAddress;
    }

    /**
     * Set clCountry
     *
     * @param string $clCountry
     * @return ContactsList
     */
    public function setClCountry($clCountry)
    {
        $this->clCountry = $clCountry;
    
        return $this;
    }

    /**
     * Get clCountry
     *
     * @return string 
     */
    public function getClCountry()
    {
        return $this->clCountry;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="cl_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clId;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_name", type="string", length=45, nullable=true)
     */
    private $clName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cl_phone_number", type="integer", nullable=true)
     */
    private $clPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_email_address", type="string", length=45, nullable=true)
     */
    private $clEmailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="cl_country", type="string", length=45, nullable=false)
     */
    private $clCountry;


    /**
     * Get clId
     *
     * @return integer 
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set clName
     *
     * @param string $clName
     * @return ContactsList
     */
    public function setClName($clName)
    {
        $this->clName = $clName;
    
        return $this;
    }

    /**
     * Get clName
     *
     * @return string 
     */
    public function getClName()
    {
        return $this->clName;
    }

    /**
     * Set clPhoneNumber
     *
     * @param integer $clPhoneNumber
     * @return ContactsList
     */
    public function setClPhoneNumber($clPhoneNumber)
    {
        $this->clPhoneNumber = $clPhoneNumber;
    
        return $this;
    }

    /**
     * Get clPhoneNumber
     *
     * @return integer 
     */
    public function getClPhoneNumber()
    {
        return $this->clPhoneNumber;
    }

    /**
     * Set clEmailAddress
     *
     * @param string $clEmailAddress
     * @return ContactsList
     */
    public function setClEmailAddress($clEmailAddress)
    {
        $this->clEmailAddress = $clEmailAddress;
    
        return $this;
    }

    /**
     * Get clEmailAddress
     *
     * @return string 
     */
    public function getClEmailAddress()
    {
        return $this->clEmailAddress;
    }

    /**
     * Set clCountry
     *
     * @param string $clCountry
     * @return ContactsList
     */
    public function setClCountry($clCountry)
    {
        $this->clCountry = $clCountry;
    
        return $this;
    }

    /**
     * Get clCountry
     *
     * @return string 
     */
    public function getClCountry()
    {
        return $this->clCountry;
    }
}