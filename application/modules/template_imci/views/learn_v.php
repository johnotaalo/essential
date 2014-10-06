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
							<p>Learning Center</p>
							<table class="table table-responsive table-condensed">
								<tr>
									<td width="20%" class="text-right">Module:</td>
									<td width="80%" class="text-left"><b>Module Name</b></td>
								</tr>
								<tr>
									<td class="text-right">Cluster:</td>
									<td class="text-left"><b>Cluster Name</b></td>
								</tr>
							</table>
							<?php echo anchor('imci/learn', 'Change', array('class'=>'pull-right')); ?>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<p>Available Units</p>
						</div>

						<ul class="list-group">
							<li class="list-group-item lead">
								Unit Name 
								
								<div class="btn-group btn-xs pull-right">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><?php echo anchor('imci/learn/content/read', 'Read'); ?></li>
										<li><?php echo anchor('imci/learn/content/see', 'See'); ?></li>
										<li class="divider"></li>
										<li><?php echo anchor('imci/test/practice/1', 'Practice Test'); ?></li>
									</ul>
								</div>

							</li>
						</ul>
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