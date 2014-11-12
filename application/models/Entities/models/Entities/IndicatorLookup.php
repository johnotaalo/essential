<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicatorLookup
 *
 * @ORM\Table(name="indicator_lookup")
 * @ORM\Entity
 */
class IndicatorLookup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="il_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ilId;

    /**
     * @var string
     *
     * @ORM\Column(name="il_for", type="string", length=45, nullable=true)
     */
    private $ilFor;

    /**
     * @var string
     *
     * @ORM\Column(name="il_full_name", type="string", length=45, nullable=true)
     */
    private $ilFullName;


    /**
     * Get ilId
     *
     * @return integer 
     */
    public function getIlId()
    {
        return $this->ilId;
    }

    /**
     * Set ilFor
     *
     * @param string $ilFor
     * @return IndicatorLookup
     */
    public function setIlFor($ilFor)
    {
        $this->ilFor = $ilFor;
    
        return $this;
    }

    /**
     * Get ilFor
     *
     * @return string 
     */
    public function getIlFor()
    {
        return $this->ilFor;
    }

    /**
     * Set ilFullName
     *
     * @param string $ilFullName
     * @return IndicatorLookup
     */
    public function setIlFullName($ilFullName)
    {
        $this->ilFullName = $ilFullName;
    
        return $this;
    }

    /**
     * Get ilFullName
     *
     * @return string 
     */
    public function getIlFullName()
    {
        return $this->ilFullName;
    }
}