<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogUsageStockOut
 *
 * @ORM\Table(name="log_usage_stock_out")
 * @ORM\Entity
 */
class LogUsageStockOut
{
    /**
     * @var integer
     *
     * @ORM\Column(name="luso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lusoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="losu_usage", type="integer", nullable=false)
     */
    private $losuUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="losu_unavailable_times", type="string", length=55, nullable=false)
     */
    private $losuUnavailableTimes;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_code", type="string", length=11, nullable=false)
     */
    private $commCode;

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
     * Get lusoId
     *
     * @return integer 
     */
    public function getLusoId()
    {
        return $this->lusoId;
    }

    /**
     * Set losuUsage
     *
     * @param integer $losuUsage
     * @return LogUsageStockOut
     */
    public function setLosuUsage($losuUsage)
    {
        $this->losuUsage = $losuUsage;
    
        return $this;
    }

    /**
     * Get losuUsage
     *
     * @return integer 
     */
    public function getLosuUsage()
    {
        return $this->losuUsage;
    }

    /**
     * Set losuUnavailableTimes
     *
     * @param string $losuUnavailableTimes
     * @return LogUsageStockOut
     */
    public function setLosuUnavailableTimes($losuUnavailableTimes)
    {
        $this->losuUnavailableTimes = $losuUnavailableTimes;
    
        return $this;
    }

    /**
     * Get losuUnavailableTimes
     *
     * @return string 
     */
    public function getLosuUnavailableTimes()
    {
        return $this->losuUnavailableTimes;
    }

    /**
     * Set commCode
     *
     * @param string $commCode
     * @return LogUsageStockOut
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
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogUsageStockOut
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
     * @return LogUsageStockOut
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
