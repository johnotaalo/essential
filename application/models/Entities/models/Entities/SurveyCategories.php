<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyCategories
 *
 * @ORM\Table(name="survey_categories")
 * @ORM\Entity
 */
class SurveyCategories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $scId;

    /**
     * @var string
     *
     * @ORM\Column(name="sc_name", type="string", length=45, nullable=true)
     */
    private $scName;


    /**
     * Get scId
     *
     * @return integer 
     */
    public function getScId()
    {
        return $this->scId;
    }

    /**
     * Set scName
     *
     * @param string $scName
     * @return SurveyCategories
     */
    public function setScName($scName)
    {
        $this->scName = $scName;
    
        return $this;
    }

    /**
     * Get scName
     *
     * @return string 
     */
    public function getScName()
    {
        return $this->scName;
    }
}