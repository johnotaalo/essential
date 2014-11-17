<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * HcwList
 *
 * @Table(name="hcw_list")
 * @Entity
 */
class HcwList
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="names_of_participant", type="string", length=255, nullable=true)
     */
    private $namesOfParticipant;

    /**
     * @var string
     *
     * @Column(name="facility_name", type="string", length=255, nullable=true)
     */
    private $facilityName;

    /**
     * @var string
     *
     * @Column(name="mfl_code", type="string", length=255, nullable=true)
     */
    private $mflCode;

    /**
     * @var string
     *
     * @Column(name="designation", type="string", length=45, nullable=true)
     */
    private $designation;

    /**
     * @var integer
     *
     * @Column(name="department", type="integer", nullable=true)
     */
    private $department;

    /**
     * @var string
     *
     * @Column(name="training_location", type="string", length=45, nullable=true)
     */
    private $trainingLocation;

    /**
     * @var string
     *
     * @Column(name="job_title", type="string", length=255, nullable=true)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @Column(name="id_number", type="string", length=255, nullable=true)
     */
    private $idNumber;

    /**
     * @var string
     *
     * @Column(name="mobile_number", type="string", length=255, nullable=true)
     */
    private $mobileNumber;

    /**
     * @var string
     *
     * @Column(name="email_address", type="string", length=255, nullable=true)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @Column(name="dates", type="string", length=255, nullable=true)
     */
    private $dates;

    /**
     * @var integer
     *
     * @Column(name="upload_date", type="integer", nullable=true)
     */
    private $uploadDate;

    /**
     * @var string
     *
     * @Column(name="work_station", type="string", length=255, nullable=true)
     */
    private $workStation;

    /**
     * @var string
     *
     * @Column(name="sub_county_name", type="string", length=255, nullable=true)
     */
    private $subCountyName;

    /**
     * @var string
     *
     * @Column(name="disrtict", type="string", length=255, nullable=true)
     */
    private $disrtict;

    /**
     * @var string
     *
     * @Column(name="training_site", type="string", length=255, nullable=true)
     */
    private $trainingSite;

    /**
     * @var string
     *
     * @Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;

    /**
     * @var string
     *
     * @Column(name="po_box", type="string", length=255, nullable=true)
     */
    private $poBox;

    /**
     * @var string
     *
     * @Column(name="county", type="string", length=255, nullable=true)
     */
    private $county;

    /**
     * @var boolean
     *
     * @Column(name="cadre", type="boolean", nullable=true)
     */
    private $cadre;

    /**
     * @var string
     *
     * @Column(name="public_or_private", type="string", length=255, nullable=true)
     */
    private $publicOrPrivate;

    /**
     * @var string
     *
     * @Column(name="organisation_unit", type="string", length=255, nullable=true)
     */
    private $organisationUnit;

    /**
     * @var integer
     *
     * @Column(name="clinical_malaria_", type="integer", nullable=true)
     */
    private $clinicalMalaria;

    /**
     * @var integer
     *
     * @Column(name="confirmed_malaria_", type="integer", nullable=true)
     */
    private $confirmedMalaria;

    /**
     * @var integer
     *
     * @Column(name="diarrhoea_", type="integer", nullable=true)
     */
    private $diarrhoea;

    /**
     * @var integer
     *
     * @Column(name="dysentery_", type="integer", nullable=true)
     */
    private $dysentery;

    /**
     * @var integer
     *
     * @Column(name="pneumonia_", type="integer", nullable=true)
     */
    private $pneumonia;

    /**
     * @var boolean
     *
     * @Column(name="cholera_", type="boolean", nullable=true)
     */
    private $cholera;

    /**
     * @var string
     *
     * @Column(name="p_mobile_number_", type="string", length=255, nullable=true)
     */
    private $pMobileNumber;

    /**
     * @var integer
     *
     * @Column(name="facility_code", type="integer", nullable=true)
     */
    private $facilityCode;

    /**
     * @var string
     *
     * @Column(name="province", type="string", length=255, nullable=true)
     */
    private $province;

    /**
     * @var string
     *
     * @Column(name="division", type="string", length=255, nullable=true)
     */
    private $division;

    /**
     * @var string
     *
     * @Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @Column(name="owner", type="string", length=255, nullable=true)
     */
    private $owner;

    /**
     * @var string
     *
     * @Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @Column(name="sub_location", type="string", length=255, nullable=true)
     */
    private $subLocation;

    /**
     * @var string
     *
     * @Column(name="constituency", type="string", length=255, nullable=true)
     */
    private $constituency;

    /**
     * @var string
     *
     * @Column(name="nearest_town", type="string", length=255, nullable=true)
     */
    private $nearestTown;

    /**
     * @var string
     *
     * @Column(name="open_24_hours", type="string", length=255, nullable=true)
     */
    private $open24Hours;

    /**
     * @var string
     *
     * @Column(name="open_weekends", type="string", length=255, nullable=true)
     */
    private $openWeekends;

    /**
     * @var string
     *
     * @Column(name="operational_status", type="string", length=255, nullable=true)
     */
    private $operationalStatus;

    /**
     * @var string
     *
     * @Column(name="description_of_location", type="string", length=255, nullable=true)
     */
    private $descriptionOfLocation;

    /**
     * @var string
     *
     * @Column(name="town", type="string", length=255, nullable=true)
     */
    private $town;

    /**
     * @var string
     *
     * @Column(name="official_address", type="string", length=255, nullable=true)
     */
    private $officialAddress;

    /**
     * @var string
     *
     * @Column(name="post_code", type="string", length=255, nullable=true)
     */
    private $postCode;

    /**
     * @var boolean
     *
     * @Column(name="allocations", type="boolean", nullable=true)
     */
    private $allocations;

    /**
     * @var string
     *
     * @Column(name="official_landline", type="string", length=255, nullable=true)
     */
    private $officialLandline;

    /**
     * @var string
     *
     * @Column(name="official_mobile", type="string", length=255, nullable=true)
     */
    private $officialMobile;

    /**
     * @var string
     *
     * @Column(name="in_charge", type="string", length=255, nullable=true)
     */
    private $inCharge;

    /**
     * @var string
     *
     * @Column(name="job_title_of_in_charge", type="string", length=255, nullable=true)
     */
    private $jobTitleOfInCharge;

    /**
     * @var string
     *
     * @Column(name="anc", type="string", length=255, nullable=true)
     */
    private $anc;

    /**
     * @var string
     *
     * @Column(name="beoc", type="string", length=255, nullable=true)
     */
    private $beoc;

    /**
     * @var string
     *
     * @Column(name="epi", type="string", length=255, nullable=true)
     */
    private $epi;

    /**
     * @var string
     *
     * @Column(name="fp", type="string", length=255, nullable=true)
     */
    private $fp;

    /**
     * @var string
     *
     * @Column(name="growm", type="string", length=255, nullable=true)
     */
    private $growm;

    /**
     * @var string
     *
     * @Column(name="hbc", type="string", length=255, nullable=true)
     */
    private $hbc;

    /**
     * @var string
     *
     * @Column(name="ipd", type="string", length=255, nullable=true)
     */
    private $ipd;

    /**
     * @var string
     *
     * @Column(name="pmtct", type="string", length=255, nullable=true)
     */
    private $pmtct;

    /**
     * @var integer
     *
     * @Column(name="beds", type="integer", nullable=true)
     */
    private $beds;

    /**
     * @var integer
     *
     * @Column(name="cots", type="integer", nullable=true)
     */
    private $cots;

    /**
     * @var string
     *
     * @Column(name="tb_diag", type="string", length=255, nullable=true)
     */
    private $tbDiag;

    /**
     * @var string
     *
     * @Column(name="tb_treat", type="string", length=255, nullable=true)
     */
    private $tbTreat;

    /**
     * @var string
     *
     * @Column(name="opd", type="string", length=255, nullable=true)
     */
    private $opd;

    /**
     * @var string
     *
     * @Column(name="official_fax", type="string", length=255, nullable=true)
     */
    private $officialFax;

    /**
     * @var string
     *
     * @Column(name="official_email", type="string", length=255, nullable=true)
     */
    private $officialEmail;

    /**
     * @var string
     *
     * @Column(name="official_alternate_no", type="string", length=255, nullable=true)
     */
    private $officialAlternateNo;

    /**
     * @var string
     *
     * @Column(name="art", type="string", length=255, nullable=true)
     */
    private $art;

    /**
     * @var string
     *
     * @Column(name="tb_labs", type="string", length=255, nullable=true)
     */
    private $tbLabs;

    /**
     * @var string
     *
     * @Column(name="rhtc_rhdc", type="string", length=255, nullable=true)
     */
    private $rhtcRhdc;

    /**
     * @var string
     *
     * @Column(name="youth", type="string", length=255, nullable=true)
     */
    private $youth;

    /**
     * @var string
     *
     * @Column(name="c_imci", type="string", length=255, nullable=true)
     */
    private $cImci;

    /**
     * @var string
     *
     * @Column(name="hct", type="string", length=255, nullable=true)
     */
    private $hct;

    /**
     * @var string
     *
     * @Column(name="rad_xray", type="string", length=255, nullable=true)
     */
    private $radXray;

    /**
     * @var string
     *
     * @Column(name="ceoc", type="string", length=255, nullable=true)
     */
    private $ceoc;

    /**
     * @var string
     *
     * @Column(name="caes_sec", type="string", length=255, nullable=true)
     */
    private $caesSec;

    /**
     * @var string
     *
     * @Column(name="policy_source", type="string", length=255, nullable=true)
     */
    private $policySource;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set namesOfParticipant
     *
     * @param string $namesOfParticipant
     * @return HcwList
     */
    public function setNamesOfParticipant($namesOfParticipant)
    {
        $this->namesOfParticipant = $namesOfParticipant;
    
        return $this;
    }

    /**
     * Get namesOfParticipant
     *
     * @return string 
     */
    public function getNamesOfParticipant()
    {
        return $this->namesOfParticipant;
    }

    /**
     * Set facilityName
     *
     * @param string $facilityName
     * @return HcwList
     */
    public function setFacilityName($facilityName)
    {
        $this->facilityName = $facilityName;
    
        return $this;
    }

    /**
     * Get facilityName
     *
     * @return string 
     */
    public function getFacilityName()
    {
        return $this->facilityName;
    }

    /**
     * Set mflCode
     *
     * @param string $mflCode
     * @return HcwList
     */
    public function setMflCode($mflCode)
    {
        $this->mflCode = $mflCode;
    
        return $this;
    }

    /**
     * Get mflCode
     *
     * @return string 
     */
    public function getMflCode()
    {
        return $this->mflCode;
    }

    /**
     * Set designation
     *
     * @param string $designation
     * @return HcwList
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    
        return $this;
    }

    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set department
     *
     * @param integer $department
     * @return HcwList
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return integer 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set trainingLocation
     *
     * @param string $trainingLocation
     * @return HcwList
     */
    public function setTrainingLocation($trainingLocation)
    {
        $this->trainingLocation = $trainingLocation;
    
        return $this;
    }

    /**
     * Get trainingLocation
     *
     * @return string 
     */
    public function getTrainingLocation()
    {
        return $this->trainingLocation;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     * @return HcwList
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    
        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string 
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set idNumber
     *
     * @param string $idNumber
     * @return HcwList
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    
        return $this;
    }

    /**
     * Get idNumber
     *
     * @return string 
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return HcwList
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    
        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return HcwList
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    
        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set dates
     *
     * @param string $dates
     * @return HcwList
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
    
        return $this;
    }

    /**
     * Get dates
     *
     * @return string 
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set uploadDate
     *
     * @param integer $uploadDate
     * @return HcwList
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;
    
        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return integer 
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Set workStation
     *
     * @param string $workStation
     * @return HcwList
     */
    public function setWorkStation($workStation)
    {
        $this->workStation = $workStation;
    
        return $this;
    }

    /**
     * Get workStation
     *
     * @return string 
     */
    public function getWorkStation()
    {
        return $this->workStation;
    }

    /**
     * Set subCountyName
     *
     * @param string $subCountyName
     * @return HcwList
     */
    public function setSubCountyName($subCountyName)
    {
        $this->subCountyName = $subCountyName;
    
        return $this;
    }

    /**
     * Get subCountyName
     *
     * @return string 
     */
    public function getSubCountyName()
    {
        return $this->subCountyName;
    }

    /**
     * Set disrtict
     *
     * @param string $disrtict
     * @return HcwList
     */
    public function setDisrtict($disrtict)
    {
        $this->disrtict = $disrtict;
    
        return $this;
    }

    /**
     * Get disrtict
     *
     * @return string 
     */
    public function getDisrtict()
    {
        return $this->disrtict;
    }

    /**
     * Set trainingSite
     *
     * @param string $trainingSite
     * @return HcwList
     */
    public function setTrainingSite($trainingSite)
    {
        $this->trainingSite = $trainingSite;
    
        return $this;
    }

    /**
     * Get trainingSite
     *
     * @return string 
     */
    public function getTrainingSite()
    {
        return $this->trainingSite;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return HcwList
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set district
     *
     * @param string $district
     * @return HcwList
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    
        return $this;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set poBox
     *
     * @param string $poBox
     * @return HcwList
     */
    public function setPoBox($poBox)
    {
        $this->poBox = $poBox;
    
        return $this;
    }

    /**
     * Get poBox
     *
     * @return string 
     */
    public function getPoBox()
    {
        return $this->poBox;
    }

    /**
     * Set county
     *
     * @param string $county
     * @return HcwList
     */
    public function setCounty($county)
    {
        $this->county = $county;
    
        return $this;
    }

    /**
     * Get county
     *
     * @return string 
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set cadre
     *
     * @param boolean $cadre
     * @return HcwList
     */
    public function setCadre($cadre)
    {
        $this->cadre = $cadre;
    
        return $this;
    }

    /**
     * Get cadre
     *
     * @return boolean 
     */
    public function getCadre()
    {
        return $this->cadre;
    }

    /**
     * Set publicOrPrivate
     *
     * @param string $publicOrPrivate
     * @return HcwList
     */
    public function setPublicOrPrivate($publicOrPrivate)
    {
        $this->publicOrPrivate = $publicOrPrivate;
    
        return $this;
    }

    /**
     * Get publicOrPrivate
     *
     * @return string 
     */
    public function getPublicOrPrivate()
    {
        return $this->publicOrPrivate;
    }

    /**
     * Set organisationUnit
     *
     * @param string $organisationUnit
     * @return HcwList
     */
    public function setOrganisationUnit($organisationUnit)
    {
        $this->organisationUnit = $organisationUnit;
    
        return $this;
    }

    /**
     * Get organisationUnit
     *
     * @return string 
     */
    public function getOrganisationUnit()
    {
        return $this->organisationUnit;
    }

    /**
     * Set clinicalMalaria
     *
     * @param integer $clinicalMalaria
     * @return HcwList
     */
    public function setClinicalMalaria($clinicalMalaria)
    {
        $this->clinicalMalaria = $clinicalMalaria;
    
        return $this;
    }

    /**
     * Get clinicalMalaria
     *
     * @return integer 
     */
    public function getClinicalMalaria()
    {
        return $this->clinicalMalaria;
    }

    /**
     * Set confirmedMalaria
     *
     * @param integer $confirmedMalaria
     * @return HcwList
     */
    public function setConfirmedMalaria($confirmedMalaria)
    {
        $this->confirmedMalaria = $confirmedMalaria;
    
        return $this;
    }

    /**
     * Get confirmedMalaria
     *
     * @return integer 
     */
    public function getConfirmedMalaria()
    {
        return $this->confirmedMalaria;
    }

    /**
     * Set diarrhoea
     *
     * @param integer $diarrhoea
     * @return HcwList
     */
    public function setDiarrhoea($diarrhoea)
    {
        $this->diarrhoea = $diarrhoea;
    
        return $this;
    }

    /**
     * Get diarrhoea
     *
     * @return integer 
     */
    public function getDiarrhoea()
    {
        return $this->diarrhoea;
    }

    /**
     * Set dysentery
     *
     * @param integer $dysentery
     * @return HcwList
     */
    public function setDysentery($dysentery)
    {
        $this->dysentery = $dysentery;
    
        return $this;
    }

    /**
     * Get dysentery
     *
     * @return integer 
     */
    public function getDysentery()
    {
        return $this->dysentery;
    }

    /**
     * Set pneumonia
     *
     * @param integer $pneumonia
     * @return HcwList
     */
    public function setPneumonia($pneumonia)
    {
        $this->pneumonia = $pneumonia;
    
        return $this;
    }

    /**
     * Get pneumonia
     *
     * @return integer 
     */
    public function getPneumonia()
    {
        return $this->pneumonia;
    }

    /**
     * Set cholera
     *
     * @param boolean $cholera
     * @return HcwList
     */
    public function setCholera($cholera)
    {
        $this->cholera = $cholera;
    
        return $this;
    }

    /**
     * Get cholera
     *
     * @return boolean 
     */
    public function getCholera()
    {
        return $this->cholera;
    }

    /**
     * Set pMobileNumber
     *
     * @param string $pMobileNumber
     * @return HcwList
     */
    public function setPMobileNumber($pMobileNumber)
    {
        $this->pMobileNumber = $pMobileNumber;
    
        return $this;
    }

    /**
     * Get pMobileNumber
     *
     * @return string 
     */
    public function getPMobileNumber()
    {
        return $this->pMobileNumber;
    }

    /**
     * Set facilityCode
     *
     * @param integer $facilityCode
     * @return HcwList
     */
    public function setFacilityCode($facilityCode)
    {
        $this->facilityCode = $facilityCode;
    
        return $this;
    }

    /**
     * Get facilityCode
     *
     * @return integer 
     */
    public function getFacilityCode()
    {
        return $this->facilityCode;
    }

    /**
     * Set province
     *
     * @param string $province
     * @return HcwList
     */
    public function setProvince($province)
    {
        $this->province = $province;
    
        return $this;
    }

    /**
     * Get province
     *
     * @return string 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set division
     *
     * @param string $division
     * @return HcwList
     */
    public function setDivision($division)
    {
        $this->division = $division;
    
        return $this;
    }

    /**
     * Get division
     *
     * @return string 
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return HcwList
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set owner
     *
     * @param string $owner
     * @return HcwList
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return HcwList
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set subLocation
     *
     * @param string $subLocation
     * @return HcwList
     */
    public function setSubLocation($subLocation)
    {
        $this->subLocation = $subLocation;
    
        return $this;
    }

    /**
     * Get subLocation
     *
     * @return string 
     */
    public function getSubLocation()
    {
        return $this->subLocation;
    }

    /**
     * Set constituency
     *
     * @param string $constituency
     * @return HcwList
     */
    public function setConstituency($constituency)
    {
        $this->constituency = $constituency;
    
        return $this;
    }

    /**
     * Get constituency
     *
     * @return string 
     */
    public function getConstituency()
    {
        return $this->constituency;
    }

    /**
     * Set nearestTown
     *
     * @param string $nearestTown
     * @return HcwList
     */
    public function setNearestTown($nearestTown)
    {
        $this->nearestTown = $nearestTown;
    
        return $this;
    }

    /**
     * Get nearestTown
     *
     * @return string 
     */
    public function getNearestTown()
    {
        return $this->nearestTown;
    }

    /**
     * Set open24Hours
     *
     * @param string $open24Hours
     * @return HcwList
     */
    public function setOpen24Hours($open24Hours)
    {
        $this->open24Hours = $open24Hours;
    
        return $this;
    }

    /**
     * Get open24Hours
     *
     * @return string 
     */
    public function getOpen24Hours()
    {
        return $this->open24Hours;
    }

    /**
     * Set openWeekends
     *
     * @param string $openWeekends
     * @return HcwList
     */
    public function setOpenWeekends($openWeekends)
    {
        $this->openWeekends = $openWeekends;
    
        return $this;
    }

    /**
     * Get openWeekends
     *
     * @return string 
     */
    public function getOpenWeekends()
    {
        return $this->openWeekends;
    }

    /**
     * Set operationalStatus
     *
     * @param string $operationalStatus
     * @return HcwList
     */
    public function setOperationalStatus($operationalStatus)
    {
        $this->operationalStatus = $operationalStatus;
    
        return $this;
    }

    /**
     * Get operationalStatus
     *
     * @return string 
     */
    public function getOperationalStatus()
    {
        return $this->operationalStatus;
    }

    /**
     * Set descriptionOfLocation
     *
     * @param string $descriptionOfLocation
     * @return HcwList
     */
    public function setDescriptionOfLocation($descriptionOfLocation)
    {
        $this->descriptionOfLocation = $descriptionOfLocation;
    
        return $this;
    }

    /**
     * Get descriptionOfLocation
     *
     * @return string 
     */
    public function getDescriptionOfLocation()
    {
        return $this->descriptionOfLocation;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return HcwList
     */
    public function setTown($town)
    {
        $this->town = $town;
    
        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set officialAddress
     *
     * @param string $officialAddress
     * @return HcwList
     */
    public function setOfficialAddress($officialAddress)
    {
        $this->officialAddress = $officialAddress;
    
        return $this;
    }

    /**
     * Get officialAddress
     *
     * @return string 
     */
    public function getOfficialAddress()
    {
        return $this->officialAddress;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return HcwList
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    
        return $this;
    }

    /**
     * Get postCode
     *
     * @return string 
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set allocations
     *
     * @param boolean $allocations
     * @return HcwList
     */
    public function setAllocations($allocations)
    {
        $this->allocations = $allocations;
    
        return $this;
    }

    /**
     * Get allocations
     *
     * @return boolean 
     */
    public function getAllocations()
    {
        return $this->allocations;
    }

    /**
     * Set officialLandline
     *
     * @param string $officialLandline
     * @return HcwList
     */
    public function setOfficialLandline($officialLandline)
    {
        $this->officialLandline = $officialLandline;
    
        return $this;
    }

    /**
     * Get officialLandline
     *
     * @return string 
     */
    public function getOfficialLandline()
    {
        return $this->officialLandline;
    }

    /**
     * Set officialMobile
     *
     * @param string $officialMobile
     * @return HcwList
     */
    public function setOfficialMobile($officialMobile)
    {
        $this->officialMobile = $officialMobile;
    
        return $this;
    }

    /**
     * Get officialMobile
     *
     * @return string 
     */
    public function getOfficialMobile()
    {
        return $this->officialMobile;
    }

    /**
     * Set inCharge
     *
     * @param string $inCharge
     * @return HcwList
     */
    public function setInCharge($inCharge)
    {
        $this->inCharge = $inCharge;
    
        return $this;
    }

    /**
     * Get inCharge
     *
     * @return string 
     */
    public function getInCharge()
    {
        return $this->inCharge;
    }

    /**
     * Set jobTitleOfInCharge
     *
     * @param string $jobTitleOfInCharge
     * @return HcwList
     */
    public function setJobTitleOfInCharge($jobTitleOfInCharge)
    {
        $this->jobTitleOfInCharge = $jobTitleOfInCharge;
    
        return $this;
    }

    /**
     * Get jobTitleOfInCharge
     *
     * @return string 
     */
    public function getJobTitleOfInCharge()
    {
        return $this->jobTitleOfInCharge;
    }

    /**
     * Set anc
     *
     * @param string $anc
     * @return HcwList
     */
    public function setAnc($anc)
    {
        $this->anc = $anc;
    
        return $this;
    }

    /**
     * Get anc
     *
     * @return string 
     */
    public function getAnc()
    {
        return $this->anc;
    }

    /**
     * Set beoc
     *
     * @param string $beoc
     * @return HcwList
     */
    public function setBeoc($beoc)
    {
        $this->beoc = $beoc;
    
        return $this;
    }

    /**
     * Get beoc
     *
     * @return string 
     */
    public function getBeoc()
    {
        return $this->beoc;
    }

    /**
     * Set epi
     *
     * @param string $epi
     * @return HcwList
     */
    public function setEpi($epi)
    {
        $this->epi = $epi;
    
        return $this;
    }

    /**
     * Get epi
     *
     * @return string 
     */
    public function getEpi()
    {
        return $this->epi;
    }

    /**
     * Set fp
     *
     * @param string $fp
     * @return HcwList
     */
    public function setFp($fp)
    {
        $this->fp = $fp;
    
        return $this;
    }

    /**
     * Get fp
     *
     * @return string 
     */
    public function getFp()
    {
        return $this->fp;
    }

    /**
     * Set growm
     *
     * @param string $growm
     * @return HcwList
     */
    public function setGrowm($growm)
    {
        $this->growm = $growm;
    
        return $this;
    }

    /**
     * Get growm
     *
     * @return string 
     */
    public function getGrowm()
    {
        return $this->growm;
    }

    /**
     * Set hbc
     *
     * @param string $hbc
     * @return HcwList
     */
    public function setHbc($hbc)
    {
        $this->hbc = $hbc;
    
        return $this;
    }

    /**
     * Get hbc
     *
     * @return string 
     */
    public function getHbc()
    {
        return $this->hbc;
    }

    /**
     * Set ipd
     *
     * @param string $ipd
     * @return HcwList
     */
    public function setIpd($ipd)
    {
        $this->ipd = $ipd;
    
        return $this;
    }

    /**
     * Get ipd
     *
     * @return string 
     */
    public function getIpd()
    {
        return $this->ipd;
    }

    /**
     * Set pmtct
     *
     * @param string $pmtct
     * @return HcwList
     */
    public function setPmtct($pmtct)
    {
        $this->pmtct = $pmtct;
    
        return $this;
    }

    /**
     * Get pmtct
     *
     * @return string 
     */
    public function getPmtct()
    {
        return $this->pmtct;
    }

    /**
     * Set beds
     *
     * @param integer $beds
     * @return HcwList
     */
    public function setBeds($beds)
    {
        $this->beds = $beds;
    
        return $this;
    }

    /**
     * Get beds
     *
     * @return integer 
     */
    public function getBeds()
    {
        return $this->beds;
    }

    /**
     * Set cots
     *
     * @param integer $cots
     * @return HcwList
     */
    public function setCots($cots)
    {
        $this->cots = $cots;
    
        return $this;
    }

    /**
     * Get cots
     *
     * @return integer 
     */
    public function getCots()
    {
        return $this->cots;
    }

    /**
     * Set tbDiag
     *
     * @param string $tbDiag
     * @return HcwList
     */
    public function setTbDiag($tbDiag)
    {
        $this->tbDiag = $tbDiag;
    
        return $this;
    }

    /**
     * Get tbDiag
     *
     * @return string 
     */
    public function getTbDiag()
    {
        return $this->tbDiag;
    }

    /**
     * Set tbTreat
     *
     * @param string $tbTreat
     * @return HcwList
     */
    public function setTbTreat($tbTreat)
    {
        $this->tbTreat = $tbTreat;
    
        return $this;
    }

    /**
     * Get tbTreat
     *
     * @return string 
     */
    public function getTbTreat()
    {
        return $this->tbTreat;
    }

    /**
     * Set opd
     *
     * @param string $opd
     * @return HcwList
     */
    public function setOpd($opd)
    {
        $this->opd = $opd;
    
        return $this;
    }

    /**
     * Get opd
     *
     * @return string 
     */
    public function getOpd()
    {
        return $this->opd;
    }

    /**
     * Set officialFax
     *
     * @param string $officialFax
     * @return HcwList
     */
    public function setOfficialFax($officialFax)
    {
        $this->officialFax = $officialFax;
    
        return $this;
    }

    /**
     * Get officialFax
     *
     * @return string 
     */
    public function getOfficialFax()
    {
        return $this->officialFax;
    }

    /**
     * Set officialEmail
     *
     * @param string $officialEmail
     * @return HcwList
     */
    public function setOfficialEmail($officialEmail)
    {
        $this->officialEmail = $officialEmail;
    
        return $this;
    }

    /**
     * Get officialEmail
     *
     * @return string 
     */
    public function getOfficialEmail()
    {
        return $this->officialEmail;
    }

    /**
     * Set officialAlternateNo
     *
     * @param string $officialAlternateNo
     * @return HcwList
     */
    public function setOfficialAlternateNo($officialAlternateNo)
    {
        $this->officialAlternateNo = $officialAlternateNo;
    
        return $this;
    }

    /**
     * Get officialAlternateNo
     *
     * @return string 
     */
    public function getOfficialAlternateNo()
    {
        return $this->officialAlternateNo;
    }

    /**
     * Set art
     *
     * @param string $art
     * @return HcwList
     */
    public function setArt($art)
    {
        $this->art = $art;
    
        return $this;
    }

    /**
     * Get art
     *
     * @return string 
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Set tbLabs
     *
     * @param string $tbLabs
     * @return HcwList
     */
    public function setTbLabs($tbLabs)
    {
        $this->tbLabs = $tbLabs;
    
        return $this;
    }

    /**
     * Get tbLabs
     *
     * @return string 
     */
    public function getTbLabs()
    {
        return $this->tbLabs;
    }

    /**
     * Set rhtcRhdc
     *
     * @param string $rhtcRhdc
     * @return HcwList
     */
    public function setRhtcRhdc($rhtcRhdc)
    {
        $this->rhtcRhdc = $rhtcRhdc;
    
        return $this;
    }

    /**
     * Get rhtcRhdc
     *
     * @return string 
     */
    public function getRhtcRhdc()
    {
        return $this->rhtcRhdc;
    }

    /**
     * Set youth
     *
     * @param string $youth
     * @return HcwList
     */
    public function setYouth($youth)
    {
        $this->youth = $youth;
    
        return $this;
    }

    /**
     * Get youth
     *
     * @return string 
     */
    public function getYouth()
    {
        return $this->youth;
    }

    /**
     * Set cImci
     *
     * @param string $cImci
     * @return HcwList
     */
    public function setCImci($cImci)
    {
        $this->cImci = $cImci;
    
        return $this;
    }

    /**
     * Get cImci
     *
     * @return string 
     */
    public function getCImci()
    {
        return $this->cImci;
    }

    /**
     * Set hct
     *
     * @param string $hct
     * @return HcwList
     */
    public function setHct($hct)
    {
        $this->hct = $hct;
    
        return $this;
    }

    /**
     * Get hct
     *
     * @return string 
     */
    public function getHct()
    {
        return $this->hct;
    }

    /**
     * Set radXray
     *
     * @param string $radXray
     * @return HcwList
     */
    public function setRadXray($radXray)
    {
        $this->radXray = $radXray;
    
        return $this;
    }

    /**
     * Get radXray
     *
     * @return string 
     */
    public function getRadXray()
    {
        return $this->radXray;
    }

    /**
     * Set ceoc
     *
     * @param string $ceoc
     * @return HcwList
     */
    public function setCeoc($ceoc)
    {
        $this->ceoc = $ceoc;
    
        return $this;
    }

    /**
     * Get ceoc
     *
     * @return string 
     */
    public function getCeoc()
    {
        return $this->ceoc;
    }

    /**
     * Set caesSec
     *
     * @param string $caesSec
     * @return HcwList
     */
    public function setCaesSec($caesSec)
    {
        $this->caesSec = $caesSec;
    
        return $this;
    }

    /**
     * Get caesSec
     *
     * @return string 
     */
    public function getCaesSec()
    {
        return $this->caesSec;
    }

    /**
     * Set policySource
     *
     * @param string $policySource
     * @return HcwList
     */
    public function setPolicySource($policySource)
    {
        $this->policySource = $policySource;
    
        return $this;
    }

    /**
     * Get policySource
     *
     * @return string 
     */
    public function getPolicySource()
    {
        return $this->policySource;
    }
}