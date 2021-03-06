<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * FacilityOwners
 *
 * @Table(name="facility_owners")
 * @Entity
 */
class FacilityOwners
{
    /**
     * @var integer
     *
     * @Column(name="fo_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $foId;

    /**
     * @var string
     *
     * @Column(name="fo_name", type="string", length=255, nullable=false)
     */
    private $foName;

    /**
     * @var string
     *
     * @Column(name="fo_for", type="string", length=3, nullable=false)
     */
    private $foFor;

    /**
     * @var \DateTime
     *
     * @Column(name="fo_created", type="datetime", nullable=false)
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
