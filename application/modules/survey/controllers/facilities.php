<?php

//include ('c_load.php');
class Facilities extends MY_Controller
{
	function __construct()
	{
		$this->load->model('data_model');
	}

	function recreatefacilities()
	{
		$facMFL = '';
		$facilities = $this->data_model->getNoMfls();

		$counter = 0;
		foreach ($facilities as $facility) {
			$fac_id = $facility['id'];
			$fac_name = mysql_real_escape_string($facility['facility_name']);
			$district = $facility['district'];
			$county = mysql_real_escape_string($facility['county']);
			$ownership = $facility['public_or_private'];
			$province = $facility['province'];
			$counter++;
			if($counter < 10)
			{
				$facNo = '000'.$counter;
			}
			else if($counter >= 10 && $counter < 100)
			{
				$facNo = '00' . $counter;
			}
			else
			{
				$facNo = '0' . $counter;
			}
			$facMFL = 'N' . $facNo;

			$insertion = $this->data_model->addFacility($facMFL, $fac_name, $county, $district, $province, $ownership);
			$this->data_model->updatehcw_list($fac_id, $facMFL);
		}
	}
}
