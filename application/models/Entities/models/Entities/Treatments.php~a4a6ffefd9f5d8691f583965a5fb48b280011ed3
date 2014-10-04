<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Treatments
 *
 * @ORM\Table(name="treatments")
 * @ORM\Entity
 */
class Treatments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="treatment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $treatmentId;

    /**
     * @var string
     *
     * @ORM\Column(name="treatment_name", type="string", length=255, nullable=false)
     */
    private $treatmentName;

    /**
     * @var string
     *
     * @ORM\Column(name="treatment_code", type="string", length=6, nullable=false)
     */
    private $treatmentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="treatment_for", type="string", length=3, nullable=false)
     */
    private $treatmentFor;


    /**
     * Get treatmentId
     *
     * @return integer 
     */
    public function getTreatmentId()
    {
        return $this->treatmentId;
    }

    /**
     * Set treatmentName
     *
     * @param string $treatmentName
     * @return Treatments
     */
    public function setTreatmentName($treatmentName)
    {
        $this->treatmentName = $treatmentName;
    
        return $this;
    }

    /**
     * Get treatmentName
     *
     * @return string 
     */
    public function getTreatmentName()
    {
        return $this->treatmentName;
    }

    /**
     * Set treatmentCode
     *
     * @param string $treatmentCode
     * @return Treatments
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
     * Set treatmentFor
     *
     * @param string $treatmentFor
     * @return Treatments
     */
    public function setTreatmentFor($treatmentFor)
    {
        $this->treatmentFor = $treatmentFor;
    
        return $this;
    }

    /**
     * Get treatmentFor
     *
     * @return string 
     */
    public function getTreatmentFor()
    {
        return $this->treatmentFor;
    }
}
