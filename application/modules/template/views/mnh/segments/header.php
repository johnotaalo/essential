		
	<?php 
	
	if(isset($logged)){
		$this->load->view('mnh/segments/top-logged-in'); 
		$this->load->view('mnh/segments/nav-logged-in'); 
	}
	else{
		$this->load->view('mnh/segments/top-public'); 
		$this->load->view('mnh/segments/nav-public'); 
	}
	?>
	