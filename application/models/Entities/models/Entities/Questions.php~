<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="question_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionId;

    /**
     * @var string
     *
     * @ORM\Column(name="question_code", type="string", length=10, nullable=false)
     */
    private $questionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="question_name", type="text", nullable=true)
     */
    private $questionName;

    /**
     * @var string
     *
     * @ORM\Column(name="question_for", type="string", length=7, nullable=false)
     */
    private $questionFor;


    /**
     * Get questionId
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set questionCode
     *
     * @param string $questionCode
     * @return Questions
     */
    public function setQuestionCode($questionCode)
    {
        $this->questionCode = $questionCode;
    
        return $this;
    }

    /**
     * Get questionCode
     *
     * @return string 
     */
    public function getQuestionCode()
    {
        return $this->questionCode;
    }

    /**
     * Set questionName
     *
     * @param string $questionName
     * @return Questions
     */
    public function setQuestionName($questionName)
    {
        $this->questionName = $questionName;
    
        return $this;
    }

    /**
     * Get questionName
     *
     * @return string 
     */
    public function getQuestionName()
    {
        return $this->questionName;
    }

    /**
     * Set questionFor
     *
     * @param string $questionFor
     * @return Questions
     */
    public function setQuestionFor($questionFor)
    {
        $this->questionFor = $questionFor;
    
        return $this;
    }

    /**
     * Get questionFor
     *
     * @return string 
     */
    public function getQuestionFor()
    {
        return $this->questionFor;
    }
}