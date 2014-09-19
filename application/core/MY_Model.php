<?php

//# Extend CI_Model to include Doctrine Entity Manager
date_default_timezone_set('Africa/Nairobi');

class MY_Model extends CI_Model{
     function __construct() {
        parent::__construct();
        
    }
}
