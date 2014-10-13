<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * SignalFunctions
 *
 * @Table(name="signal_functions")
 * @Entity
 */
class SignalFunctions
{
    /**
     * @var integer
     *
     * @Column(name="sf_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $sfId;

    /**
     * @var string
     *
     * @Column(name="sf_code", type="string", length=15, nullable=false)
     */
    private $sfCode;

    /**
     * @var string
     *
     * @Column(name="sf_name", type="string", length=45, nullable=true)
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
     * Set sfacilityMFL
     *
     * @param string $sfacilityMFL
     * @return SignalFunctions
     */
    public function setSfacilityMFL($sfacilityMFL)
    {
        $this->sfacilityMFL = $sfacilityMFL;
    
        return $this;
    }

    /**
     * Get sfacilityMFL
     *
     * @return string 
     */
    public function getSfacilityMFL()
    {
        return $this->sfacilityMFL;
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
