<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvailableResources
 *
 * @ORM\Table(name="available_resources")
 * @ORM\Entity
 */
class AvailableResources
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ar_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $arId;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_availability", type="string", length=45, nullable=false)
     */
    private $arAvailability;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_location", type="string", length=255, nullable=false)
     */
    private $arLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="ar_quantity", type="integer", nullable=false)
     */
    private $arQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_reason_unavailable", type="string", length=45, nullable=false)
     */
    private $arReasonUnavailable;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_code", type="string", length=11, nullable=false)
     */
    private $eqCode;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_code", type="string", length=55, nullable=false)
     */
    private $supplierCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ar_created", type="datetime", nullable=false)
     */
    private $arCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=11, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get arId
     *
     * @return integer 
     */
    public function getArId()
    {
        return $this->arId;
    }

    /**
     * Set arAvailability
     *
     * @param string $arAvailability
     * @return AvailableResources
     */
    public function setArAvailability($arAvailability)
    {
        $this->arAvailability = $arAvailability;
    
        return $this;
    }

    /**
     * Get arAvailability
     *
     * @return string 
     */
    public function getArAvailability()
    {
        return $this->arAvailability;
    }

    /**
     * Set arLocation
     *
     * @param string $arLocation
     * @return AvailableResources
     */
    public function setArLocation($arLocation)
    {
        $this->arLocation = $arLocation;
    
        return $this;
    }

    /**
     * Get arLocation
     *
     * @return string 
     */
    public function getArLocation()
    {
        return $this->arLocation;
    }

    /**
     * Set arQuantity
     *
     * @param integer $arQuantity
     * @return AvailableResources
     */
    public function setArQuantity($arQuantity)
    {
        $this->arQuantity = $arQuantity;
    
        return $this;
    }

    /**
     * Get arQuantity
     *
     * @return integer 
     */
    public function getArQuantity()
    {
        return $this->arQuantity;
    }

    /**
     * Set arReasonUnavailable
     *
     * @param string $arReasonUnavailable
     * @return AvailableResources
     */
    public function setArReasonUnavailable($arReasonUnavailable)
    {
        $this->arReasonUnavailable = $arReasonUnavailable;
    
        return $this;
    }

    /**
     * Get arReasonUnavailable
     *
     * @return string 
     */
    public function getArReasonUnavailable()
    {
        return $this->arReasonUnavailable;
    }

    /**
     * Set eqCode
     *
     * @param string $eqCode
     * @return AvailableResources
     */
    public function setEqCode($eqCode)
    {
        $this->eqCode = $eqCode;
    
        return $this;
    }

    /**
     * Get eqCode
     *
     * @return string 
     */
    public function getEqCode()
    {
        return $this->eqCode;
    }

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     * @return AvailableResources
     */
    public function setSupplierCode($supplierCode)
    {
        $this->supplierCode = $supplierCode;
    
        return $this;
    }

    /**
     * Get supplierCode
     *
     * @return string 
     */
    public function getSupplierCode()
    {
        return $this->supplierCode;
    }

    /**
     * Set arCreated
     *
     * @param \DateTime $arCreated
     * @return AvailableResources
     */
    public function setArCreated($arCreated)
    {
        $this->arCreated = $arCreated;
    
        return $this;
    }

    /**
     * Get arCreated
     *
     * @return \DateTime 
     */
    public function getArCreated()
    {
        return $this->arCreated;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return AvailableResources
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
     * Set ssId
     *
     * @param integer $ssId
     * @return AvailableResources
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