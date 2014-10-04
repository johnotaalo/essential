<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stock_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stockId;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock_quantity", type="integer", nullable=false)
     */
    private $stockQuantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stock_expiry_date", type="date", nullable=false)
     */
    private $stockExpiryDate;

    /**
     * @var string
     *
     * @ORM\Column(name="stock_comments", type="string", length=255, nullable=true)
     */
    private $stockComments;

    /**
     * @var string
     *
     * @ORM\Column(name="stock_place_found", type="string", length=45, nullable=true)
     */
    private $stockPlaceFound;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stock_created", type="datetime", nullable=true)
     */
    private $stockCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stock_updated", type="datetime", nullable=true)
     */
    private $stockUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_code", type="string", length=45, nullable=false)
     */
    private $commCode;

    /**
     * @var string
     *
     * @ORM\Column(name="fac_mfl", type="string", length=45, nullable=false)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get stockId
     *
     * @return integer 
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * Set stockQuantity
     *
     * @param integer $stockQuantity
     * @return Stock
     */
    public function setStockQuantity($stockQuantity)
    {
        $this->stockQuantity = $stockQuantity;
    
        return $this;
    }

    /**
     * Get stockQuantity
     *
     * @return integer 
     */
    public function getStockQuantity()
    {
        return $this->stockQuantity;
    }

    /**
     * Set stockExpiryDate
     *
     * @param \DateTime $stockExpiryDate
     * @return Stock
     */
    public function setStockExpiryDate($stockExpiryDate)
    {
        $this->stockExpiryDate = $stockExpiryDate;
    
        return $this;
    }

    /**
     * Get stockExpiryDate
     *
     * @return \DateTime 
     */
    public function getStockExpiryDate()
    {
        return $this->stockExpiryDate;
    }

    /**
     * Set stockComments
     *
     * @param string $stockComments
     * @return Stock
     */
    public function setStockComments($stockComments)
    {
        $this->stockComments = $stockComments;
    
        return $this;
    }

    /**
     * Get stockComments
     *
     * @return string 
     */
    public function getStockComments()
    {
        return $this->stockComments;
    }

    /**
     * Set stockPlaceFound
     *
     * @param string $stockPlaceFound
     * @return Stock
     */
    public function setStockPlaceFound($stockPlaceFound)
    {
        $this->stockPlaceFound = $stockPlaceFound;
    
        return $this;
    }

    /**
     * Get stockPlaceFound
     *
     * @return string 
     */
    public function getStockPlaceFound()
    {
        return $this->stockPlaceFound;
    }

    /**
     * Set stockCreated
     *
     * @param \DateTime $stockCreated
     * @return Stock
     */
    public function setStockCreated($stockCreated)
    {
        $this->stockCreated = $stockCreated;
    
        return $this;
    }

    /**
     * Get stockCreated
     *
     * @return \DateTime 
     */
    public function getStockCreated()
    {
        return $this->stockCreated;
    }

    /**
     * Set stockUpdated
     *
     * @param \DateTime $stockUpdated
     * @return Stock
     */
    public function setStockUpdated($stockUpdated)
    {
        $this->stockUpdated = $stockUpdated;
    
        return $this;
    }

    /**
     * Get stockUpdated
     *
     * @return \DateTime 
     */
    public function getStockUpdated()
    {
        return $this->stockUpdated;
    }

    /**
     * Set commCode
     *
     * @param string $commCode
     * @return Stock
     */
    public function setCommCode($commCode)
    {
        $this->commCode = $commCode;
    
        return $this;
    }

    /**
     * Get commCode
     *
     * @return string 
     */
    public function getCommCode()
    {
        return $this->commCode;
    }

    /**
     * Set facMfl
     *
     * @param string $facMfl
     * @return Stock
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;
    
        return $this;
    }

    /**
     * Get facMfl
     *
     * @return string 
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return Stock
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