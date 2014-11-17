<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRoles
 *
 * @ORM\Table(name="user_roles")
 * @ORM\Entity
 */
class UserRoles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ur_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $urId;

    /**
     * @var string
     *
     * @ORM\Column(name="ur_name", type="string", length=45, nullable=true)
     */
    private $urName;


    /**
     * Get urId
     *
     * @return integer 
     */
    public function getUrId()
    {
        return $this->urId;
    }

    /**
     * Set urName
     *
     * @param string $urName
     * @return UserRoles
     */
    public function setUrName($urName)
    {
        $this->urName = $urName;
    
        return $this;
    }

    /**
     * Get urName
     *
     * @return string 
     */
    public function getUrName()
    {
        return $this->urName;
    }
}