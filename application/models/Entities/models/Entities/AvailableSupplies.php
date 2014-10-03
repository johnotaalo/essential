<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvailableSupplies
 *
 * @ORM\Table(name="available_supplies")
 * @ORM\Entity
 */
class AvailableSupplies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="as_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $asId;

    /**
     * @var string
     *
     * @ORM\Column(name="as_availability", type="string", length=45, nullable=false)
     */
    private $asAvailability;

    /**
     * @var string
     *
     * @ORM\Column(name="as_location", type="string", length=255, nullable=false)
     */
    private $asLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="as_quantity", type="integer", nullable=true)
     */
    private $asQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="as_reason_unavailable", type="string", length=45, nullable=true)
     */
    private $asReasonUnavailable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="as_created", type="datetime", nullable=false)
     */
    private $asCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="supply_code", type="string", length=11, nullable=false)
     */
    private $supplyCode;

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
     * Get asId
     *
     * @return integer 
     */
    public function getAsId()
    {
        return $this->asId;
    }

    /**
     * Set asAvailability
     *
     * @param string $asAvailability
     * @return AvailableSupplies
     */
    public function setAsAvailability($asAvailability)
    {
        $this->asAvailability = $asAvailability;
    
        return $this;
    }

    /**
     * Get asAvailability
     *
     * @return string 
     */
    public function getAsAvailability()
    {
        return $this->asAvailability;
    }

    /**
     * Set asLocation
     *
     * @param string $asLocation
     * @return AvailableSupplies
     */
    public function setAsLocation($asLocation)
    {
        $this->asLocation = $asLocation;
    
        return $this;
    }

    /**
     * Get asLocation
     *
     * @return string 
     */
    public function getAsLocation()
    {
        return $this->asLocation;
    }

    /**
     * Set asQuantity
     *
     * @param integer $asQuantity
     * @return AvailableSupplies
     */
    public function setAsQuantity($asQuantity)
    {
        $this->asQuantity = $asQuantity;
    
        return $this;
    }

    /**
     * Get asQuantity
     *
     * @return integer 
     */
    public function getAsQuantity()
    {
        return $this->asQuantity;
    }

    /**
     * Set asReasonUnavailable
     *
     * @param string $asReasonUnavailable
     * @return AvailableSupplies
     */
    public function setAsReasonUnavailable($asReasonUnavailable)
    {
        $this->asReasonUnavailable = $asReasonUnavailable;
    
        return $this;
    }

    /**
     * Get asReasonUnavailable
     *
     * @return string 
     */
    public function getAsReasonUnavailable()
    {
        return $this->asReasonUnavailable;
    }

    /**
     * Set asCreated
     *
     * @param \DateTime $asCreated
     * @return AvailableSupplies
     */
    public function setAsCreated($asCreated)
    {
        $this->asCreated = $asCreated;
    
        return $this;
    }

    /**
     * Get asCreated
     *
     * @return \DateTime 
     */
    public function getAsCreated()
    {
        return $this->asCreated;
    }

    /**
     * Set supplyCode
     *
     * @param string $supplyCode
     * @return AvailableSupplies
     */
    public function setSupplyCode($supplyCode)
    {
        $this->supplyCode = $supplyCode;
    
        return $this;
    }

    /**
     * Get supplyCode
     *
     * @return string 
     */
    public function getSupplyCode()
    {
        return $this->supplyCode;
    }

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     * @return AvailableSupplies
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
     * @return AvailableSupplies
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
     * @return AvailableSupplies
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