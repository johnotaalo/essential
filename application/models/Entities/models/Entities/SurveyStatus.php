<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyStatus
 *
 * @ORM\Table(name="survey_status")
 * @ORM\Entity
 */
class SurveyStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ssId;

    /**
     * @var string
     *
     * @ORM\Column(name="ss_classification", type="string", length=45, nullable=true)
     */
    private $ssClassification;

    /**
     * @var string
     *
     * @ORM\Column(name="ss_year", type="string", length=45, nullable=true)
     */
    private $ssYear;

    /**
     * @var integer
     *
     * @ORM\Column(name="fac_id", type="integer", nullable=true)
     */
    private $facId;

    /**
     * @var integer
     *
     * @ORM\Column(name="st_id", type="integer", nullable=true)
     */
    private $stId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sc_id", type="integer", nullable=true)
     */
    private $scId;


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
     * Set ssClassification
     *
     * @param string $ssClassification
     * @return SurveyStatus
     */
    public function setSsClassification($ssClassification)
    {
        $this->ssClassification = $ssClassification;
    
        return $this;
    }

    /**
     * Get ssClassification
     *
     * @return string 
     */
    public function getSsClassification()
    {
        return $this->ssClassification;
    }

    /**
     * Set ssYear
     *
     * @param string $ssYear
     * @return SurveyStatus
     */
    public function setSsYear($ssYear)
    {
        $this->ssYear = $ssYear;
    
        return $this;
    }

    /**
     * Get ssYear
     *
     * @return string 
     */
    public function getSsYear()
    {
        return $this->ssYear;
    }

    /**
     * Set facId
     *
     * @param integer $facId
     * @return SurveyStatus
     */
    public function setFacId($facId)
    {
        $this->facId = $facId;
    
        return $this;
    }

    /**
     * Get facId
     *
     * @return integer 
     */
    public function getFacId()
    {
        return $this->facId;
    }

    /**
     * Set stId
     *
     * @param integer $stId
     * @return SurveyStatus
     */
    public function setStId($stId)
    {
        $this->stId = $stId;
    
        return $this;
    }

    /**
     * Get stId
     *
     * @return integer 
     */
    public function getStId()
    {
        return $this->stId;
    }

    /**
     * Set scId
     *
     * @param integer $scId
     * @return SurveyStatus
     */
    public function setScId($scId)
    {
        $this->scId = $scId;
    
        return $this;
    }

    /**
     * Get scId
     *
     * @return integer 
     */
    public function getScId()
    {
        return $this->scId;
    }
}