<div class="row">
	<div class="col-md-6 col-md-offset-2">

		<br><br><br><br><br>
		<div class="panel panel-default">
			<div class="panel-body">
				<legend>Start Practice Test: Module Name</legend>
				
				<p>You are about to start a practice test on <b>module name</b>. Continue?</p>

				<p>
					<?php echo form_open('imci/test/practice/1'); ?>
						<input type="submit" name="start_practice_btn" value="Start Practice Test" class="btn btn-primary pull-right">
					<?php echo form_close(); ?>
				</p>
			</div>
		</div>

	</div>
</div>