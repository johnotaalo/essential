<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Test_model extends MY_Model 
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function mytest()
    {
    	echo "Tet Model";
    }
}