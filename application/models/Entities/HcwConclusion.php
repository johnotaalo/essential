<?php

namespace models\Entities;

use Doctrine\Mapping as ORM;

/**
 * HcwConclusion
 *
 * @Table(name="hcw_conclusion")
 * @Entity
 */
class HcwConclusion
{
    /**
     * @var integer
     *
     * @Column(name="hc_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hcId;

    /**
     * @var string
     *
     * @Column(name="hc_action_taken_supervisor", type="string", length=45, nullable=true)
     */
    private $hcActionTakenSupervisor;

    /**
     * @var string
     *
     * @Column(name="hc_action_taken_supervisee", type="string", length=45, nullable=true)
     */
    private $hcActionTakenSupervisee;

    /**
     * @var string
     *
     * @Column(name="hc_signature_supervisor", type="string", length=45, nullable=true)
     */
    private $hcSignatureSupervisor;

    /**
     * @var string
     *
     * @Column(name="hc_signature_supervisee", type="string", length=45, nullable=true)
     */
    private $hcSignatureSupervisee;

    /**
     * @var string
     *
     * @Column(name="hc_date_supervisor", type="string", length=45, nullable=true)
     */
    private $hcDateSupervisor;

    /**
     * @var string
     *
     * @Column(name="hc_date_supervisee", type="string", length=45, nullable=true)
     */
    private $hcDateSupervisee;


    /**
     * Get hcId
     *
     * @return integer
     */
    public function getHcId()
    {
        return $this->hcId;
    }

    /**
     * Set hcActionTakenSupervisor
     *
     * @param string $hcActionTakenSupervisor
     * @return HcwConclusion
     */
    public function setHcActionTakenSupervisor($hcActionTakenSupervisor)
    {
        $this->hcActionTakenSupervisor = $hcActionTakenSupervisor;

        return $this;
    }

    /**
     * Get hcActionTakenSupervisor
     *
     * @return string
     */
    public function getHcActionTakenSupervisor()
    {
        return $this->hcActionTakenSupervisor;
    }

    /**
     * Set hcActionTakenSupervisee
     *
     * @param string $hcActionTakenSupervisee
     * @return HcwConclusion
     */
    public function setHcActionTakenSupervisee($hcActionTakenSupervisee)
    {
        $this->hcActionTakenSupervisee = $hcActionTakenSupervisee;

        return $this;
    }

    /**
     * Get hcActionTakenSupervisee
     *
     * @return string
     */
    public function getHcActionTakenSupervisee()
    {
        return $this->hcActionTakenSupervisee;
    }

    /**
     * Set hcSignatureSupervisor
     *
     * @param string $hcSignatureSupervisor
     * @return HcwConclusion
     */
    public function setHcSignatureSupervisor($hcSignatureSupervisor)
    {
        $this->hcSignatureSupervisor = $hcSignatureSupervisor;

        return $this;
    }

    /**
     * Get hcSignatureSupervisor
     *
     * @return string
     */
    public function getHcSignatureSupervisor()
    {
        return $this->hcSignatureSupervisor;
    }

    /**
     * Set hcSignatureSupervisee
     *
     * @param string $hcSignatureSupervisee
     * @return HcwConclusion
     */
    public function setHcSignatureSupervisee($hcSignatureSupervisee)
    {
        $this->hcSignatureSupervisee = $hcSignatureSupervisee;

        return $this;
    }

    /**
     * Get hcSignatureSupervisee
     *
     * @return string
     */
    public function getHcSignatureSupervisee()
    {
        return $this->hcSignatureSupervisee;
    }

    /**
     * Set hcDateSupervisor
     *
     * @param string $hcDateSupervisor
     * @return HcwConclusion
     */
    public function setHcDateSupervisor($hcDateSupervisor)
    {
        $this->hcDateSupervisor = $hcDateSupervisor;

        return $this;
    }

    /**
     * Get hcDateSupervisor
     *
     * @return string
     */
    public function getHcDateSupervisor()
    {
        return $this->hcDateSupervisor;
    }

    /**
     * Set hcDateSupervisee
     *
     * @param string $hcDateSupervisee
     * @return HcwConclusion
     */
    public function setHcDateSupervisee($hcDateSupervisee)
    {
        $this->hcDateSupervisee = $hcDateSupervisee;

        return $this;
    }

    /**
     * Get hcDateSupervisee
     *
     * @return string
     */
    public function getHcDateSupervisee()
    {
        return $this->hcDateSupervisee;
    }
    /**
     * @var integer
     *
     * @Column(name="fac_mfl", type="integer", nullable=true)
     */
    private $facMfl;

    /**
     * @var integer
     *
     * @Column(name="ss_id", type="integer", nullable=true)
     */
    private $ssId;


    /**
     * Set facMfl
     *
     * @param integer $facMfl
     * @return HcwConclusion
     */
    public function setFacMfl($facMfl)
    {
        $this->facMfl = $facMfl;

        return $this;
    }

    /**
     * Get facMfl
     *
     * @return integer
     */
    public function getFacMfl()
    {
        return $this->facMfl;
    }

    /**
     * Set ssId
     *
     * @param integer $ssId
     * @return HcwConclusion
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
