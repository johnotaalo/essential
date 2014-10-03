<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogCommodityStockOuts
 *
 * @ORM\Table(name="log_commodity_stock_outs")
 * @ORM\Entity
 */
class LogCommodityStockOuts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lcso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lcsoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="lcso_usage", type="integer", nullable=false)
     */
    private $lcsoUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="lcso_unavailable_times", type="string", length=55, nullable=false)
     */
    private $lcsoUnavailableTimes;

    /**
     * @var string
     *
     * @ORM\Column(name="lcso_option_on_outage", type="string", length=25, nullable=true)
     */
    private $lcsoOptionOnOutage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lcso_created", type="datetime", nullable=false)
     */
    private $lcsoCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_id", type="string", length=11, nullable=false)
     */
    private $commId;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_id", type="string", length=55, nullable=false)
     */
    private $facId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get lcsoId
     *
     * @return integer 
     */
    public function getLcsoId()
    {
        return $this->lcsoId;
    }

    /**
     * Set lcsoUsage
     *
     * @param integer $lcsoUsage
     * @return LogCommodityStockOuts
     */
    public function setLcsoUsage($lcsoUsage)
    {
        $this->lcsoUsage = $lcsoUsage;
    
        return $this;
    }

    /**
     * Get lcsoUsage
     *
     * @return integer 
     */
    public function getLcsoUsage()
    {
        return $this->lcsoUsage;
    }

    /**
     * Set lcsoUnavailableTimes
     *
     * @param string $lcsoUnavailableTimes
     * @return LogCommodityStockOuts
     */
    public function setLcsoUnavailableTimes($lcsoUnavailableTimes)
    {
        $this->lcsoUnavailableTimes = $lcsoUnavailableTimes;
    
        return $this;
    }

    /**
     * Get lcsoUnavailableTimes
     *
     * @return string 
     */
    public function getLcsoUnavailableTimes()
    {
        return $this->lcsoUnavailableTimes;
    }

    /**
     * Set lcsoOptionOnOutage
     *
     * @param string $lcsoOptionOnOutage
     * @return LogCommodityStockOuts
     */
    public function setLcsoOptionOnOutage($lcsoOptionOnOutage)
    {
        $this->lcsoOptionOnOutage = $lcsoOptionOnOutage;
    
        return $this;
    }

    /**
     * Get lcsoOptionOnOutage
     *
     * @return string 
     */
    public function getLcsoOptionOnOutage()
    {
        return $this->lcsoOptionOnOutage;
    }

    /**
     * Set lcsoCreated
     *
     * @param \DateTime $lcsoCreated
     * @return LogCommodityStockOuts
     */
    public function setLcsoCreated($lcsoCreated)
    {
        $this->lcsoCreated = $lcsoCreated;
    
        return $this;
    }

    /**
     * Get lcsoCreated
     *
     * @return \DateTime 
     */
    public function getLcsoCreated()
    {
        return $this->lcsoCreated;
    }

    /**
     * Set commId
     *
     * @param string $commId
     * @return LogCommodityStockOuts
     */
    public function setCommId($commId)
    {
        $this->commId = $commId;
    
        return $this;
    }

    /**
     * Get commId
     *
     * @return string 
     */
    public function getCommId()
    {
        return $this->commId;
    }

    /**
     * Set facId
     *
     * @param string $facId
     * @return LogCommodityStockOuts
     */
    public function setFacId($facId)
    {
        $this->facId = $facId;
    
        return $this;
    }

    /**
     * Get facId
     *
     * @return string 
     */
    public function getFacId()
    {
        return $this->facId;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return LogCommodityStockOuts
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