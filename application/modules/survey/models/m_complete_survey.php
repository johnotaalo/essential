<?php
class M_complete_survey extends MY_Model
{
    var $em, $survey;
    var $id, $attr, $frags, $elements, $noOfInserts, $batchSize, $mfcCode, $suppliesList, $facility, $commodity, $isFacility, $commodityList, $supplierList, $signalFunctionList, $trainingGuidelinesList, $facilityList, $countyList, $districtList, $facilityOwnerList, $specificDistrictList, $facilityLevelList, $facilityTypeList, $isDistrict, $mnhWaterAspectList, $mnhCeocQuestionsList;
    
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;
        $this->isFacility = 'false';
        $this->isDistrict = 'false';
        $this->survey = $this->session->userdata('survey');
        $this->commodityList = $this->countyList = $this->facilityTypeList = $this->specificDistrictList = $this->districtList = $this->facilityLevelList = $this->facilityOwnerList = $this->signalFunctionList = $this->supplierList = $this->trainingGuidelinesList = $this->suppliesList = '';
    }
    
    public function verifyRespondedByDistrict() {
        if ($this->input->post()) {
            
            //check if a post was made
            
            // echo '<pre>';print_r($this->input->post()); echo '</pre>';die;
            
            //Working with an object of the entity
            try {
                $this->district = $this->em->getRepository('models\Entities\Districts')->findOneBy(array('districtName' => $this->input->post('district', TRUE), 'districtAccessCode' => md5($this->input->post('usercode', TRUE))));
                
                if ($this->district) {
                    return $this->isDistrict = 'true';
                } else {
                    return $this->isDistrict = 'false';
                }
            }
            catch(exception $ex) {
                
                //ignore
                die($ex->getMessage());
            }
        }
        
        //close the this->input->post
        
        
    }
    
    /*close verifyRespondedByDistrict*/
    
    private function addQuestionsInfo() {
        $this->elements = array();
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'question') !== FALSE) {
                
                //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //mark the end of 1 row...for record count
                if ($this->attr == "questionCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        //echo '<pre>';print_r($this->elements);echo '</pre>';die;
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            $this->theForm = $this->getStoredData('models\Entities\LogQuestions', array('ssId' => $this->session->userdata('survey_status'), 'questionCode' => $this->elements[$i]['questionCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogQuestions();
            }
            
            //echo "<pre>";print_r($this->theForm);echo "</pre>";die;
            //go ahead and persist data posted
            
            //create an object of the model
            
            //$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            
            (array_key_exists('questionResponse', $this->elements[$i])) ? $this->theForm->setLqResponse($this->elements[$i]['questionResponse']) : $this->theForm->setLqResponse('n/a');
            (array_key_exists('questionResponseOther', $this->elements[$i]) && $this->elements[$i]['questionResponseOther'] != '') ? $this->theForm->setLqResponse($this->elements[$i]['questionResponseOther']) : $x = 1;
            
            (array_key_exists('questionCount', $this->elements[$i])) ? $this->theForm->setLqResponseCount($this->elements[$i]['questionCount']) : $this->theForm->setLqResponseCount(-1);
            (array_key_exists('questionReason', $this->elements[$i])) ? $this->theForm->setLqReason($this->elements[$i]['questionReason']) : $this->theForm->setLqReason('n/a');
            (array_key_exists('questionSpecified', $this->elements[$i])) ? $this->theForm->setLqSpecifiedOrFollowUp($this->elements[$i]['questionSpecified']) : $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            $this->theForm->setQuestionCode($this->elements[$i]['questionCode']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLqCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    
    // close addQuestionsInfo()
    private function addServicesInfo() {
        $this->elements = array();
        
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //print_r ($this->input->post()); die;
            //For every posted values
            if (strpos($key, 'service') !== FALSE) {
                
                //select data for mnh community strategy
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "serviceAspectCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        // print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //echo $this -> elements[$i]['mnhceocReason'];exit;
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\LogQuestions', array('ssId' => $this->session->userdata('survey_status'), 'questionCode' => $this->elements[$i]['serviceAspectCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogQuestions();
            }
            
            //create an object of the model
            
            $this->theForm->setQuestionCode($this->elements[$i]['serviceAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            $this->theForm->setLqResponseCount(0);
            (isset($this->elements[$i]['serviceAspect'])) ? $this->theForm->setLqResponse($this->elements[$i]['serviceAspect']) : $this->theForm->setLqResponse('n/a');
            
            $this->theForm->setLqReason('n/a');
            
            $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            
            $this->theForm->setLqCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    
    //close addServicesInfo()
    private function addCommitteeInfo() {
        $this->elements = array();
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'committee') !== FALSE) {
                
                //select data for mnh community strategy
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "committeeAspectCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);]
        //echo "<pre>";print_r($this->elements);echo "</pre>";die;
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //echo $this -> elements[$i]['mnhceocReason'];exit;
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\LogQuestions', array('ssId' => $this->session->userdata('survey_status'), 'questionCode' => $this->elements[$i]['committeeAspectCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogQuestions();
            }
            
            //create an object of the model
            
            $this->theForm->setQuestionCode($this->elements[$i]['committeeAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['committeeAspectResponse'])) ? $this->theForm->setLqResponse($this->elements[$i]['committeeAspectResponse']) : $this->theForm->setLqResponse('n/a');
            
            (isset($this->elements[$i]['committeeCount'])) ? $this->theForm->setLqResponseCount($this->elements[$i]['committeeCount']) : $this->theForm->setLqResponseCount(0);
            
            $this->theForm->setLqReason('n/a');
            
            $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            
            $this->theForm->setLqCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    
    // close addCcommiteeInfo()
    
    private function addBedsInfo() {
        $this->elements = array();
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'bed') !== FALSE) {
                
                //select data for mnh community strategy
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "bedAspectCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        // print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //echo $this -> elements[$i]['mnhceocReason'];exit;
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\LogQuestions', array('ssId' => $this->session->userdata('survey_status'), 'questionCode' => $this->elements[$i]['bedAspectCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogQuestions();
            }
            
            //create an object of the model
            
            $this->theForm->setQuestionCode($this->elements[$i]['bedAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            $this->theForm->setLqResponse('n/a');
            (isset($this->elements[$i]['bedCount'])) ? $this->theForm->setLqResponseCount($this->elements[$i]['bedCount']) : $this->theForm->setLqResponseCount(0);
            $this->theForm->setLqReason('n/a');
            
            $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            
            $this->theForm->setLqCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    private function addIndicatorInfo() {
        $count = $finalCount = 1;
        $this->elements = array();
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'indicator') !== FALSE) {
                
                //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //mark the end of 1 row...for record count
                if ($this->attr == "indicatorCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        //echo '<pre>';print_r($this->elements);echo '</pre>';die;
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\LogIndicators', array('ssId' => $this->session->userdata('survey_status'), 'indicatorCode' => $this->elements[$i]['indicatorCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogIndicators();
            }
            
            //create an object of the model
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['indicatorhcwResponse'])) ? $this->theForm->setLiHcwresponse($this->elements[$i]['indicatorhcwResponse']) : $this->theForm->setLiHcwresponse("N/A");
            (isset($this->elements[$i]['indicatorhcwFindings'])) ? $this->theForm->setLiHcwfindings($this->elements[$i]['indicatorhcwFindings']) : $this->theForm->setLiHcwfindings("N/A");
            (isset($this->elements[$i]['indicatorassessorResponse'])) ? $this->theForm->setLiAssessorresponse($this->elements[$i]['indicatorassessorResponse']) : $this->theForm->setLiAssessorresponse("N/A");
            (isset($this->elements[$i]['indicatorassessorFindings'])) ? $this->theForm->setLiAssessorfindings($this->elements[$i]['indicatorassessorFindings']) : $this->theForm->setLiAssessorfindings("N/A");
            $this->theForm->setIndicatorCode($this->elements[$i]['indicatorCode']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLiCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
    }
    
    //close addBedInfo()
    
    private function addNoReasonForDeliveries() {
        $count = $finalCount = 1;
        
        // echo "<pre>";print_r($this->input->post());echo "</pre>";die;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'facRsn') !== FALSE) {
                
                //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                // print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "facRsnNoDeliveriesCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //echo '<pre>';print_r($this->elements);echo '</pre>';die;
        //exit;
        //get the highest value of the array that will control the number of inserts to be done
        
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //echo $this -> elements[$i]['mnhceocReason'];exit;
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\LogQuestions', array('ssId' => $this->session->userdata('survey_status'), 'questionCode' => $this->elements[$i]['facRsnNoDeliveriesCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\LogQuestions();
            }
            
            //create an object of the model
            
            $this->theForm->setLqReason($this->elements[$i]['facRsnNoDeliveries']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            //(isset($this->elements[$i]['mnhGuidelinesAspectCount'])) ? $this->theForm->setLqResponseCount($this->elements[$i]['mnhGuidelinesAspectCount']) : $this->theForm->setLqResponseCount(0);
            $this->theForm->setLqResponseCount('n/a');
            $this->theForm->setLqResponse('No');
            $this->theForm->setQuestionCode($this->elements[$i]['facRsnNoDeliveriesCode']);
            
            $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            
            $this->theForm->setLqCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    
    //close addNoReasonForDeliveries()
    
    private function addMnhHRInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'contactfacility') !== FALSE) {
                
                //var_dump($val);die;
                //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                // print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "contactfacilityopdemail") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        // print_r($this->elements);die;
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\HrInformation', array('ssId' => $this->session->userdata('survey_status'), 'facilityMfl' => $this->session->userdata('facilityMFL')));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\HrInformation();
            }
            
            //create an object of the model
            
            //$this->theForm->setStrategyCode(1);
            //$this -> elements[$i]['mchCommunityStrategyQCode']);
            $this->theForm->setFacilityMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['contactfacilityInchargename']) && $this->elements[$i]['contactfacilityInchargename'] != '') ? $this->theForm->setFacilityInchargeName($this->elements[$i]['contactfacilityInchargename']) : $this->theForm->setFacilityInchargeName('N/A');
            (isset($this->elements[$i]['contactfacilityInchargemobile']) && $this->elements[$i]['contactfacilityInchargemobile'] != '') ? $this->theForm->setFacilityInchargeMobile($this->elements[$i]['contactfacilityInchargemobile']) : $this->theForm->setFacilityInchargeMobile(-1);
            (isset($this->elements[$i]['contactfacilityInchargeemail']) && $this->elements[$i]['contactfacilityInchargeemail'] != '') ? $this->theForm->setFacilityInchargeEmailaddress($this->elements[$i]['contactfacilityInchargeemail']) : $this->theForm->setFacilityInchargeEmailaddress('N/A');
            (isset($this->elements[$i]['contactfacilityMchname']) && $this->elements[$i]['contactfacilityMchname'] != '') ? $this->theForm->setMchInchargeName($this->elements[$i]['contactfacilityMchname']) : $this->theForm->setMchInchargeName('N/A');
            (isset($this->elements[$i]['contactfacilityMchmobile']) && $this->elements[$i]['contactfacilityMchmobile'] != '') ? $this->theForm->setMchInchargeMobile($this->elements[$i]['contactfacilityMchmobile']) : $this->theForm->setMchInchargeMobile('-1');
            (isset($this->elements[$i]['contactfacilityMchemail']) && $this->elements[$i]['contactfacilityMchemail'] != '') ? $this->theForm->setMchInchargeEmailaddress($this->elements[$i]['contactfacilityMchemail']) : $this->theForm->setMchInchargeEmailaddress('N/A');
            
            (isset($this->elements[$i]['contactfacilityMaternityname']) && $this->elements[$i]['contactfacilityMaternityname'] != '') ? $this->theForm->setMaternityInchargeName($this->elements[$i]['contactfacilityMaternityname']) : $this->theForm->setMchInchargeName('N/A');
            (isset($this->elements[$i]['contactfacilityMaternitymobile']) && $this->elements[$i]['contactfacilityMaternitymobile'] != '') ? $this->theForm->setMaternityInchargeMobile($this->elements[$i]['contactfacilityMaternitymobile']) : $this->theForm->setMchInchargeMobile('-1');
            (isset($this->elements[$i]['contactfacilityMaternityemail']) && $this->elements[$i]['contactfacilityMaternityemail'] != '') ? $this->theForm->setMaternityInchargeEmailaddress($this->elements[$i]['contactfacilityMaternityemail']) : $this->theForm->setMchInchargeEmailaddress('N/A');
            
            $this->theForm->setCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex -> getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    private function addBemoncInfo() {
        $this->elements = array();
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
            
            //For every posted values
            if (strpos($key, 'bmsf') !== FALSE) {
                
                //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "bmsfSignalCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                    
                }
            }
        }
        
        //close foreach ($this -> input -> post() as $key => $val)
        //print_r($this->elements);die;
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //echo  $this->noOfInsertsBatch;die;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = $this->getStoredData('models\Entities\BemoncFunctions', array('ssId' => $this->session->userdata('survey_status'), 'sfCode' => $this->elements[$i]['bmsfSignalCode']));
            
            if ($this->theForm == NULL) {
                $this->theForm = new \models\Entities\BemoncFunctions();
            }
            
            //create an object of the model
            
            $this->theForm->setFacId($this->session->userdata('facilityMFL'));
            
            //echo $this->elements[$i]['bmsfSignalCode'];
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['bmsfResponse'])) ? $this->theForm->setBemConducted($this->elements[$i]['bmsfResponse']) : $this->theForm->setBemConducted("N/A");
            (isset($this->elements[$i]['bmsfSignalCode'])) ? $this->theForm->setSfCode($this->elements[$i]['bmsfSignalCode']) : $this->theForm->setSfCode("n/a");
            (isset($this->elements[$i]['bmsfChallenge'])) ? $this->theForm->setChallengeCode($this->elements[$i]['bmsfChallenge']) : $this->theForm->setChallengeCode("N/A");
            
            $this->theForm->setBemCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                
                //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
            
        }
        
        //end of innner loop
        
        
    }
    
    /**
     * Check if tracker entry has already been done
     * @param  [type] $mfc     [description]
     * @param  [type] $section [description]
     * @param  [type] $survey  [description]
     * @return [type]          [description]
     */
    public function sectionEntryExists($mfc, $section, $survey) {
        try {
            $this->section = $this->em->getRepository('models\Entities\AssessmentTracker')->findOneBy(array('facilityCode' => $mfc, 'astSection' => $section, 'astSurvey' => $survey, 'ssId' => (int)$this->session->userdata('survey_status')));
            if ($this->section) {
                $this->sectionExists = true;
            }
        }
        catch(exception $ex) {
            
            //ignore
            //die($ex->getMessage());
            
            
        }
        return $this->section;
    }
    
    /**
     * [writeAssessmentTrackerLog description]
     * @return [type] [description]
     */
    protected function writeAssessmentTrackerLog() {
        
        //check if entry exists
        $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
        
        //print var_dump($this->section);
        
        //insert log entry if new, else update the existing one
        if ($this->sectionExists == false) {
            
            //die('New entry, enter new one');
            $this->theForm = new \models\Entities\AssessmentTracker();
            
            //create an object of the model
            $this->theForm->setAstSection($this->input->post('step_name', TRUE));
            $this->theForm->setAstSurvey($this->session->userdata('survey'));
            
            //obtain facility code from current survey session val
            $this->theForm->setAstLastActivity(new DateTime());
            
            /*timestamp option*/
            $this->theForm->setFacilitycode($this->session->userdata('facilityMFL'));
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            //obtain facility code from current temp session val
            
            
        } else {
            
            // die('Update log');
            try {
                $this->theForm = $this->em->getRepository('models\Entities\AssessmentTracker')->findOneBy(array('facilityCode' => $this->session->userdata('facilityMFL'), 'astSection' => $this->input->post('step_name', TRUE), 'astSection' => $this->session->userdata('survey')));
            }
            catch(exception $ex) {
                
                //ignore
                //die($ex->getMessage());
                
                
            }
        }
        
        $this->theForm->setAstLastActivity(new DateTime());
        
        /*timestamp option*/
        
        $this->em->persist($this->theForm);
        
        try {
            
            $this->em->flush();
            $this->em->clear();
            
            //detaches all objects from doctrine
            //print 'true';
            
            
        }
        catch(Exception $ex) {
            
            // die($ex->getMessage());
            //print 'false';
            /*display user friendly message*/
        }
        
        //end of catch
        
        
    }
    
    /**
     * [store_data description]
     * @return [type] [description]
     */
    function store_data() {
        $curr_survey = $this->survey;
        $data = $this->input->post();
        
        // echo '<pre>';print_r($data);die;
        if ($this->input->post()) {
            $step = $this->input->post('step_name');
            switch ($curr_survey) {
                case 'mnh':
                    switch ($step) {
                        case 'section-1':
                            if ($this->addQuestionsInfo() == true && $this->addServicesInfo() == true && $this->addCommitteeInfo() == true && $this->addBedsInfo() == true && $this->addNoReasonForDeliveries() == true && $this->addMnhHRInfo() == true) {
                                $this->writeAssessmentTrackerLog();
                                return $this->response = 'true';
                            } else {
                                return $this->response = 'false';
                            }
                            break;
                            case 'section-2':
                            if ($this->addQuestionsInfo() == true && $this->addBemoncInfo() == true ) {
                                $this->writeAssessmentTrackerLog();
                                return $this->response = 'true';
                            } else {
                                return $this->response = 'false';
                            }
                            break;

                        default:
                            
                            // code...
                            break;
                    }
                    break;

                case 'hcw':
                    
                    // code...
                    break;

                case 'ch':
                    
                    // code...
                    break;

                default:
                    echo "Error!!!!";
                    break;
            }
        } else {
            echo "No input";
            die;
        }
    }
}
