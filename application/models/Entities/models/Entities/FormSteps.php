<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormSteps
 *
 * @ORM\Table(name="form_steps")
 * @ORM\Entity
 */
class FormSteps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fsId;

    /**
     * @var string
     *
     * @ORM\Column(name="fs_name", type="string", length=45, nullable=false)
     */
    private $fsName;


    /**
     * Get fsId
     *
     * @return integer 
     */
    public function getFsId()
    {
        return $this->fsId;
    }

    /**
     * Set fsName
     *
     * @param string $fsName
     * @return FormSteps
     */
    public function setFsName($fsName)
    {
        $this->fsName = $fsName;
    
        return $this;
    }

    /**
     * Get fsName
     *
     * @return string 
     */
    public function getFsName()
    {
        return $this->fsName;
    }
}