<ol class="breadcrumb">
	<li><?php echo anchor('imci/home', 'Home'); ?></li>
	<li class="active">Test Center</li>
</ol>

<div class="panel panel-default">
	<div class="panel-body">
	<p>Summary on county response, cadres, professions etc.</p>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php
				$perfomance = array(
					'src' => 'assets/images/imci/graphs/exam_taking_record.jpg',
					'width' => '1000',
					'class' => 'img-responsive',
				);
				echo img($perfomance);
				?>
			</div>
		</div>
	</div>
</div>