<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvailableEquipments
 *
 * @ORM\Table(name="available_equipments")
 * @ORM\Entity
 */
class AvailableEquipments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ae_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aeId;

    /**
     * @var string
     *
     * @ORM\Column(name="ae_availability", type="string", length=45, nullable=false)
     */
    private $aeAvailability;

    /**
     * @var string
     *
     * @ORM\Column(name="ae_location", type="string", length=255, nullable=false)
     */
    private $aeLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="ae_fully_functional", type="integer", nullable=false)
     */
    private $aeFullyFunctional;

    /**
     * @var integer
     *
     * @ORM\Column(name="ae_partially_functional", type="integer", nullable=false)
     */
    private $aePartiallyFunctional;

    /**
     * @var integer
     *
     * @ORM\Column(name="ae_non_functional", type="integer", nullable=false)
     */
    private $aeNonFunctional;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ae_created", type="datetime", nullable=false)
     */
    private $aeCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=11, nullable=false)
     */
    private $facMfl;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_code", type="string", length=55, nullable=false)
     */
    private $eqCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get aeId
     *
     * @return integer 
     */
    public function getAeId()
    {
        return $this->aeId;
    }

    /**
     * Set aeAvailability
     *
     * @param string $aeAvailability
     * @return AvailableEquipments
     */
    public function setAeAvailability($aeAvailability)
    {
        $this->aeAvailability = $aeAvailability;
    
        return $this;
    }

    /**
     * Get aeAvailability
     *
     * @return string 
     */
    public function getAeAvailability()
    {
        return $this->aeAvailability;
    }

    /**
     * Set aeLocation
     *
     * @param string $aeLocation
     * @return AvailableEquipments
     */
    public function setAeLocation($aeLocation)
    {
        $this->aeLocation = $aeLocation;
    
        return $this;
    }

    /**
     * Get aeLocation
     *
     * @return string 
     */
    public function getAeLocation()
    {
        return $this->aeLocation;
    }

    /**
     * Set aeFullyFunctional
     *
     * @param integer $aeFullyFunctional
     * @return AvailableEquipments
     */
    public function setAeFullyFunctional($aeFullyFunctional)
    {
        $this->aeFullyFunctional = $aeFullyFunctional;
    
        return $this;
    }

    /**
     * Get aeFullyFunctional
     *
     * @return integer 
     */
    public function getAeFullyFunctional()
    {
        return $this->aeFullyFunctional;
    }

    /**
     * Set aePartiallyFunctional
     *
     * @param integer $aePartiallyFunctional
     * @return AvailableEquipments
     */
    public function setAePartiallyFunctional($aePartiallyFunctional)
    {
        $this->aePartiallyFunctional = $aePartiallyFunctional;
    
        return $this;
    }

    /**
     * Get aePartiallyFunctional
     *
     * @return integer 
     */
    public function getAePartiallyFunctional()
    {
        return $this->aePartiallyFunctional;
    }

    /**
     * Set aeNonFunctional
     *
     * @param integer $aeNonFunctional
     * @return AvailableEquipments
     */
    public function setAeNonFunctional($aeNonFunctional)
    {
        $this->aeNonFunctional = $aeNonFunctional;
    
        return $this;
    }

    /**
     * Get aeNonFunctional
     *
     * @return integer 
     */
    public function getAeNonFunctional()
    {
        return $this->aeNonFunctional;
    }

    /**
     * Set aeCreated
     *
     * @param \DateTime $aeCreated
     * @return AvailableEquipments
     */
    public function setAeCreated($aeCreated)
    {
        $this->aeCreated = $aeCreated;
    
        return $this;
    }

    /**
     * Get aeCreated
     *
     * @return \DateTime 
     */
    public function getAeCreated()
    {
        return $this->aeCreated;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return AvailableEquipments
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
     * Set eqCode
     *
     * @param string $eqCode
     * @return AvailableEquipments
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
     * Set ssId
     *
     * @param integer $ssId
     * @return AvailableEquipments
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