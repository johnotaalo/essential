<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommunityStrategies
 *
 * @ORM\Table(name="community_strategies")
 * @ORM\Entity
 */
class CommunityStrategies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $csId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cs_response", type="integer", nullable=false)
     */
    private $csResponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cs_created", type="datetime", nullable=false)
     */
    private $csCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="strategy_code", type="string", length=45, nullable=false)
     */
    private $strategyCode;

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
     * Get csId
     *
     * @return integer 
     */
    public function getCsId()
    {
        return $this->csId;
    }

    /**
     * Set csResponse
     *
     * @param integer $csResponse
     * @return CommunityStrategies
     */
    public function setCsResponse($csResponse)
    {
        $this->csResponse = $csResponse;
    
        return $this;
    }

    /**
     * Get csResponse
     *
     * @return integer 
     */
    public function getCsResponse()
    {
        return $this->csResponse;
    }

    /**
     * Set csCreated
     *
     * @param \DateTime $csCreated
     * @return CommunityStrategies
     */
    public function setCsCreated($csCreated)
    {
        $this->csCreated = $csCreated;
    
        return $this;
    }

    /**
     * Get csCreated
     *
     * @return \DateTime 
     */
    public function getCsCreated()
    {
        return $this->csCreated;
    }

    /**
     * Set strategyCode
     *
     * @param string $strategyCode
     * @return CommunityStrategies
     */
    public function setStrategyCode($strategyCode)
    {
        $this->strategyCode = $strategyCode;
    
        return $this;
    }

    /**
     * Get strategyCode
     *
     * @return string 
     */
    public function getStrategyCode()
    {
        return $this->strategyCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return CommunityStrategies
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
     * @return CommunityStrategies
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