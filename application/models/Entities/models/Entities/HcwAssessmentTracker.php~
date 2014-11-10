<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * HcwAssessmentTracker
 *
 * @ORM\Table(name="hcw_assessment_tracker")
 * @ORM\Entity
 */
class HcwAssessmentTracker
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ast_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $astId;

    /**
     * @var string
     *
     * @ORM\Column(name="ast_section", type="string", length=45, nullable=false)
     */
    private $astSection;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ast_last_activity", type="datetime", nullable=false)
     */
    private $astLastActivity;

    /**
     * @var string
     *
     * @ORM\Column(name="facilityCode", type="string", length=45, nullable=false)
     */
    private $facilitycode;

    /**
     * @var integer
     *
     * @ORM\Column(name="hcw_id", type="integer", nullable=true)
     */
    private $hcwId;


    /**
     * Get astId
     *
     * @return integer 
     */
    public function getAstId()
    {
        return $this->astId;
    }

    /**
     * Set astSection
     *
     * @param string $astSection
     * @return HcwAssessmentTracker
     */
    public function setAstSection($astSection)
    {
        $this->astSection = $astSection;
    
        return $this;
    }

    /**
     * Get astSection
     *
     * @return string 
     */
    public function getAstSection()
    {
        return $this->astSection;
    }

    /**
     * Set astLastActivity
     *
     * @param \DateTime $astLastActivity
     * @return HcwAssessmentTracker
     */
    public function setAstLastActivity($astLastActivity)
    {
        $this->astLastActivity = $astLastActivity;
    
        return $this;
    }

    /**
     * Get astLastActivity
     *
     * @return \DateTime 
     */
    public function getAstLastActivity()
    {
        return $this->astLastActivity;
    }

    /**
     * Set facilitycode
     *
     * @param string $facilitycode
     * @return HcwAssessmentTracker
     */
    public function setFacilitycode($facilitycode)
    {
        $this->facilitycode = $facilitycode;
    
        return $this;
    }

    /**
     * Get facilitycode
     *
     * @return string 
     */
    public function getFacilitycode()
    {
        return $this->facilitycode;
    }

    /**
     * Set hcwId
     *
     * @param integer $hcwId
     * @return HcwAssessmentTracker
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
}