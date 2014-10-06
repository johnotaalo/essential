<?php
$special_uris = arraY('', 'account/create', 'account/access', 'account/forgot_password', 'account/logout');

$this->load->view('html_open_v');
	echo (!in_array(uri_string(), $special_uris)) ? $this->load->view('navigation_v') : '';
	?>
		<div class="container-fluid">

			<?php echo ($this->uri->segment(1) !== 'account') ? $this->load->view('sub_navigation') : ''; ?>
			
			<div id="main-container" class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<p class="lead">My Actions</p>
						</div>
						
						<div class="list-group">
							<?php echo anchor('imci/manage/upload/admin', 'Add Admin',  array('class'=>(uri_string() === 'imci/manage/upload/admin') ? 'list-group-item active' : 'list-group-item' )); ?>
							<?php echo anchor('imci/manage/upload/media', 'Add Media',  array('class'=>(uri_string() === 'imci/manage/upload/media') ? 'list-group-item active' : 'list-group-item' )); ?>
							<?php echo anchor('imci/manage/upload/material', 'Add Reading Material',  array('class'=>(uri_string() === 'imci/manage/upload/material') ? 'list-group-item active' : 'list-group-item' )); ?>
							<?php echo anchor('imci/manage/upload/exam', 'Add Exam',  array('class'=>(uri_string() === 'imci/manage/upload/exam') ? 'list-group-item active' : 'list-group-item' )); ?>
						</div>
					</div>
					
				</div>

				<div class="col-md-9">
					<?php $this->load->view($page_view); ?>
				</div>
			</div>

			<div class="row">
				<?php $this->load->view('footer_v'); ?>
			</div>
		</div>

<?php $this->load->view('html_close_v');