<style>
	.chart {
		overflow-y: auto;
	}
</style>
<script></script>
<!-- BEGIN CHART PORTLET 1-->
<div class="row-fluid" id="analytics-page">
	<div class="span6">
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i>Diarrhoea Treatment</h4>
			</div>
			<div class="portlet-body">
				
				<div id="graph_30" class="chart"></div>
			</div>
		</div>
		<div class="portlet box ">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i> By District</h4>
			

			</div>
			<div class="portlet-body">
				
				<div id="graph_32" class="chart"></div>
				
			</div>
		</div>

	</div>

	<div class="span6">
		<div class="portlet box">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i> By County</h4>
				
			</div>
			<div class="portlet-body">
				<div class="clearfix">
					
				</div>
				<div id="graph_31" class="chart"></div>
			</div>
		</div>
		<div class="portlet box " id="port2">
			<div class="portlet-title">
				<h4><i class="icon-bar-chart"></i>By Facility</h4>
			</div>
			<div class="portlet-body">
				
				<div id="graph_34" class="chart"></div>
			</div>
		</div>

	</div>
</div>
<script>
	$(document).ready(function(){
		$('graph_30').load('<?php echo base_url();?>c_analytics/case_summary');
	});
</script>
<!-- END CHART PORTLET-->
