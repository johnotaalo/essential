<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AssessorInformation
 *
 * @ORM\Table(name="assessor_information")
 * @ORM\Entity
 */
class AssessorInformation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="assessor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assessorId;

    /**
     * @var string
     *
     * @ORM\Column(name="assessor_name", type="string", length=400, nullable=true)
     */
    private $assessorName;

    /**
     * @var string
     *
     * @ORM\Column(name="assessor_designation", type="string", length=255, nullable=true)
     */
    private $assessorDesignation;

    /**
     * @var string
     *
     * @ORM\Column(name="assessor_emailAddress", type="string", length=255, nullable=true)
     */
    private $assessorEmailaddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="assessor_phoneNumber", type="integer", nullable=true)
     */
    private $assessorPhonenumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_mfl", type="string", length=11, nullable=true)
     */
    private $facilityMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get assessorId
     *
     * @return integer 
     */
    public function getAssessorId()
    {
        return $this->assessorId;
    }

    /**
     * Set assessorName
     *
     * @param string $assessorName
     * @return AssessorInformation
     */
    public function setAssessorName($assessorName)
    {
        $this->assessorName = $assessorName;
    
        return $this;
    }

    /**
     * Get assessorName
     *
     * @return string 
     */
    public function getAssessorName()
    {
        return $this->assessorName;
    }

    /**
     * Set assessorDesignation
     *
     * @param string $assessorDesignation
     * @return AssessorInformation
     */
    public function setAssessorDesignation($assessorDesignation)
    {
        $this->assessorDesignation = $assessorDesignation;
    
        return $this;
    }

    /**
     * Get assessorDesignation
     *
     * @return string 
     */
    public function getAssessorDesignation()
    {
        return $this->assessorDesignation;
    }

    /**
     * Set assessorEmailaddress
     *
     * @param string $assessorEmailaddress
     * @return AssessorInformation
     */
    public function setAssessorEmailaddress($assessorEmailaddress)
    {
        $this->assessorEmailaddress = $assessorEmailaddress;
    
        return $this;
    }

    /**
     * Get assessorEmailaddress
     *
     * @return string 
     */
    public function getAssessorEmailaddress()
    {
        return $this->assessorEmailaddress;
    }

    /**
     * Set assessorPhonenumber
     *
     * @param integer $assessorPhonenumber
     * @return AssessorInformation
     */
    public function setAssessorPhonenumber($assessorPhonenumber)
    {
        $this->assessorPhonenumber = $assessorPhonenumber;
    
        return $this;
    }

    /**
     * Get assessorPhonenumber
     *
     * @return integer 
     */
    public function getAssessorPhonenumber()
    {
        return $this->assessorPhonenumber;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AssessorInformation
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set facilityMfl
     *
     * @param string $facilityMfl
     * @return AssessorInformation
     */
    public function setFacilityMfl($facilityMfl)
    {
        $this->facilityMfl = $facilityMfl;
    
        return $this;
    }

    /**
     * Get facilityMfl
     *
     * @return string 
     */
    public function getFacilityMfl()
    {
        return $this->facilityMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return AssessorInformation
     */
    public function setSsId($ssId)
    {
        $this->ssId = $ssId;
    
        return $this;
    }

    /**
     * Get ssId
     *
     * @return integer 
     */
    public function getSsId()
    {
        return $this->ssId;
    }
}