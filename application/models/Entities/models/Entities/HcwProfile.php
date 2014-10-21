<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * HcwProfile
 *
 * @ORM\Table(name="hcw_profile")
 * @ORM\Entity
 */
class HcwProfile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hpId;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_firstName", type="string", length=400, nullable=true)
     */
    private $hpFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_surname", type="string", length=400, nullable=true)
     */
    private $hpSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_nationalID", type="string", length=255, nullable=true)
     */
    private $hpNationalid;

    /**
     * @var integer
     *
     * @ORM\Column(name="hp_phoneNumber", type="integer", nullable=true)
     */
    private $hpPhonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_coordinator", type="string", length=45, nullable=true)
     */
    private $hpCoordinator;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_year", type="string", length=9, nullable=true)
     */
    private $hpYear;

    /**
     * @var string
     *
     * @ORM\Column(name="hp_designation", type="string", length=255, nullable=true)
     */
    private $hpDesignation;

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
     * Get hpId
     *
     * @return integer 
     */
    public function getHpId()
    {
        return $this->hpId;
    }

    /**
     * Set hpFirstname
     *
     * @param string $hpFirstname
     * @return HcwProfile
     */
    public function setHpFirstname($hpFirstname)
    {
        $this->hpFirstname = $hpFirstname;
    
        return $this;
    }

    /**
     * Get hpFirstname
     *
     * @return string 
     */
    public function getHpFirstname()
    {
        return $this->hpFirstname;
    }

    /**
     * Set hpSurname
     *
     * @param string $hpSurname
     * @return HcwProfile
     */
    public function setHpSurname($hpSurname)
    {
        $this->hpSurname = $hpSurname;
    
        return $this;
    }

    /**
     * Get hpSurname
     *
     * @return string 
     */
    public function getHpSurname()
    {
        return $this->hpSurname;
    }

    /**
     * Set hpNationalid
     *
     * @param string $hpNationalid
     * @return HcwProfile
     */
    public function setHpNationalid($hpNationalid)
    {
        $this->hpNationalid = $hpNationalid;
    
        return $this;
    }

    /**
     * Get hpNationalid
     *
     * @return string 
     */
    public function getHpNationalid()
    {
        return $this->hpNationalid;
    }

    /**
     * Set hpPhonenumber
     *
     * @param integer $hpPhonenumber
     * @return HcwProfile
     */
    public function setHpPhonenumber($hpPhonenumber)
    {
        $this->hpPhonenumber = $hpPhonenumber;
    
        return $this;
    }

    /**
     * Get hpPhonenumber
     *
     * @return integer 
     */
    public function getHpPhonenumber()
    {
        return $this->hpPhonenumber;
    }

    /**
     * Set hpCoordinator
     *
     * @param string $hpCoordinator
     * @return HcwProfile
     */
    public function setHpCoordinator($hpCoordinator)
    {
        $this->hpCoordinator = $hpCoordinator;
    
        return $this;
    }

    /**
     * Get hpCoordinator
     *
     * @return string 
     */
    public function getHpCoordinator()
    {
        return $this->hpCoordinator;
    }

    /**
     * Set hpYear
     *
     * @param string $hpYear
     * @return HcwProfile
     */
    public function setHpYear($hpYear)
    {
        $this->hpYear = $hpYear;
    
        return $this;
    }

    /**
     * Get hpYear
     *
     * @return string 
     */
    public function getHpYear()
    {
        return $this->hpYear;
    }

    /**
     * Set hpDesignation
     *
     * @param string $hpDesignation
     * @return HcwProfile
     */
    public function setHpDesignation($hpDesignation)
    {
        $this->hpDesignation = $hpDesignation;
    
        return $this;
    }

    /**
     * Get hpDesignation
     *
     * @return string 
     */
    public function getHpDesignation()
    {
        return $this->hpDesignation;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return HcwProfile
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
     * @return HcwProfile
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
     * @return HcwProfile
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
