<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogTreatmentmalnpne
 *
 * @ORM\Table(name="log_treatmentmalnpne")
 * @ORM\Entity
 */
class LogTreatmentmalnpne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ltId;

    /**
     * @var string
     *
     * @ORM\Column(name="lt_other_treatment", type="string", length=255, nullable=true)
     */
    private $ltOtherTreatment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lt_classification", type="boolean", nullable=true)
     */
    private $ltClassification;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lt_created", type="datetime", nullable=false)
     */
    private $ltCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="treatment_code", type="string", length=45, nullable=true)
     */
    private $treatmentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_mfl", type="string", length=11, nullable=true)
     */
    private $facilityMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get ltId
     *
     * @return integer 
     */
    public function getLtId()
    {
        return $this->ltId;
    }

    /**
     * Set ltOtherTreatment
     *
     * @param string $ltOtherTreatment
     * @return LogTreatmentmalnpne
     */
    public function setLtOtherTreatment($ltOtherTreatment)
    {
        $this->ltOtherTreatment = $ltOtherTreatment;
    
        return $this;
    }

    /**
     * Get ltOtherTreatment
     *
     * @return string 
     */
    public function getLtOtherTreatment()
    {
        return $this->ltOtherTreatment;
    }

    /**
     * Set ltClassification
     *
     * @param boolean $ltClassification
     * @return LogTreatmentmalnpne
     */
    public function setLtClassification($ltClassification)
    {
        $this->ltClassification = $ltClassification;
    
        return $this;
    }

    /**
     * Get ltClassification
     *
     * @return boolean 
     */
    public function getLtClassification()
    {
        return $this->ltClassification;
    }

    /**
     * Set ltCreated
     *
     * @param \DateTime $ltCreated
     * @return LogTreatmentmalnpne
     */
    public function setLtCreated($ltCreated)
    {
        $this->ltCreated = $ltCreated;
    
        return $this;
    }

    /**
     * Get ltCreated
     *
     * @return \DateTime 
     */
    public function getLtCreated()
    {
        return $this->ltCreated;
    }

    /**
     * Set treatmentCode
     *
     * @param string $treatmentCode
     * @return LogTreatmentmalnpne
     */
    public function setTreatmentCode($treatmentCode)
    {
        $this->treatmentCode = $treatmentCode;
    
        return $this;
    }

    /**
     * Get treatmentCode
     *
     * @return string 
     */
    public function getTreatmentCode()
    {
        return $this->treatmentCode;
    }

    /**
     * Set facilityMfl
     *
     * @param string $facilityMfl
     * @return LogTreatmentmalnpne
     */
    public function setFacilityMfl($facilityMfl)
    {
        $this->facilityMfl = $facilityMfl;
    
        return $this;
    }

    /**
     * Get facilityMfl
     *
     * @return string 
     */
    public function getFacilityMfl()
    {
        return $this->facilityMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return LogTreatmentmalnpne
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
    /**
     * @var string
     *
     * @ORM\Column(name="lt_code", type="string", length=4, nullable=false)
     */
    private $ltCode;


    /**
     * Set ltCode
     *
     * @param string $ltCode
     * @return LogTreatmentmalnpne
     */
    public function setLtCode($ltCode)
    {
        $this->ltCode = $ltCode;
    
        return $this;
    }

    /**
     * Get ltCode
     *
     * @return string 
     */
    public function getLtCode()
    {
        return $this->ltCode;
    }
}