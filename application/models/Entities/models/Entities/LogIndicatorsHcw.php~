<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogIndicatorsHcw
 *
 * @ORM\Table(name="log_indicators_hcw")
 * @ORM\Entity
 */
class LogIndicatorsHcw
{
    /**
     * @var integer
     *
     * @ORM\Column(name="li_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $liId;

    /**
     * @var string
     *
     * @ORM\Column(name="li_response", type="string", length=6, nullable=true)
     */
    private $liResponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="li_created", type="datetime", nullable=false)
     */
    private $liCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="indicator_code", type="string", length=8, nullable=true)
     */
    private $indicatorCode;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=11, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="hcw_id", type="integer", nullable=true)
     */
    private $hcwId;

    /**
     * @var string
     *
     * @ORM\Column(name="li_hcwResponse", type="string", length=45, nullable=true)
     */
    private $liHcwresponse;

    /**
     * @var string
     *
     * @ORM\Column(name="li_assessorResponse", type="string", length=45, nullable=true)
     */
    private $liAssessorresponse;

    /**
     * @var string
     *
     * @ORM\Column(name="li_hcwFindings", type="string", length=45, nullable=true)
     */
    private $liHcwfindings;

    /**
     * @var string
     *
     * @ORM\Column(name="li_assessorFindings", type="string", length=45, nullable=true)
     */
    private $liAssessorfindings;

    /**
     * @var string
     *
     * @ORM\Column(name="li_treatments", type="string", length=45, nullable=true)
     */
    private $liTreatments;


    /**
     * Get liId
     *
     * @return integer 
     */
    public function getLiId()
    {
        return $this->liId;
    }

    /**
     * Set liResponse
     *
     * @param string $liResponse
     * @return LogIndicatorsHcw
     */
    public function setLiResponse($liResponse)
    {
        $this->liResponse = $liResponse;
    
        return $this;
    }

    /**
     * Get liResponse
     *
     * @return string 
     */
    public function getLiResponse()
    {
        return $this->liResponse;
    }

    /**
     * Set liCreated
     *
     * @param \DateTime $liCreated
     * @return LogIndicatorsHcw
     */
    public function setLiCreated($liCreated)
    {
        $this->liCreated = $liCreated;
    
        return $this;
    }

    /**
     * Get liCreated
     *
     * @return \DateTime 
     */
    public function getLiCreated()
    {
        return $this->liCreated;
    }

    /**
     * Set indicatorCode
     *
     * @param string $indicatorCode
     * @return LogIndicatorsHcw
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
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogIndicatorsHcw
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
     * Set hcwId
     *
     * @param integer $hcwId
     * @return LogIndicatorsHcw
     */
    public function setHcwId($hcwId)
    {
        $this->hcwId = $hcwId;
    
        return $this;
    }

    /**
     * Get hcwId
     *
     * @return integer 
     */
    public function getHcwId()
    {
        return $this->hcwId;
    }

    /**
     * Set liHcwresponse
     *
     * @param string $liHcwresponse
     * @return LogIndicatorsHcw
     */
    public function setLiHcwresponse($liHcwresponse)
    {
        $this->liHcwresponse = $liHcwresponse;
    
        return $this;
    }

    /**
     * Get liHcwresponse
     *
     * @return string 
     */
    public function getLiHcwresponse()
    {
        return $this->liHcwresponse;
    }

    /**
     * Set liAssessorresponse
     *
     * @param string $liAssessorresponse
     * @return LogIndicatorsHcw
     */
    public function setLiAssessorresponse($liAssessorresponse)
    {
        $this->liAssessorresponse = $liAssessorresponse;
    
        return $this;
    }

    /**
     * Get liAssessorresponse
     *
     * @return string 
     */
    public function getLiAssessorresponse()
    {
        return $this->liAssessorresponse;
    }

    /**
     * Set liHcwfindings
     *
     * @param string $liHcwfindings
     * @return LogIndicatorsHcw
     */
    public function setLiHcwfindings($liHcwfindings)
    {
        $this->liHcwfindings = $liHcwfindings;
    
        return $this;
    }

    /**
     * Get liHcwfindings
     *
     * @return string 
     */
    public function getLiHcwfindings()
    {
        return $this->liHcwfindings;
    }

    /**
     * Set liAssessorfindings
     *
     * @param string $liAssessorfindings
     * @return LogIndicatorsHcw
     */
    public function setLiAssessorfindings($liAssessorfindings)
    {
        $this->liAssessorfindings = $liAssessorfindings;
    
        return $this;
    }

    /**
     * Get liAssessorfindings
     *
     * @return string 
     */
    public function getLiAssessorfindings()
    {
        return $this->liAssessorfindings;
    }

    /**
     * Set liTreatments
     *
     * @param string $liTreatments
     * @return LogIndicatorsHcw
     */
    public function setLiTreatments($liTreatments)
    {
        $this->liTreatments = $liTreatments;
    
        return $this;
    }

    /**
     * Get liTreatments
     *
     * @return string 
     */
    public function getLiTreatments()
    {
        return $this->liTreatments;
    }
}