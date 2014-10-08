<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacilityLevels
 *
 * @ORM\Table(name="facility_levels")
 * @ORM\Entity
 */
class FacilityLevels
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fl_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $flId;

    /**
     * @var string
     *
     * @ORM\Column(name="fl_name", type="string", length=45, nullable=false)
     */
    private $flName;


    /**
     * Get flId
     *
     * @return integer 
     */
    public function getFlId()
    {
        return $this->flId;
    }

    /**
     * Set flName
     *
     * @param string $flName
     * @return FacilityLevels
     */
    public function setFlName($flName)
    {
        $this->flName = $flName;
    
        return $this;
    }

    /**
     * Get flName
     *
     * @return string 
     */
    public function getFlName()
    {
        return $this->flName;
    }
}