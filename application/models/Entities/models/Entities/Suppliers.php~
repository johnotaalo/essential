<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="suppliers")
 * @ORM\Entity
 */
class Suppliers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="supplier_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $supplierId;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_code", type="string", length=11, nullable=false)
     */
    private $supplierCode;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_name", type="string", length=45, nullable=true)
     */
    private $supplierName;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier_for", type="string", length=3, nullable=false)
     */
    private $supplierFor;


    /**
     * Get supplierId
     *
     * @return integer 
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     * @return Suppliers
     */
    public function setSupplierCode($supplierCode)
    {
        $this->supplierCode = $supplierCode;
    
        return $this;
    }

    /**
     * Get supplierCode
     *
     * @return string 
     */
    public function getSupplierCode()
    {
        return $this->supplierCode;
    }

    /**
     * Set supplierName
     *
     * @param string $supplierName
     * @return Suppliers
     */
    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
    
        return $this;
    }

    /**
     * Get supplierName
     *
     * @return string 
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * Set supplierFor
     *
     * @param string $supplierFor
     * @return Suppliers
     */
    public function setSupplierFor($supplierFor)
    {
        $this->supplierFor = $supplierFor;
    
        return $this;
    }

    /**
     * Get supplierFor
     *
     * @return string 
     */
    public function getSupplierFor()
    {
        return $this->supplierFor;
    }
}