<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * BemoncFunctions
 *
 * @ORM\Table(name="bemonc_functions")
 * @ORM\Entity
 */
class BemoncFunctions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bem_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bemId;

    /**
     * @var string
     *
     * @ORM\Column(name="bem_conducted", type="string", length=45, nullable=true)
     */
    private $bemConducted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bem_created", type="datetime", nullable=false)
     */
    private $bemCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="challenge_code", type="string", length=45, nullable=false)
     */
    private $challengeCode;

    /**
     * @var string
     *
     * @ORM\Column(name="sf_code", type="string", length=11, nullable=false)
     */
    private $sfCode;

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
     * Get bemId
     *
     * @return integer 
     */
    public function getBemId()
    {
        return $this->bemId;
    }

    /**
     * Set bemConducted
     *
     * @param string $bemConducted
     * @return BemoncFunctions
     */
    public function setBemConducted($bemConducted)
    {
        $this->bemConducted = $bemConducted;
    
        return $this;
    }

    /**
     * Get bemConducted
     *
     * @return string 
     */
    public function getBemConducted()
    {
        return $this->bemConducted;
    }

    /**
     * Set bemCreated
     *
     * @param \DateTime $bemCreated
     * @return BemoncFunctions
     */
    public function setBemCreated($bemCreated)
    {
        $this->bemCreated = $bemCreated;
    
        return $this;
    }

    /**
     * Get bemCreated
     *
     * @return \DateTime 
     */
    public function getBemCreated()
    {
        return $this->bemCreated;
    }

    /**
     * Set challengeCode
     *
     * @param string $challengeCode
     * @return BemoncFunctions
     */
    public function setChallengeCode($challengeCode)
    {
        $this->challengeCode = $challengeCode;
    
        return $this;
    }

    /**
     * Get challengeCode
     *
     * @return string 
     */
    public function getChallengeCode()
    {
        return $this->challengeCode;
    }

    /**
     * Set sfCode
     *
     * @param string $sfCode
     * @return BemoncFunctions
     */
    public function setSfCode($sfCode)
    {
        $this->sfCode = $sfCode;
    
        return $this;
    }

    /**
     * Get sfCode
     *
     * @return string 
     */
    public function getSfCode()
    {
        return $this->sfCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return BemoncFunctions
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
     * @return BemoncFunctions
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