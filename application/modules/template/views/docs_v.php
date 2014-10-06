<?php
$special_uris = arraY('', 'account/create', 'account/access', 'account/forgot_password', 'account/logout');

$this->load->view('html_open_v');
	echo (!in_array(uri_string(), $special_uris)) ? $this->load->view('navigation_v') : '';
	?>
		<div class="container-fluid">

			<?php echo ($this->uri->segment(1) !== 'account') ? $this->load->view('sub_navigation') : ''; ?>
			
			<div id="main-container" class="row">
				<div class="col-md-4">
					<div class="panel-group" id="accordion">
					  
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#topicOne">
					          Topic Name
					        </a>
					      </h4>
					    </div>
					    <div id="topicOne" class="panel-collapse collapse">
					      <div class="panel-body">
					      	<p><?php echo anchor('docs/read/1', 'Sub Topic'); ?></p>
					      </div>
					    </div>
					  </div>

					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#topicTwo">
					          Topic Name
					        </a>
					      </h4>
					    </div>
					    <div id="topicTwo" class="panel-collapse collapse">
					      <div class="panel-body">
					      	<p><?php echo anchor('docs/read/1', 'Sub Topic'); ?></p>
					      </div>
					    </div>
					  </div>

					</div>
				</div>

				<div class="col-md-8">
					<?php $this->load->view($page_view); ?>
				</div>
			</div>

			<div class="row">
				<?php $this->load->view('footer_v'); ?>
			</div>
		</div>

<?php $this->load->view('html_close_v');