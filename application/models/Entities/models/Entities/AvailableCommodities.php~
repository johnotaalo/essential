<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvailableCommodities
 *
 * @ORM\Table(name="available_commodities")
 * @ORM\Entity
 */
class AvailableCommodities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ac_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acId;

    /**
     * @var string
     *
     * @ORM\Column(name="ac_availability", type="string", length=45, nullable=false)
     */
    private $acAvailability;

    /**
     * @var string
     *
     * @ORM\Column(name="ac_location", type="string", length=255, nullable=false)
     */
    private $acLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="ac_quantity", type="integer", nullable=false)
     */
    private $acQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="ac_reason_unavailable", type="string", length=45, nullable=false)
     */
    private $acReasonUnavailable;

    /**
     * @var string
     *
     * @ORM\Column(name="ac_expiry_date", type="text", nullable=true)
     */
    private $acExpiryDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ac_created", type="datetime", nullable=false)
     */
    private $acCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_code", type="string", length=11, nullable=false)
     */
    private $commCode;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_code", type="string", length=55, nullable=false)
     */
    private $supplierCode;

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
     * Get acId
     *
     * @return integer 
     */
    public function getAcId()
    {
        return $this->acId;
    }

    /**
     * Set acAvailability
     *
     * @param string $acAvailability
     * @return AvailableCommodities
     */
    public function setAcAvailability($acAvailability)
    {
        $this->acAvailability = $acAvailability;
    
        return $this;
    }

    /**
     * Get acAvailability
     *
     * @return string 
     */
    public function getAcAvailability()
    {
        return $this->acAvailability;
    }

    /**
     * Set acLocation
     *
     * @param string $acLocation
     * @return AvailableCommodities
     */
    public function setAcLocation($acLocation)
    {
        $this->acLocation = $acLocation;
    
        return $this;
    }

    /**
     * Get acLocation
     *
     * @return string 
     */
    public function getAcLocation()
    {
        return $this->acLocation;
    }

    /**
     * Set acQuantity
     *
     * @param integer $acQuantity
     * @return AvailableCommodities
     */
    public function setAcQuantity($acQuantity)
    {
        $this->acQuantity = $acQuantity;
    
        return $this;
    }

    /**
     * Get acQuantity
     *
     * @return integer 
     */
    public function getAcQuantity()
    {
        return $this->acQuantity;
    }

    /**
     * Set acReasonUnavailable
     *
     * @param string $acReasonUnavailable
     * @return AvailableCommodities
     */
    public function setAcReasonUnavailable($acReasonUnavailable)
    {
        $this->acReasonUnavailable = $acReasonUnavailable;
    
        return $this;
    }

    /**
     * Get acReasonUnavailable
     *
     * @return string 
     */
    public function getAcReasonUnavailable()
    {
        return $this->acReasonUnavailable;
    }

    /**
     * Set acExpiryDate
     *
     * @param string $acExpiryDate
     * @return AvailableCommodities
     */
    public function setAcExpiryDate($acExpiryDate)
    {
        $this->acExpiryDate = $acExpiryDate;
    
        return $this;
    }

    /**
     * Get acExpiryDate
     *
     * @return string 
     */
    public function getAcExpiryDate()
    {
        return $this->acExpiryDate;
    }

    /**
     * Set acCreated
     *
     * @param \DateTime $acCreated
     * @return AvailableCommodities
     */
    public function setAcCreated($acCreated)
    {
        $this->acCreated = $acCreated;
    
        return $this;
    }

    /**
     * Get acCreated
     *
     * @return \DateTime 
     */
    public function getAcCreated()
    {
        return $this->acCreated;
    }

    /**
     * Set commCode
     *
     * @param string $commCode
     * @return AvailableCommodities
     */
    public function setCommCode($commCode)
    {
        $this->commCode = $commCode;
    
        return $this;
    }

    /**
     * Get commCode
     *
     * @return string 
     */
    public function getCommCode()
    {
        return $this->commCode;
    }

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     * @return AvailableCommodities
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
     * Set facMfl
     *
     * @param string $facMfl
     * @return AvailableCommodities
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
     * @return AvailableCommodities
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