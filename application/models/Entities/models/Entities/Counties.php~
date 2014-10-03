<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Counties
 *
 * @ORM\Table(name="counties")
 * @ORM\Entity
 */
class Counties
{
    /**
     * @var integer
     *
     * @ORM\Column(name="county_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countyId;

    /**
     * @var string
     *
     * @ORM\Column(name="county_name", type="string", length=45, nullable=false)
     */
    private $countyName;

    /**
     * @var integer
     *
     * @ORM\Column(name="county_fusion_map_id", type="integer", nullable=false)
     */
    private $countyFusionMapId;


    /**
     * Get countyId
     *
     * @return integer 
     */
    public function getCountyId()
    {
        return $this->countyId;
    }

    /**
     * Set countyName
     *
     * @param string $countyName
     * @return Counties
     */
    public function setCountyName($countyName)
    {
        $this->countyName = $countyName;
    
        return $this;
    }

    /**
     * Get countyName
     *
     * @return string 
     */
    public function getCountyName()
    {
        return $this->countyName;
    }

    /**
     * Set countyFusionMapId
     *
     * @param integer $countyFusionMapId
     * @return Counties
     */
    public function setCountyFusionMapId($countyFusionMapId)
    {
        $this->countyFusionMapId = $countyFusionMapId;
    
        return $this;
    }

    /**
     * Get countyFusionMapId
     *
     * @return integer 
     */
    public function getCountyFusionMapId()
    {
        return $this->countyFusionMapId;
    }
}