<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkProfile
 *
 * @ORM\Table(name="work_profile")
 * @ORM\Entity
 */
class WorkProfile
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
     * @ORM\Column(name="lq_currentUnit", type="string", length=45, nullable=false)
     */
    private $lqCurrentunit;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_response", type="string", length=55, nullable=false)
     */
    private $lqResponse;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_responseForYes", type="string", length=200, nullable=false)
     */
    private $lqResponseforyes;

    /**
     * @var string
     *
     * @ORM\Column(name="lq_responseForNo", type="string", length=200, nullable=false)
     */
    private $lqResponseforno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lq_created", type="datetime", nullable=false)
     */
    private $lqCreated;

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
     * Set lqCurrentunit
     *
     * @param string $lqCurrentunit
     * @return WorkProfile
     */
    public function setLqCurrentunit($lqCurrentunit)
    {
        $this->lqCurrentunit = $lqCurrentunit;
    
        return $this;
    }

    /**
     * Get lqCurrentunit
     *
     * @return string 
     */
    public function getLqCurrentunit()
    {
        return $this->lqCurrentunit;
    }

    /**
     * Set lqResponse
     *
     * @param string $lqResponse
     * @return WorkProfile
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
     * Set lqResponseforyes
     *
     * @param string $lqResponseforyes
     * @return WorkProfile
     */
    public function setLqResponseforyes($lqResponseforyes)
    {
        $this->lqResponseforyes = $lqResponseforyes;
    
        return $this;
    }

    /**
     * Get lqResponseforyes
     *
     * @return string 
     */
    public function getLqResponseforyes()
    {
        return $this->lqResponseforyes;
    }

    /**
     * Set lqResponseforno
     *
     * @param string $lqResponseforno
     * @return WorkProfile
     */
    public function setLqResponseforno($lqResponseforno)
    {
        $this->lqResponseforno = $lqResponseforno;
    
        return $this;
    }

    /**
     * Get lqResponseforno
     *
     * @return string 
     */
    public function getLqResponseforno()
    {
        return $this->lqResponseforno;
    }

    /**
     * Set lqCreated
     *
     * @param \DateTime $lqCreated
     * @return WorkProfile
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
     * Set questionCode
     *
     * @param string $questionCode
     * @return WorkProfile
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
     * @return WorkProfile
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
     * @return WorkProfile
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
