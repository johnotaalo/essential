<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * Users
 *
 * @Table(name="users")
 * @Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @Column(name="user_name", type="string", length=45, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @Column(name="user_password", type="string", length=45, nullable=true)
     */
    private $userPassword;

    /**
     * @var string
     *
     * @Column(name="cl_id", type="string", length=45, nullable=true)
     */
    private $clId;

    /**
     * @var string
     *
     * @Column(name="ut_id", type="string", length=45, nullable=true)
     */
    private $utId;


    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return Users
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    
        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     * @return Users
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    
        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string 
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set clId
     *
     * @param string $clId
     * @return Users
     */
    public function setClId($clId)
    {
        $this->clId = $clId;
    
        return $this;
    }

    /**
     * Get clId
     *
     * @return string 
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set utId
     *
     * @param string $utId
     * @return Users
     */
    public function setUtId($utId)
    {
        $this->utId = $utId;
    
        return $this;
    }

    /**
     * Get utId
     *
     * @return string 
     */
    public function getUtId()
    {
        return $this->utId;
    }
}