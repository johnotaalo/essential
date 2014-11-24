<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyTypes
 *
 * @ORM\Table(name="survey_types")
 * @ORM\Entity
 */
class SurveyTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="st_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stId;

    /**
     * @var string
     *
     * @ORM\Column(name="st_name", type="string", length=45, nullable=true)
     */
    private $stName;


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
     * Set stName
     *
     * @param string $stName
     * @return SurveyTypes
     */
    public function setStName($stName)
    {
        $this->stName = $stName;
    
        return $this;
    }

    /**
     * Get stName
     *
     * @return string 
     */
    public function getStName()
    {
        return $this->stName;
    }
}