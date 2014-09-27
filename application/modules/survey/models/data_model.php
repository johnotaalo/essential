<?php
class Data_Model extends MY_Model
{
    var $em;
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;

    }
    
    
}
