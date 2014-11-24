<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessChallenges
 *
 * @ORM\Table(name="access_challenges")
 * @ORM\Entity
 */
class AccessChallenges
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ach_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $achId;

    /**
     * @var string
     *
     * @ORM\Column(name="ach_code", type="string", length=45, nullable=true)
     */
    private $achCode;

    /**
     * @var string
     *
     * @ORM\Column(name="ach_name", type="text", nullable=true)
     */
    private $achName;


    /**
     * Get achId
     *
     * @return integer 
     */
    public function getAchId()
    {
        return $this->achId;
    }

    /**
     * Set achCode
     *
     * @param string $achCode
     * @return AccessChallenges
     */
    public function setAchCode($achCode)
    {
        $this->achCode = $achCode;
    
        return $this;
    }

    /**
     * Get achCode
     *
     * @return string 
     */
    public function getAchCode()
    {
        return $this->achCode;
    }

    /**
     * Set achName
     *
     * @param string $achName
     * @return AccessChallenges
     */
    public function setAchName($achName)
    {
        $this->achName = $achName;
    
        return $this;
    }

    /**
     * Get achName
     *
     * @return string 
     */
    public function getAchName()
    {
        return $this->achName;
    }
}