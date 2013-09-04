<!--
	Template Page	
-->
<html>
	<!--
		Head
	-->
	<head>
		<?php $this -> load->view('segments/head') ?>
		<div id="network">
	<?php 
	
	if(isset($logged)){
		$this->load->view('segments/top-logged-in'); 
	}
	else{
		$this->load->view('segments/top-public'); 
	}
	
	?>
	
</div>
	</head>
	<body>
		<div id="header">
			<?php $this -> load->view('segments/header'); ?>
		</div>
		<div id="content">
			<?php $this -> load->view($content); ?>
		</div>
		<div id="footer">
			<?php 
			if(isset($logged)){
				$this -> load->view('segments/footer'); 
			}
			else{
				$this->load->view('segments/footer-public');
			}
			?>
		</div>
	</body>
</html>