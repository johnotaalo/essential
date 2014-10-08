<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AssessmentGuidelines
 *
 * @ORM\Table(name="assessment_guidelines")
 * @ORM\Entity
 */
class AssessmentGuidelines
{
    /**
     * @var integer
     *
     * @ORM\Column(name="assessment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assessmentId;

    /**
     * @var string
     *
     * @ORM\Column(name="assessment_code", type="string", length=20, nullable=true)
     */
    private $assessmentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="assessment_name", type="string", length=300, nullable=true)
     */
    private $assessmentName;

    /**
     * @var string
     *
     * @ORM\Column(name="assessment_for", type="string", length=50, nullable=true)
     */
    private $assessmentFor;


    /**
     * Get assessmentId
     *
     * @return integer 
     */
    public function getAssessmentId()
    {
        return $this->assessmentId;
    }

    /**
     * Set assessmentCode
     *
     * @param string $assessmentCode
     * @return AssessmentGuidelines
     */
    public function setAssessmentCode($assessmentCode)
    {
        $this->assessmentCode = $assessmentCode;
    
        return $this;
    }

    /**
     * Get assessmentCode
     *
     * @return string 
     */
    public function getAssessmentCode()
    {
        return $this->assessmentCode;
    }

    /**
     * Set assessmentName
     *
     * @param string $assessmentName
     * @return AssessmentGuidelines
     */
    public function setAssessmentName($assessmentName)
    {
        $this->assessmentName = $assessmentName;
    
        return $this;
    }

    /**
     * Get assessmentName
     *
     * @return string 
     */
    public function getAssessmentName()
    {
        return $this->assessmentName;
    }

    /**
     * Set assessmentFor
     *
     * @param string $assessmentFor
     * @return AssessmentGuidelines
     */
    public function setAssessmentFor($assessmentFor)
    {
        $this->assessmentFor = $assessmentFor;
    
        return $this;
    }

    /**
     * Get assessmentFor
     *
     * @return string 
     */
    public function getAssessmentFor()
    {
        return $this->assessmentFor;
    }
}
