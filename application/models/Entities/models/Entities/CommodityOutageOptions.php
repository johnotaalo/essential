<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommodityOutageOptions
 *
 * @ORM\Table(name="commodity_outage_options")
 * @ORM\Entity
 */
class CommodityOutageOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cooId;

    /**
     * @var string
     *
     * @ORM\Column(name="coo_description", type="string", length=255, nullable=false)
     */
    private $cooDescription;


    /**
     * Get cooId
     *
     * @return integer 
     */
    public function getCooId()
    {
        return $this->cooId;
    }

    /**
     * Set cooDescription
     *
     * @param string $cooDescription
     * @return CommodityOutageOptions
     */
    public function setCooDescription($cooDescription)
    {
        $this->cooDescription = $cooDescription;
    
        return $this;
    }

    /**
     * Get cooDescription
     *
     * @return string 
     */
    public function getCooDescription()
    {
        return $this->cooDescription;
    }
}