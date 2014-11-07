<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadre
 *
 * @ORM\Table(name="cadre")
 * @ORM\Entity
 */
class Cadre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cadre_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cadreId;

    /**
     * @var string
     *
     * @ORM\Column(name="cadre", type="string", length=255, nullable=false)
     */
    private $cadre;

    /**
     * @var string
     *
     * @ORM\Column(name="cadre_code", type="string", length=255, nullable=false)
     */
    private $cadreCode;


    /**
     * Get cadreId
     *
     * @return integer 
     */
    public function getCadreId()
    {
        return $this->cadreId;
    }

    /**
     * Set cadre
     *
     * @param string $cadre
     * @return Cadre
     */
    public function setCadre($cadre)
    {
        $this->cadre = $cadre;
    
        return $this;
    }

    /**
     * Get cadre
     *
     * @return string 
     */
    public function getCadre()
    {
        return $this->cadre;
    }

    /**
     * Set cadreCode
     *
     * @param string $cadreCode
     * @return Cadre
     */
    public function setCadreCode($cadreCode)
    {
        $this->cadreCode = $cadreCode;
    
        return $this;
    }

    /**
     * Get cadreCode
     *
     * @return string 
     */
    public function getCadreCode()
    {
        return $this->cadreCode;
    }
}