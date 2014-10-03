<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacilityOwners
 *
 * @ORM\Table(name="facility_owners")
 * @ORM\Entity
 */
class FacilityOwners
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $foId;

    /**
     * @var string
     *
     * @ORM\Column(name="fo_name", type="string", length=200, nullable=true)
     */
    private $foName;

    /**
     * @var string
     *
     * @ORM\Column(name="fo_for", type="string", length=200, nullable=true)
     */
    private $foFor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fo_created", type="datetime", nullable=true)
     */
    private $foCreated;


    /**
     * Get foId
     *
     * @return integer 
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set foName
     *
     * @param string $foName
     * @return FacilityOwners
     */
    public function setFoName($foName)
    {
        $this->foName = $foName;
    
        return $this;
    }

    /**
     * Get foName
     *
     * @return string 
     */
    public function getFoName()
    {
        return $this->foName;
    }

    /**
     * Set foFor
     *
     * @param string $foFor
     * @return FacilityOwners
     */
    public function setFoFor($foFor)
    {
        $this->foFor = $foFor;
    
        return $this;
    }

    /**
     * Get foFor
     *
     * @return string 
     */
    public function getFoFor()
    {
        return $this->foFor;
    }

    /**
     * Set foCreated
     *
     * @param \DateTime $foCreated
     * @return FacilityOwners
     */
    public function setFoCreated($foCreated)
    {
        $this->foCreated = $foCreated;
    
        return $this;
    }

    /**
     * Get foCreated
     *
     * @return \DateTime 
     */
    public function getFoCreated()
    {
        return $this->foCreated;
    }
}