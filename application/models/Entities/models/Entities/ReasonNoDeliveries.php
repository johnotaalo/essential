<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReasonNoDeliveries
 *
 * @ORM\Table(name="reason_no_deliveries")
 * @ORM\Entity
 */
class ReasonNoDeliveries
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rnd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rndId;

    /**
     * @var string
     *
     * @ORM\Column(name="rsn_name", type="string", length=255, nullable=false)
     */
    private $rsnName;


    /**
     * Get rndId
     *
     * @return integer 
     */
    public function getRndId()
    {
        return $this->rndId;
    }

    /**
     * Set rsnName
     *
     * @param string $rsnName
     * @return ReasonNoDeliveries
     */
    public function setRsnName($rsnName)
    {
        $this->rsnName = $rsnName;
    
        return $this;
    }

    /**
     * Get rsnName
     *
     * @return string 
     */
    public function getRsnName()
    {
        return $this->rsnName;
    }
}