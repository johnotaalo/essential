<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commodities
 *
 * @ORM\Table(name="commodities")
 * @ORM\Entity
 */
class Commodities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comm_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commId;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_code", type="string", length=15, nullable=false)
     */
    private $commCode;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_name", type="text", nullable=false)
     */
    private $commName;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_unit", type="string", length=45, nullable=true)
     */
    private $commUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_for", type="string", length=10, nullable=false)
     */
    private $commFor;


    /**
     * Get commId
     *
     * @return integer 
     */
    public function getCommId()
    {
        return $this->commId;
    }

    /**
     * Set commCode
     *
     * @param string $commCode
     * @return Commodities
     */
    public function setCommCode($commCode)
    {
        $this->commCode = $commCode;
    
        return $this;
    }

    /**
     * Get commCode
     *
     * @return string 
     */
    public function getCommCode()
    {
        return $this->commCode;
    }

    /**
     * Set commName
     *
     * @param string $commName
     * @return Commodities
     */
    public function setCommName($commName)
    {
        $this->commName = $commName;
    
        return $this;
    }

    /**
     * Get commName
     *
     * @return string 
     */
    public function getCommName()
    {
        return $this->commName;
    }

    /**
     * Set commUnit
     *
     * @param string $commUnit
     * @return Commodities
     */
    public function setCommUnit($commUnit)
    {
        $this->commUnit = $commUnit;
    
        return $this;
    }

    /**
     * Get commUnit
     *
     * @return string 
     */
    public function getCommUnit()
    {
        return $this->commUnit;
    }

    /**
     * Set commFor
     *
     * @param string $commFor
     * @return Commodities
     */
    public function setCommFor($commFor)
    {
        $this->commFor = $commFor;
    
        return $this;
    }

    /**
     * Get commFor
     *
     * @return string 
     */
    public function getCommFor()
    {
        return $this->commFor;
    }
}