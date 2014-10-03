<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogSupplyStockOuts
 *
 * @ORM\Table(name="log_supply_stock_outs")
 * @ORM\Entity
 */
class LogSupplyStockOuts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lsso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lssoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="lsso_usage", type="integer", nullable=false)
     */
    private $lssoUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="lsso_unavailable_times", type="string", length=55, nullable=false)
     */
    private $lssoUnavailableTimes;

    /**
     * @var string
     *
     * @ORM\Column(name="lsso_option_on_outage", type="string", length=25, nullable=true)
     */
    private $lssoOptionOnOutage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var string
     *
     * @ORM\Column(name="supply_code", type="string", length=11, nullable=false)
     */
    private $supplyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=55, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get lssoId
     *
     * @return integer 
     */
    public function getLssoId()
    {
        return $this->lssoId;
    }

    /**
     * Set lssoUsage
     *
     * @param integer $lssoUsage
     * @return LogSupplyStockOuts
     */
    public function setLssoUsage($lssoUsage)
    {
        $this->lssoUsage = $lssoUsage;
    
        return $this;
    }

    /**
     * Get lssoUsage
     *
     * @return integer 
     */
    public function getLssoUsage()
    {
        return $this->lssoUsage;
    }

    /**
     * Set lssoUnavailableTimes
     *
     * @param string $lssoUnavailableTimes
     * @return LogSupplyStockOuts
     */
    public function setLssoUnavailableTimes($lssoUnavailableTimes)
    {
        $this->lssoUnavailableTimes = $lssoUnavailableTimes;
    
        return $this;
    }

    /**
     * Get lssoUnavailableTimes
     *
     * @return string 
     */
    public function getLssoUnavailableTimes()
    {
        return $this->lssoUnavailableTimes;
    }

    /**
     * Set lssoOptionOnOutage
     *
     * @param string $lssoOptionOnOutage
     * @return LogSupplyStockOuts
     */
    public function setLssoOptionOnOutage($lssoOptionOnOutage)
    {
        $this->lssoOptionOnOutage = $lssoOptionOnOutage;
    
        return $this;
    }

    /**
     * Get lssoOptionOnOutage
     *
     * @return string 
     */
    public function getLssoOptionOnOutage()
    {
        return $this->lssoOptionOnOutage;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return LogSupplyStockOuts
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    
        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set supplyCode
     *
     * @param string $supplyCode
     * @return LogSupplyStockOuts
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
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogSupplyStockOuts
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
     * @return LogSupplyStockOuts
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