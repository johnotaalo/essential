<div class="col-md-6 col-md-offset-3 fuelux">
	<br><br><br><br>
	<div class="wizard" data-initialize="wizard" id="myWizard">
		<ul class="steps">
			<li data-step="1" class="active"><span class="badge">1</span>Module<span class="chevron"></span></li>
			<li data-step="2"><span class="badge">2</span>Cluster<span class="chevron"></span></li>
			<li data-step="3"><span class="badge">3</span>Complete<span class="chevron"></span></li>
		</ul>
		<div class="actions">
			<button class="btn btn-default btn-sm btn-prev"><span class="fa fa-chevron-circle-left"></span> Prev</button>
			<button class="btn btn-default btn-sm btn-next" data-last="Start">Next <span class="fa fa-chevron-circle-right"></span></button>
		</div>
		<div class="step-content">
			<div class="step-pane active sample-pane alert" data-step="1">
				<h4>Select Module</h4>
				<div class="form-group">
					<p class="form-block">Select the module you would like to learn.</p>
					<label for="cluster_id" class="sr-only"></label>
					<select name="cluster_id" class="form-control">
						<option value="">Select Module</option>
					</select>
				</div>
			</div>
			<div class="step-pane sample-pane sample-pane alert" data-step="2">
				<h4>Select Cluster</h4>
				<div class="form-group">
					<p class="form-block">Select the cluster you would like to learn for the <b>module name</b> module.</p>
					<label for="module_id" class="sr-only"></label>
					<select name="module_id" class="form-control">
						<option value="">Select Cluster</option>
					</select>
				</div>
			</div>
			<div class="step-pane sample-pane sample-pane alert" data-step="3">
				<h4>Start Learning!</h4>
				<table class="table table-responsive">
					<tr>
						<td width="30%" class="text-right">Module</td>
						<td width="70%" class="text-left"><b>Module Name</b></td>
					</tr>
					<tr>
						<td class="text-right">Cluster</td>
						<td class="text-left"><b>Cluster Name</b></td>
					</tr>
				</table>
				<?php echo anchor('imci/learn/content/read', 'Start Learning', array('class'=>'btn btn-primary pull-right')); ?>
			</div>
		</div>
	</div>
</div>