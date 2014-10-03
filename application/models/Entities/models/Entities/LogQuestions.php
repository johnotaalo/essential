<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogQuestions
 *
 * @ORM\Table(name="log_questions")
 * @ORM\Entity
 */
class LogQuestions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lqId;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_response", type="string", length=55, nullable=true)
     */
    private $lqResponse;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_reason", type="string", length=200, nullable=false)
     */
    private $lqReason;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_specified_or_follow_up", type="string", length=255, nullable=false)
     */
    private $lqSpecifiedOrFollowUp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lq_created", type="datetime", nullable=false)
     */
    private $lqCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="lq_response_count", type="integer", nullable=false)
     */
    private $lqResponseCount;

    /**
     * @var string
     *
     * @ORM\Column(name="question_code", type="string", length=8, nullable=false)
     */
    private $questionCode;

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
     * Get lqId
     *
     * @return integer 
     */
    public function getLqId()
    {
        return $this->lqId;
    }

    /**
     * Set lqResponse
     *
     * @param string $lqResponse
     * @return LogQuestions
     */
    public function setLqResponse($lqResponse)
    {
        $this->lqResponse = $lqResponse;
    
        return $this;
    }

    /**
     * Get lqResponse
     *
     * @return string 
     */
    public function getLqResponse()
    {
        return $this->lqResponse;
    }

    /**
     * Set lqReason
     *
     * @param string $lqReason
     * @return LogQuestions
     */
    public function setLqReason($lqReason)
    {
        $this->lqReason = $lqReason;
    
        return $this;
    }

    /**
     * Get lqReason
     *
     * @return string 
     */
    public function getLqReason()
    {
        return $this->lqReason;
    }

    /**
     * Set lqSpecifiedOrFollowUp
     *
     * @param string $lqSpecifiedOrFollowUp
     * @return LogQuestions
     */
    public function setLqSpecifiedOrFollowUp($lqSpecifiedOrFollowUp)
    {
        $this->lqSpecifiedOrFollowUp = $lqSpecifiedOrFollowUp;
    
        return $this;
    }

    /**
     * Get lqSpecifiedOrFollowUp
     *
     * @return string 
     */
    public function getLqSpecifiedOrFollowUp()
    {
        return $this->lqSpecifiedOrFollowUp;
    }

    /**
     * Set lqCreated
     *
     * @param \DateTime $lqCreated
     * @return LogQuestions
     */
    public function setLqCreated($lqCreated)
    {
        $this->lqCreated = $lqCreated;
    
        return $this;
    }

    /**
     * Get lqCreated
     *
     * @return \DateTime 
     */
    public function getLqCreated()
    {
        return $this->lqCreated;
    }

    /**
     * Set lqResponseCount
     *
     * @param integer $lqResponseCount
     * @return LogQuestions
     */
    public function setLqResponseCount($lqResponseCount)
    {
        $this->lqResponseCount = $lqResponseCount;
    
        return $this;
    }

    /**
     * Get lqResponseCount
     *
     * @return integer 
     */
    public function getLqResponseCount()
    {
        return $this->lqResponseCount;
    }

    /**
     * Set questionCode
     *
     * @param string $questionCode
     * @return LogQuestions
     */
    public function setQuestionCode($questionCode)
    {
        $this->questionCode = $questionCode;
    
        return $this;
    }

    /**
     * Get questionCode
     *
     * @return string 
     */
    public function getQuestionCode()
    {
        return $this->questionCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return LogQuestions
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
     * @return LogQuestions
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