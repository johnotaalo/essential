		<div id="network">
	<?php 
	
	if(isset($logged)){
		$this->load->view('mnh/segments/top-logged-in'); 
	}
	else{
		$this->load->view('mnh/segments/top-public'); 
	}
	
	?>
	
</div>