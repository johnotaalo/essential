<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogTreatment
 *
 * @ORM\Table(name="log_treatment")
 * @ORM\Entity
 */
class LogTreatment
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
     * @var integer
     *
     * @ORM\Column(name="lt_severe_dehydration_number", type="integer", nullable=false)
     */
    private $ltSevereDehydrationNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="lt_some_dehydration_number", type="integer", nullable=false)
     */
    private $ltSomeDehydrationNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="lt_no_dehydration_number", type="integer", nullable=false)
     */
    private $ltNoDehydrationNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="lt_dysentry_number", type="integer", nullable=false)
     */
    private $ltDysentryNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="lt_no_classification_number", type="integer", nullable=false)
     */
    private $ltNoClassificationNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lt_created", type="datetime", nullable=false)
     */
    private $ltCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="treatment_code", type="string", length=45, nullable=false)
     */
    private $treatmentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_mfl", type="string", length=11, nullable=false)
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
     * @return LogTreatment
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
     * Set ltSevereDehydrationNumber
     *
     * @param integer $ltSevereDehydrationNumber
     * @return LogTreatment
     */
    public function setLtSevereDehydrationNumber($ltSevereDehydrationNumber)
    {
        $this->ltSevereDehydrationNumber = $ltSevereDehydrationNumber;
    
        return $this;
    }

    /**
     * Get ltSevereDehydrationNumber
     *
     * @return integer 
     */
    public function getLtSevereDehydrationNumber()
    {
        return $this->ltSevereDehydrationNumber;
    }

    /**
     * Set ltSomeDehydrationNumber
     *
     * @param integer $ltSomeDehydrationNumber
     * @return LogTreatment
     */
    public function setLtSomeDehydrationNumber($ltSomeDehydrationNumber)
    {
        $this->ltSomeDehydrationNumber = $ltSomeDehydrationNumber;
    
        return $this;
    }

    /**
     * Get ltSomeDehydrationNumber
     *
     * @return integer 
     */
    public function getLtSomeDehydrationNumber()
    {
        return $this->ltSomeDehydrationNumber;
    }

    /**
     * Set ltNoDehydrationNumber
     *
     * @param integer $ltNoDehydrationNumber
     * @return LogTreatment
     */
    public function setLtNoDehydrationNumber($ltNoDehydrationNumber)
    {
        $this->ltNoDehydrationNumber = $ltNoDehydrationNumber;
    
        return $this;
    }

    /**
     * Get ltNoDehydrationNumber
     *
     * @return integer 
     */
    public function getLtNoDehydrationNumber()
    {
        return $this->ltNoDehydrationNumber;
    }

    /**
     * Set ltDysentryNumber
     *
     * @param integer $ltDysentryNumber
     * @return LogTreatment
     */
    public function setLtDysentryNumber($ltDysentryNumber)
    {
        $this->ltDysentryNumber = $ltDysentryNumber;
    
        return $this;
    }

    /**
     * Get ltDysentryNumber
     *
     * @return integer 
     */
    public function getLtDysentryNumber()
    {
        return $this->ltDysentryNumber;
    }

    /**
     * Set ltNoClassificationNumber
     *
     * @param integer $ltNoClassificationNumber
     * @return LogTreatment
     */
    public function setLtNoClassificationNumber($ltNoClassificationNumber)
    {
        $this->ltNoClassificationNumber = $ltNoClassificationNumber;
    
        return $this;
    }

    /**
     * Get ltNoClassificationNumber
     *
     * @return integer 
     */
    public function getLtNoClassificationNumber()
    {
        return $this->ltNoClassificationNumber;
    }

    /**
     * Set ltCreated
     *
     * @param \DateTime $ltCreated
     * @return LogTreatment
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
     * @return LogTreatment
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
     * @return LogTreatment
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
     * @return LogTreatment
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