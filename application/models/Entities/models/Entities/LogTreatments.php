<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogTreatments
 *
 * @ORM\Table(name="log_treatments")
 * @ORM\Entity
 */
class LogTreatments
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
     * @var integer
     *
     * @ORM\Column(name="lt_total", type="integer", nullable=true)
     */
    private $ltTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="lt_classification", type="string", length=255, nullable=true)
     */
    private $ltClassification;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lt_created", type="datetime", nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="lt_other_treatment", type="text", nullable=true)
     */
    private $ltOtherTreatment;

    /**
     * @var string
     *
     * @ORM\Column(name="lt_treatments", type="string", length=255, nullable=false)
     */
    private $ltTreatments;

    /**
     * @var string
     *
     * @ORM\Column(name="lt_other_treatments", type="text", nullable=true)
     */
    private $ltOtherTreatments;

    /**
     * @var string
     *
     * @ORM\Column(name="lt_other_treatments_numbers", type="text", nullable=true)
     */
    private $ltOtherTreatmentsNumbers;


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
     * Set ltTotal
     *
     * @param integer $ltTotal
     * @return LogTreatments
     */
    public function setLtTotal($ltTotal)
    {
        $this->ltTotal = $ltTotal;
    
        return $this;
    }

    /**
     * Get ltTotal
     *
     * @return integer 
     */
    public function getLtTotal()
    {
        return $this->ltTotal;
    }

    /**
     * Set ltClassification
     *
     * @param string $ltClassification
     * @return LogTreatments
     */
    public function setLtClassification($ltClassification)
    {
        $this->ltClassification = $ltClassification;
    
        return $this;
    }

    /**
     * Get ltClassification
     *
     * @return string 
     */
    public function getLtClassification()
    {
        return $this->ltClassification;
    }

    /**
     * Set ltCreated
     *
     * @param \DateTime $ltCreated
     * @return LogTreatments
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
     * @return LogTreatments
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
     * @return LogTreatments
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
     * @return LogTreatments
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
     * Set ltOtherTreatment
     *
     * @param string $ltOtherTreatment
     * @return LogTreatments
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
     * Set ltTreatments
     *
     * @param string $ltTreatments
     * @return LogTreatments
     */
    public function setLtTreatments($ltTreatments)
    {
        $this->ltTreatments = $ltTreatments;
    
        return $this;
    }

    /**
     * Get ltTreatments
     *
     * @return string 
     */
    public function getLtTreatments()
    {
        return $this->ltTreatments;
    }

    /**
     * Set ltOtherTreatments
     *
     * @param string $ltOtherTreatments
     * @return LogTreatments
     */
    public function setLtOtherTreatments($ltOtherTreatments)
    {
        $this->ltOtherTreatments = $ltOtherTreatments;
    
        return $this;
    }

    /**
     * Get ltOtherTreatments
     *
     * @return string 
     */
    public function getLtOtherTreatments()
    {
        return $this->ltOtherTreatments;
    }

    /**
     * Set ltOtherTreatmentsNumbers
     *
     * @param string $ltOtherTreatmentsNumbers
     * @return LogTreatments
     */
    public function setLtOtherTreatmentsNumbers($ltOtherTreatmentsNumbers)
    {
        $this->ltOtherTreatmentsNumbers = $ltOtherTreatmentsNumbers;
    
        return $this;
    }

    /**
     * Get ltOtherTreatmentsNumbers
     *
     * @return string 
     */
    public function getLtOtherTreatmentsNumbers()
    {
        return $this->ltOtherTreatmentsNumbers;
    }
}