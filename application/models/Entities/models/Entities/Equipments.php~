<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipments
 *
 * @ORM\Table(name="equipments")
 * @ORM\Entity
 */
class Equipments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="eq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eqId;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_code", type="string", length=11, nullable=false)
     */
    private $eqCode;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_name", type="string", length=100, nullable=false)
     */
    private $eqName;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_unit", type="string", length=22, nullable=false)
     */
    private $eqUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="eq_for", type="string", length=3, nullable=false)
     */
    private $eqFor;


    /**
     * Get eqId
     *
     * @return integer 
     */
    public function getEqId()
    {
        return $this->eqId;
    }

    /**
     * Set eqCode
     *
     * @param string $eqCode
     * @return Equipments
     */
    public function setEqCode($eqCode)
    {
        $this->eqCode = $eqCode;
    
        return $this;
    }

    /**
     * Get eqCode
     *
     * @return string 
     */
    public function getEqCode()
    {
        return $this->eqCode;
    }

    /**
     * Set eqName
     *
     * @param string $eqName
     * @return Equipments
     */
    public function setEqName($eqName)
    {
        $this->eqName = $eqName;
    
        return $this;
    }

    /**
     * Get eqName
     *
     * @return string 
     */
    public function getEqName()
    {
        return $this->eqName;
    }

    /**
     * Set eqUnit
     *
     * @param string $eqUnit
     * @return Equipments
     */
    public function setEqUnit($eqUnit)
    {
        $this->eqUnit = $eqUnit;
    
        return $this;
    }

    /**
     * Get eqUnit
     *
     * @return string 
     */
    public function getEqUnit()
    {
        return $this->eqUnit;
    }

    /**
     * Set eqFor
     *
     * @param string $eqFor
     * @return Equipments
     */
    public function setEqFor($eqFor)
    {
        $this->eqFor = $eqFor;
    
        return $this;
    }

    /**
     * Get eqFor
     *
     * @return string 
     */
    public function getEqFor()
    {
        return $this->eqFor;
    }
}