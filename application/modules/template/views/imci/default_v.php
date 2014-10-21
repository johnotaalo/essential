<?php
$special_uris = arraY('', 'account/create', 'account/access', 'account/forgot_password', 'account/logout');

$this->load->view('html_open_v');
	echo (!in_array(uri_string(), $special_uris)) ? $this->load->view('navigation_v') : '';
	?>
		<div class="container-fluid">

			<?php echo ($this->uri->segment(1) !== 'account') ? $this->load->view('sub_navigation') : ''; ?>
			
			<div id="main-container" class="row">
				<?php $this->load->view($page_view); ?>
			</div>

			<div class="row">
				<?php $this->load->view('footer_v'); ?>
			</div>
		</div>

<?php $this->load->view('html_close_v');