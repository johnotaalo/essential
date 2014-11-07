<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facilities
 *
 * @ORM\Table(name="facilities")
 * @ORM\Entity
 */
class Facilities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fac_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $facId;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=45, nullable=false)
     */
    private $facMfl;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_name", type="string", length=150, nullable=false)
     */
    private $facName;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_type", type="string", length=55, nullable=true)
     */
    private $facType;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_level", type="string", length=45, nullable=true)
     */
    private $facLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_province", type="string", length=45, nullable=true)
     */
    private $facProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_district", type="string", length=45, nullable=true)
     */
    private $facDistrict;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_county", type="string", length=45, nullable=true)
     */
    private $facCounty;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_ownership", type="string", length=255, nullable=true)
     */
    private $facOwnership;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_incharge_contact_person", type="string", length=45, nullable=true)
     */
    private $facInchargeContactPerson;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_incharge_email", type="string", length=100, nullable=true)
     */
    private $facInchargeEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_incharge_telephone", type="string", length=55, nullable=true)
     */
    private $facInchargeTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mch_contact_person", type="string", length=45, nullable=true)
     */
    private $facMchContactPerson;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mch_email", type="string", length=100, nullable=true)
     */
    private $facMchEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mch_telephone", type="string", length=55, nullable=true)
     */
    private $facMchTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_maternity_contact_person", type="string", length=45, nullable=true)
     */
    private $facMaternityContactPerson;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_maternity_email", type="string", length=100, nullable=true)
     */
    private $facMaternityEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_maternity_telephone", type="string", length=55, nullable=true)
     */
    private $facMaternityTelephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fac_created", type="datetime", nullable=false)
     */
    private $facCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fac_updated", type="datetime", nullable=true)
     */
    private $facUpdated;


    /**
     * Get facId
     *
     * @return integer 
     */
    public function getFacId()
    {
        return $this->facId;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return Facilities
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
     * Set facName
     *
     * @param string $facName
     * @return Facilities
     */
    public function setFacName($facName)
    {
        $this->facName = $facName;
    
        return $this;
    }

    /**
     * Get facName
     *
     * @return string 
     */
    public function getFacName()
    {
        return $this->facName;
    }

    /**
     * Set facType
     *
     * @param string $facType
     * @return Facilities
     */
    public function setFacType($facType)
    {
        $this->facType = $facType;
    
        return $this;
    }

    /**
     * Get facType
     *
     * @return string 
     */
    public function getFacType()
    {
        return $this->facType;
    }

    /**
     * Set facLevel
     *
     * @param string $facLevel
     * @return Facilities
     */
    public function setFacLevel($facLevel)
    {
        $this->facLevel = $facLevel;
    
        return $this;
    }

    /**
     * Get facLevel
     *
     * @return string 
     */
    public function getFacLevel()
    {
        return $this->facLevel;
    }

    /**
     * Set facProvince
     *
     * @param string $facProvince
     * @return Facilities
     */
    public function setFacProvince($facProvince)
    {
        $this->facProvince = $facProvince;
    
        return $this;
    }

    /**
     * Get facProvince
     *
     * @return string 
     */
    public function getFacProvince()
    {
        return $this->facProvince;
    }

    /**
     * Set facDistrict
     *
     * @param string $facDistrict
     * @return Facilities
     */
    public function setFacDistrict($facDistrict)
    {
        $this->facDistrict = $facDistrict;
    
        return $this;
    }

    /**
     * Get facDistrict
     *
     * @return string 
     */
    public function getFacDistrict()
    {
        return $this->facDistrict;
    }

    /**
     * Set facCounty
     *
     * @param string $facCounty
     * @return Facilities
     */
    public function setFacCounty($facCounty)
    {
        $this->facCounty = $facCounty;
    
        return $this;
    }

    /**
     * Get facCounty
     *
     * @return string 
     */
    public function getFacCounty()
    {
        return $this->facCounty;
    }

    /**
     * Set facOwnership
     *
     * @param string $facOwnership
     * @return Facilities
     */
    public function setFacOwnership($facOwnership)
    {
        $this->facOwnership = $facOwnership;
    
        return $this;
    }

    /**
     * Get facOwnership
     *
     * @return string 
     */
    public function getFacOwnership()
    {
        return $this->facOwnership;
    }

    /**
     * Set facInchargeContactPerson
     *
     * @param string $facInchargeContactPerson
     * @return Facilities
     */
    public function setFacInchargeContactPerson($facInchargeContactPerson)
    {
        $this->facInchargeContactPerson = $facInchargeContactPerson;
    
        return $this;
    }

    /**
     * Get facInchargeContactPerson
     *
     * @return string 
     */
    public function getFacInchargeContactPerson()
    {
        return $this->facInchargeContactPerson;
    }

    /**
     * Set facInchargeEmail
     *
     * @param string $facInchargeEmail
     * @return Facilities
     */
    public function setFacInchargeEmail($facInchargeEmail)
    {
        $this->facInchargeEmail = $facInchargeEmail;
    
        return $this;
    }

    /**
     * Get facInchargeEmail
     *
     * @return string 
     */
    public function getFacInchargeEmail()
    {
        return $this->facInchargeEmail;
    }

    /**
     * Set facInchargeTelephone
     *
     * @param string $facInchargeTelephone
     * @return Facilities
     */
    public function setFacInchargeTelephone($facInchargeTelephone)
    {
        $this->facInchargeTelephone = $facInchargeTelephone;
    
        return $this;
    }

    /**
     * Get facInchargeTelephone
     *
     * @return string 
     */
    public function getFacInchargeTelephone()
    {
        return $this->facInchargeTelephone;
    }

    /**
     * Set facMchContactPerson
     *
     * @param string $facMchContactPerson
     * @return Facilities
     */
    public function setFacMchContactPerson($facMchContactPerson)
    {
        $this->facMchContactPerson = $facMchContactPerson;
    
        return $this;
    }

    /**
     * Get facMchContactPerson
     *
     * @return string 
     */
    public function getFacMchContactPerson()
    {
        return $this->facMchContactPerson;
    }

    /**
     * Set facMchEmail
     *
     * @param string $facMchEmail
     * @return Facilities
     */
    public function setFacMchEmail($facMchEmail)
    {
        $this->facMchEmail = $facMchEmail;
    
        return $this;
    }

    /**
     * Get facMchEmail
     *
     * @return string 
     */
    public function getFacMchEmail()
    {
        return $this->facMchEmail;
    }

    /**
     * Set facMchTelephone
     *
     * @param string $facMchTelephone
     * @return Facilities
     */
    public function setFacMchTelephone($facMchTelephone)
    {
        $this->facMchTelephone = $facMchTelephone;
    
        return $this;
    }

    /**
     * Get facMchTelephone
     *
     * @return string 
     */
    public function getFacMchTelephone()
    {
        return $this->facMchTelephone;
    }

    /**
     * Set facMaternityContactPerson
     *
     * @param string $facMaternityContactPerson
     * @return Facilities
     */
    public function setFacMaternityContactPerson($facMaternityContactPerson)
    {
        $this->facMaternityContactPerson = $facMaternityContactPerson;
    
        return $this;
    }

    /**
     * Get facMaternityContactPerson
     *
     * @return string 
     */
    public function getFacMaternityContactPerson()
    {
        return $this->facMaternityContactPerson;
    }

    /**
     * Set facMaternityEmail
     *
     * @param string $facMaternityEmail
     * @return Facilities
     */
    public function setFacMaternityEmail($facMaternityEmail)
    {
        $this->facMaternityEmail = $facMaternityEmail;
    
        return $this;
    }

    /**
     * Get facMaternityEmail
     *
     * @return string 
     */
    public function getFacMaternityEmail()
    {
        return $this->facMaternityEmail;
    }

    /**
     * Set facMaternityTelephone
     *
     * @param string $facMaternityTelephone
     * @return Facilities
     */
    public function setFacMaternityTelephone($facMaternityTelephone)
    {
        $this->facMaternityTelephone = $facMaternityTelephone;
    
        return $this;
    }

    /**
     * Get facMaternityTelephone
     *
     * @return string 
     */
    public function getFacMaternityTelephone()
    {
        return $this->facMaternityTelephone;
    }

    /**
     * Set facCreated
     *
     * @param \DateTime $facCreated
     * @return Facilities
     */
    public function setFacCreated($facCreated)
    {
        $this->facCreated = $facCreated;
    
        return $this;
    }

    /**
     * Get facCreated
     *
     * @return \DateTime 
     */
    public function getFacCreated()
    {
        return $this->facCreated;
    }

    /**
     * Set facUpdated
     *
     * @param \DateTime $facUpdated
     * @return Facilities
     */
    public function setFacUpdated($facUpdated)
    {
        $this->facUpdated = $facUpdated;
    
        return $this;
    }

    /**
     * Get facUpdated
     *
     * @return \DateTime 
     */
    public function getFacUpdated()
    {
        return $this->facUpdated;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="fac_division", type="string", length=255, nullable=true)
     */
    private $facDivision;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_owner", type="string", length=255, nullable=true)
     */
    private $facOwner;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_location", type="string", length=255, nullable=true)
     */
    private $facLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_sub_location", type="string", length=255, nullable=true)
     */
    private $facSubLocation;


    /**
     * Set facDivision
     *
     * @param string $facDivision
     * @return Facilities
     */
    public function setFacDivision($facDivision)
    {
        $this->facDivision = $facDivision;
    
        return $this;
    }

    /**
     * Get facDivision
     *
     * @return string 
     */
    public function getFacDivision()
    {
        return $this->facDivision;
    }

    /**
     * Set facOwner
     *
     * @param string $facOwner
     * @return Facilities
     */
    public function setFacOwner($facOwner)
    {
        $this->facOwner = $facOwner;
    
        return $this;
    }

    /**
     * Get facOwner
     *
     * @return string 
     */
    public function getFacOwner()
    {
        return $this->facOwner;
    }

    /**
     * Set facLocation
     *
     * @param string $facLocation
     * @return Facilities
     */
    public function setFacLocation($facLocation)
    {
        $this->facLocation = $facLocation;
    
        return $this;
    }

    /**
     * Get facLocation
     *
     * @return string 
     */
    public function getFacLocation()
    {
        return $this->facLocation;
    }

    /**
     * Set facSubLocation
     *
     * @param string $facSubLocation
     * @return Facilities
     */
    public function setFacSubLocation($facSubLocation)
    {
        $this->facSubLocation = $facSubLocation;
    
        return $this;
    }

    /**
     * Get facSubLocation
     *
     * @return string 
     */
    public function getFacSubLocation()
    {
        return $this->facSubLocation;
    }
}