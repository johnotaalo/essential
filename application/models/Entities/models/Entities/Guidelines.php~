<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guidelines
 *
 * @ORM\Table(name="guidelines")
 * @ORM\Entity
 */
class Guidelines
{
    /**
     * @var integer
     *
     * @ORM\Column(name="guide_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guideId;

    /**
     * @var string
     *
     * @ORM\Column(name="guide_code", type="string", length=11, nullable=false)
     */
    private $guideCode;

    /**
     * @var string
     *
     * @ORM\Column(name="guide_name", type="string", length=55, nullable=false)
     */
    private $guideName;

    /**
     * @var string
     *
     * @ORM\Column(name="guide_for", type="string", length=3, nullable=false)
     */
    private $guideFor;


    /**
     * Get guideId
     *
     * @return integer 
     */
    public function getGuideId()
    {
        return $this->guideId;
    }

    /**
     * Set guideCode
     *
     * @param string $guideCode
     * @return Guidelines
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
     * Set guideName
     *
     * @param string $guideName
     * @return Guidelines
     */
    public function setGuideName($guideName)
    {
        $this->guideName = $guideName;
    
        return $this;
    }

    /**
     * Get guideName
     *
     * @return string 
     */
    public function getGuideName()
    {
        return $this->guideName;
    }

    /**
     * Set guideFor
     *
     * @param string $guideFor
     * @return Guidelines
     */
    public function setGuideFor($guideFor)
    {
        $this->guideFor = $guideFor;
    
        return $this;
    }

    /**
     * Get guideFor
     *
     * @return string 
     */
    public function getGuideFor()
    {
        return $this->guideFor;
    }
}