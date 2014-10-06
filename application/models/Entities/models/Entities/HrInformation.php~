<?php

namespace models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * HrInformation
 *
 * @ORM\Table(name="hr_information")
 * @ORM\Entity
 */
class HrInformation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hrId;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_incharge_name", type="string", length=400, nullable=true)
     */
    private $facilityInchargeName;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_incharge_mobile", type="string", length=255, nullable=true)
     */
    private $facilityInchargeMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_incharge_emailAddress", type="string", length=255, nullable=true)
     */
    private $facilityInchargeEmailaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="mch_incharge_name", type="string", length=400, nullable=true)
     */
    private $mchInchargeName;

    /**
     * @var string
     *
     * @ORM\Column(name="mch_incharge_mobile", type="string", length=255, nullable=true)
     */
    private $mchInchargeMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="mch_incharge_emailAddress", type="string", length=255, nullable=true)
     */
    private $mchInchargeEmailaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="maternity_incharge_name", type="string", length=400, nullable=true)
     */
    private $maternityInchargeName;

    /**
     * @var string
     *
     * @ORM\Column(name="maternity_incharge_mobile", type="string", length=255, nullable=true)
     */
    private $maternityInchargeMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="maternity_incharge_emailAddress", type="string", length=255, nullable=true)
     */
    private $maternityInchargeEmailaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="opd_incharge_name", type="string", length=400, nullable=true)
     */
    private $opdInchargeName;

    /**
     * @var string
     *
     * @ORM\Column(name="opd_incharge_mobile", type="string", length=255, nullable=true)
     */
    private $opdInchargeMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="opd_incharge_emailAddress", type="string", length=255, nullable=true)
     */
    private $opdInchargeEmailaddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="facility_mfl", type="string", length=11, nullable=true)
     */
    private $facilityMfl;

    /**
     * @var integer
     *
     * @ORM\Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Get hrId
     *
     * @return integer 
     */
    public function getHrId()
    {
        return $this->hrId;
    }

    /**
     * Set facilityInchargeName
     *
     * @param string $facilityInchargeName
     * @return HrInformation
     */
    public function setFacilityInchargeName($facilityInchargeName)
    {
        $this->facilityInchargeName = $facilityInchargeName;
    
        return $this;
    }

    /**
     * Get facilityInchargeName
     *
     * @return string 
     */
    public function getFacilityInchargeName()
    {
        return $this->facilityInchargeName;
    }

    /**
     * Set facilityInchargeMobile
     *
     * @param string $facilityInchargeMobile
     * @return HrInformation
     */
    public function setFacilityInchargeMobile($facilityInchargeMobile)
    {
        $this->facilityInchargeMobile = $facilityInchargeMobile;
    
        return $this;
    }

    /**
     * Get facilityInchargeMobile
     *
     * @return string 
     */
    public function getFacilityInchargeMobile()
    {
        return $this->facilityInchargeMobile;
    }

    /**
     * Set facilityInchargeEmailaddress
     *
     * @param string $facilityInchargeEmailaddress
     * @return HrInformation
     */
    public function setFacilityInchargeEmailaddress($facilityInchargeEmailaddress)
    {
        $this->facilityInchargeEmailaddress = $facilityInchargeEmailaddress;
    
        return $this;
    }

    /**
     * Get facilityInchargeEmailaddress
     *
     * @return string 
     */
    public function getFacilityInchargeEmailaddress()
    {
        return $this->facilityInchargeEmailaddress;
    }

    /**
     * Set mchInchargeName
     *
     * @param string $mchInchargeName
     * @return HrInformation
     */
    public function setMchInchargeName($mchInchargeName)
    {
        $this->mchInchargeName = $mchInchargeName;
    
        return $this;
    }

    /**
     * Get mchInchargeName
     *
     * @return string 
     */
    public function getMchInchargeName()
    {
        return $this->mchInchargeName;
    }

    /**
     * Set mchInchargeMobile
     *
     * @param string $mchInchargeMobile
     * @return HrInformation
     */
    public function setMchInchargeMobile($mchInchargeMobile)
    {
        $this->mchInchargeMobile = $mchInchargeMobile;
    
        return $this;
    }

    /**
     * Get mchInchargeMobile
     *
     * @return string 
     */
    public function getMchInchargeMobile()
    {
        return $this->mchInchargeMobile;
    }

    /**
     * Set mchInchargeEmailaddress
     *
     * @param string $mchInchargeEmailaddress
     * @return HrInformation
     */
    public function setMchInchargeEmailaddress($mchInchargeEmailaddress)
    {
        $this->mchInchargeEmailaddress = $mchInchargeEmailaddress;
    
        return $this;
    }

    /**
     * Get mchInchargeEmailaddress
     *
     * @return string 
     */
    public function getMchInchargeEmailaddress()
    {
        return $this->mchInchargeEmailaddress;
    }

    /**
     * Set maternityInchargeName
     *
     * @param string $maternityInchargeName
     * @return HrInformation
     */
    public function setMaternityInchargeName($maternityInchargeName)
    {
        $this->maternityInchargeName = $maternityInchargeName;
    
        return $this;
    }

    /**
     * Get maternityInchargeName
     *
     * @return string 
     */
    public function getMaternityInchargeName()
    {
        return $this->maternityInchargeName;
    }

    /**
     * Set maternityInchargeMobile
     *
     * @param string $maternityInchargeMobile
     * @return HrInformation
     */
    public function setMaternityInchargeMobile($maternityInchargeMobile)
    {
        $this->maternityInchargeMobile = $maternityInchargeMobile;
    
        return $this;
    }

    /**
     * Get maternityInchargeMobile
     *
     * @return string 
     */
    public function getMaternityInchargeMobile()
    {
        return $this->maternityInchargeMobile;
    }

    /**
     * Set maternityInchargeEmailaddress
     *
     * @param string $maternityInchargeEmailaddress
     * @return HrInformation
     */
    public function setMaternityInchargeEmailaddress($maternityInchargeEmailaddress)
    {
        $this->maternityInchargeEmailaddress = $maternityInchargeEmailaddress;
    
        return $this;
    }

    /**
     * Get maternityInchargeEmailaddress
     *
     * @return string 
     */
    public function getMaternityInchargeEmailaddress()
    {
        return $this->maternityInchargeEmailaddress;
    }

    /**
     * Set opdInchargeName
     *
     * @param string $opdInchargeName
     * @return HrInformation
     */
    public function setOpdInchargeName($opdInchargeName)
    {
        $this->opdInchargeName = $opdInchargeName;
    
        return $this;
    }

    /**
     * Get opdInchargeName
     *
     * @return string 
     */
    public function getOpdInchargeName()
    {
        return $this->opdInchargeName;
    }

    /**
     * Set opdInchargeMobile
     *
     * @param string $opdInchargeMobile
     * @return HrInformation
     */
    public function setOpdInchargeMobile($opdInchargeMobile)
    {
        $this->opdInchargeMobile = $opdInchargeMobile;
    
        return $this;
    }

    /**
     * Get opdInchargeMobile
     *
     * @return string 
     */
    public function getOpdInchargeMobile()
    {
        return $this->opdInchargeMobile;
    }

    /**
     * Set opdInchargeEmailaddress
     *
     * @param string $opdInchargeEmailaddress
     * @return HrInformation
     */
    public function setOpdInchargeEmailaddress($opdInchargeEmailaddress)
    {
        $this->opdInchargeEmailaddress = $opdInchargeEmailaddress;
    
        return $this;
    }

    /**
     * Get opdInchargeEmailaddress
     *
     * @return string 
     */
    public function getOpdInchargeEmailaddress()
    {
        return $this->opdInchargeEmailaddress;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return HrInformation
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set facilityMfl
     *
     * @param string $facilityMfl
     * @return HrInformation
     */
    public function setFacilityMfl($facilityMfl)
    {
        $this->facilityMfl = $facilityMfl;
    
        return $this;
    }

    /**
     * Get facilityMfl
     *
     * @return string 
     */
    public function getFacilityMfl()
    {
        return $this->facilityMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return HrInformation
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