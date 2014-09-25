<?php

//# Extend CI_Model to include Doctrine Entity Manager
date_default_timezone_set('Africa/Nairobi');

class MY_Model extends CI_Model
{
	/**
	 * [$em description]
	 * @var [type]
	 */
    var $em;
    /**
     * [$result description]
     * @var [type]
     */
    var $result;
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;
        $this->result = '';
    }
    
    /**
     * [getQuestionName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getQuestionName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\questions')->findOneBy(array('questionCode' => $code));
            $result = $this->result->getQuestionName();
            
            // var_dump($result);die;
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getIndicatorName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getIndicatorName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\indicators')->findOneBy(array('indicatorCode' => $code));
            $result = $this->result->getIndicatorName();
            
            // var_dump($result);die;

        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSignalName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getSignalName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\signalFunctions')->findOneBy(array('sfCode' => $code));
            $result = $this->result->getSfName();
            
            // var_dump($result);die;
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
}
