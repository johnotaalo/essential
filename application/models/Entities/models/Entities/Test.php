<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 */
class Test
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtest", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtest;

    /**
     * @var string
     *
     * @ORM\Column(name="testcol", type="string", length=45, nullable=true)
     */
    private $testcol;


    /**
     * Get idtest
     *
     * @return integer 
     */
    public function getIdtest()
    {
        return $this->idtest;
    }

    /**
     * Set testcol
     *
     * @param string $testcol
     * @return Test
     */
    public function setTestcol($testcol)
    {
        $this->testcol = $testcol;
    
        return $this;
    }

    /**
     * Get testcol
     *
     * @return string 
     */
    public function getTestcol()
    {
        return $this->testcol;
    }
}