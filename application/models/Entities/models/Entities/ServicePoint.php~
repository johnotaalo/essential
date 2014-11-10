<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicePoint
 *
 * @ORM\Table(name="service_point")
 * @ORM\Entity
 */
class ServicePoint
{
    /**
     * @var integer
     *
     * @ORM\Column(name="spoint_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spointId;

    /**
     * @var string
     *
     * @ORM\Column(name="spoint", type="text", nullable=false)
     */
    private $spoint;

    /**
     * @var string
     *
     * @ORM\Column(name="spoint_code", type="string", length=255, nullable=false)
     */
    private $spointCode;


    /**
     * Get spointId
     *
     * @return integer 
     */
    public function getSpointId()
    {
        return $this->spointId;
    }

    /**
     * Set spoint
     *
     * @param string $spoint
     * @return ServicePoint
     */
    public function setSpoint($spoint)
    {
        $this->spoint = $spoint;
    
        return $this;
    }

    /**
     * Get spoint
     *
     * @return string 
     */
    public function getSpoint()
    {
        return $this->spoint;
    }

    /**
     * Set spointCode
     *
     * @param string $spointCode
     * @return ServicePoint
     */
    public function setSpointCode($spointCode)
    {
        $this->spointCode = $spointCode;
    
        return $this;
    }

    /**
     * Get spointCode
     *
     * @return string 
     */
    public function getSpointCode()
    {
        return $this->spointCode;
    }
}