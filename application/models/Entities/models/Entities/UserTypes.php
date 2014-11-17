<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTypes
 *
 * @ORM\Table(name="user_types")
 * @ORM\Entity
 */
class UserTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ut_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utId;

    /**
     * @var string
     *
     * @ORM\Column(name="ut_name", type="string", length=45, nullable=true)
     */
    private $utName;

    /**
     * @var string
     *
     * @ORM\Column(name="ut_level", type="string", length=45, nullable=true)
     */
    private $utLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="ut_roles", type="string", length=45, nullable=true)
     */
    private $utRoles;


    /**
     * Get utId
     *
     * @return integer 
     */
    public function getUtId()
    {
        return $this->utId;
    }

    /**
     * Set utName
     *
     * @param string $utName
     * @return UserTypes
     */
    public function setUtName($utName)
    {
        $this->utName = $utName;
    
        return $this;
    }

    /**
     * Get utName
     *
     * @return string 
     */
    public function getUtName()
    {
        return $this->utName;
    }

    /**
     * Set utLevel
     *
     * @param string $utLevel
     * @return UserTypes
     */
    public function setUtLevel($utLevel)
    {
        $this->utLevel = $utLevel;
    
        return $this;
    }

    /**
     * Get utLevel
     *
     * @return string 
     */
    public function getUtLevel()
    {
        return $this->utLevel;
    }

    /**
     * Set utRoles
     *
     * @param string $utRoles
     * @return UserTypes
     */
    public function setUtRoles($utRoles)
    {
        $this->utRoles = $utRoles;
    
        return $this;
    }

    /**
     * Get utRoles
     *
     * @return string 
     */
    public function getUtRoles()
    {
        return $this->utRoles;
    }
}