<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SuppliesOutageOptions
 *
 * @ORM\Table(name="supplies_outage_options")
 * @ORM\Entity
 */
class SuppliesOutageOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="soo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sooId;

    /**
     * @var string
     *
     * @ORM\Column(name="soo_description", type="string", length=255, nullable=false)
     */
    private $sooDescription;


    /**
     * Get sooId
     *
     * @return integer 
     */
    public function getSooId()
    {
        return $this->sooId;
    }

    /**
     * Set sooDescription
     *
     * @param string $sooDescription
     * @return SuppliesOutageOptions
     */
    public function setSooDescription($sooDescription)
    {
        $this->sooDescription = $sooDescription;
    
        return $this;
    }

    /**
     * Get sooDescription
     *
     * @return string 
     */
    public function getSooDescription()
    {
        return $this->sooDescription;
    }
}