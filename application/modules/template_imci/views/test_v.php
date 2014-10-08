<?php
$this->load->view('html_open_v');
	$this->load->view('navigation_v');
		?>
		<div class="container-fluid">
			<?php echo ($this->uri->segment(1) !== 'account') ? $this->load->view('sub_navigation') : ''; ?>
			
			<div id="main-container" class="row">
				<div class="col-md-3">

					<div class="panel panel-default">
						<div class="panel-body">
							<p>Popular Exams</p>
							<ol class="list-unstyled">
								<li><?php echo anchor('imci/test/start/1', 'Module Name'); ?></li>
							</ol>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<p>Available Exams</p>
							<ol class="list-unstyled">
								<li><?php echo anchor('imci/test/start/1', 'Module Name'); ?></li>
							</ol>
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