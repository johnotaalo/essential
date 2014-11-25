<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indicators
 *
 * @ORM\Table(name="indicators")
 * @ORM\Entity
 */
class Indicators
{
    /**
     * @var integer
     *
     * @ORM\Column(name="indicator_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $indicatorId;

    /**
     * @var string
     *
     * @ORM\Column(name="indicator_name", type="string", length=255, nullable=false)
     */
    private $indicatorName;

    /**
     * @var string
     *
     * @ORM\Column(name="indicator_code", type="string", length=6, nullable=false)
     */
    private $indicatorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="indicator_for", type="string", length=3, nullable=false)
     */
    private $indicatorFor;

    /**
     * @var string
     *
     * @ORM\Column(name="indicator_findings", type="text", nullable=true)
     */
    private $indicatorFindings;


    /**
     * Get indicatorId
     *
     * @return integer 
     */
    public function getIndicatorId()
    {
        return $this->indicatorId;
    }

    /**
     * Set indicatorName
     *
     * @param string $indicatorName
     * @return Indicators
     */
    public function setIndicatorName($indicatorName)
    {
        $this->indicatorName = $indicatorName;
    
        return $this;
    }

    /**
     * Get indicatorName
     *
     * @return string 
     */
    public function getIndicatorName()
    {
        return $this->indicatorName;
    }

    /**
     * Set indicatorCode
     *
     * @param string $indicatorCode
     * @return Indicators
     */
    public function setIndicatorCode($indicatorCode)
    {
        $this->indicatorCode = $indicatorCode;
    
        return $this;
    }

    /**
     * Get indicatorCode
     *
     * @return string 
     */
    public function getIndicatorCode()
    {
        return $this->indicatorCode;
    }

    /**
     * Set indicatorFor
     *
     * @param string $indicatorFor
     * @return Indicators
     */
    public function setIndicatorFor($indicatorFor)
    {
        $this->indicatorFor = $indicatorFor;
    
        return $this;
    }

    /**
     * Get indicatorFor
     *
     * @return string 
     */
    public function getIndicatorFor()
    {
        return $this->indicatorFor;
    }

    /**
     * Set indicatorFindings
     *
     * @param string $indicatorFindings
     * @return Indicators
     */
    public function setIndicatorFindings($indicatorFindings)
    {
        $this->indicatorFindings = $indicatorFindings;
    
        return $this;
    }

    /**
     * Get indicatorFindings
     *
     * @return string 
     */
    public function getIndicatorFindings()
    {
        return $this->indicatorFindings;
    }
}