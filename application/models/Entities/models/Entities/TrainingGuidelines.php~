<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingGuidelines
 *
 * @ORM\Table(name="training_guidelines")
 * @ORM\Entity
 */
class TrainingGuidelines
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tg_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tgId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tg_trained_after_2010", type="integer", nullable=false)
     */
    private $tgTrainedAfter2010;

    /**
     * @var integer
     *
     * @ORM\Column(name="tg_trained_before_2010", type="integer", nullable=false)
     */
    private $tgTrainedBefore2010;

    /**
     * @var integer
     *
     * @ORM\Column(name="tg_working", type="integer", nullable=false)
     */
    private $tgWorking;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tg_created", type="datetime", nullable=false)
     */
    private $tgCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="fac_mfl", type="integer", nullable=false)
     */
    private $facMfl;

    /**
     * @var string
     *
     * @ORM\Column(name="guide_code", type="string", length=11, nullable=false)
     */
    private $guideCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get tgId
     *
     * @return integer 
     */
    public function getTgId()
    {
        return $this->tgId;
    }

    /**
     * Set tgTrainedAfter2010
     *
     * @param integer $tgTrainedAfter2010
     * @return TrainingGuidelines
     */
    public function setTgTrainedAfter2010($tgTrainedAfter2010)
    {
        $this->tgTrainedAfter2010 = $tgTrainedAfter2010;
    
        return $this;
    }

    /**
     * Get tgTrainedAfter2010
     *
     * @return integer 
     */
    public function getTgTrainedAfter2010()
    {
        return $this->tgTrainedAfter2010;
    }

    /**
     * Set tgTrainedBefore2010
     *
     * @param integer $tgTrainedBefore2010
     * @return TrainingGuidelines
     */
    public function setTgTrainedBefore2010($tgTrainedBefore2010)
    {
        $this->tgTrainedBefore2010 = $tgTrainedBefore2010;
    
        return $this;
    }

    /**
     * Get tgTrainedBefore2010
     *
     * @return integer 
     */
    public function getTgTrainedBefore2010()
    {
        return $this->tgTrainedBefore2010;
    }

    /**
     * Set tgWorking
     *
     * @param integer $tgWorking
     * @return TrainingGuidelines
     */
    public function setTgWorking($tgWorking)
    {
        $this->tgWorking = $tgWorking;
    
        return $this;
    }

    /**
     * Get tgWorking
     *
     * @return integer 
     */
    public function getTgWorking()
    {
        return $this->tgWorking;
    }

    /**
     * Set tgCreated
     *
     * @param \DateTime $tgCreated
     * @return TrainingGuidelines
     */
    public function setTgCreated($tgCreated)
    {
        $this->tgCreated = $tgCreated;
    
        return $this;
    }

    /**
     * Get tgCreated
     *
     * @return \DateTime 
     */
    public function getTgCreated()
    {
        return $this->tgCreated;
    }

    /**
     * Set facMfl
     *
     * @param integer $facMfl
     * @return TrainingGuidelines
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return integer 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set guideCode
     *
     * @param string $guideCode
     * @return TrainingGuidelines
     */
    public function setGuideCode($guideCode)
    {
        $this->guideCode = $guideCode;
    
        return $this;
    }

    /**
     * Get guideCode
     *
     * @return string 
     */
    public function getGuideCode()
    {
        return $this->guideCode;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return TrainingGuidelines
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