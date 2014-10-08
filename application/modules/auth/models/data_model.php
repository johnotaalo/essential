<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//for the query builder
use Doctrine\ORM\Query\ResultSetMappingBuilder;
class Data_Model extends MY_Model
{
    
    /*user variables*/
    var $dataSet, $final_data_set, $query, $rsm, $districtName, $countyFacilities;
    
    /*constructor*/
    function __construct() {
        parent::__construct();
        
        //var initialization
        $this->dataSet = $this->query = null;
    }
    
}