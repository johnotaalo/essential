<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacilityTypes
 *
 * @ORM\Table(name="facility_types")
 * @ORM\Entity
 */
class FacilityTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ft_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ftId;

    /**
     * @var string
     *
     * @ORM\Column(name="ft_name", type="string", length=55, nullable=false)
     */
    private $ftName;


    /**
     * Get ftId
     *
     * @return integer 
     */
    public function getFtId()
    {
        return $this->ftId;
    }

    /**
     * Set ftName
     *
     * @param string $ftName
     * @return FacilityTypes
     */
    public function setFtName($ftName)
    {
        $this->ftName = $ftName;
    
        return $this;
    }

    /**
     * Get ftName
     *
     * @return string 
     */
    public function getFtName()
    {
        return $this->ftName;
    }
}