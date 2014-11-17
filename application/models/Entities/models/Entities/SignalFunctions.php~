<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SignalFunctions
 *
 * @ORM\Table(name="signal_functions")
 * @ORM\Entity
 */
class SignalFunctions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sfId;

    /**
     * @var string
     *
     * @ORM\Column(name="sf_code", type="string", length=15, nullable=false)
     */
    private $sfCode;

    /**
     * @var string
     *
     * @ORM\Column(name="sf_name", type="text", nullable=true)
     */
    private $sfName;


    /**
     * Get sfId
     *
     * @return integer 
     */
    public function getSfId()
    {
        return $this->sfId;
    }

    /**
     * Set sfCode
     *
     * @param string $sfCode
     * @return SignalFunctions
     */
    public function setSfCode($sfCode)
    {
        $this->sfCode = $sfCode;
    
        return $this;
    }

    /**
     * Get sfCode
     *
     * @return string 
     */
    public function getSfCode()
    {
        return $this->sfCode;
    }

    /**
     * Set sfName
     *
     * @param string $sfName
     * @return SignalFunctions
     */
    public function setSfName($sfName)
    {
        $this->sfName = $sfName;
    
        return $this;
    }

    /**
     * Get sfName
     *
     * @return string 
     */
    public function getSfName()
    {
        return $this->sfName;
    }
}