<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogSessions
 *
 * @ORM\Table(name="log_sessions")
 * @ORM\Entity
 */
class LogSessions
{
    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=45, nullable=false)
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=120, nullable=false)
     */
    private $userAgent;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_activity", type="integer", nullable=false)
     */
    private $lastActivity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_accessed", type="datetime", nullable=false)
     */
    private $timeAccessed;

    /**
     * @var string
     *
     * @ORM\Column(name="user_data", type="text", nullable=false)
     */
    private $userData;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return LogSessions
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     * @return LogSessions
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    
        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set lastActivity
     *
     * @param integer $lastActivity
     * @return LogSessions
     */
    public function setLastActivity($lastActivity)
    {
        $this->lastActivity = $lastActivity;
    
        return $this;
    }

    /**
     * Get lastActivity
     *
     * @return integer 
     */
    public function getLastActivity()
    {
        return $this->lastActivity;
    }

    /**
     * Set timeAccessed
     *
     * @param \DateTime $timeAccessed
     * @return LogSessions
     */
    public function setTimeAccessed($timeAccessed)
    {
        $this->timeAccessed = $timeAccessed;
    
        return $this;
    }

    /**
     * Get timeAccessed
     *
     * @return \DateTime 
     */
    public function getTimeAccessed()
    {
        return $this->timeAccessed;
    }

    /**
     * Set userData
     *
     * @param string $userData
     * @return LogSessions
     */
    public function setUserData($userData)
    {
        $this->userData = $userData;
    
        return $this;
    }

    /**
     * Get userData
     *
     * @return string 
     */
    public function getUserData()
    {
        return $this->userData;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return LogSessions
     */
    public function setSsId($ssId)
    {
        $this->ssId = $ssId;
    
        return $this;
    }

    /**
     * Get ssId
     *
     * @return integer 
     */
    public function getSsId()
    {
        return $this->ssId;
    }
}