<!-- Load javascripts at bottom, this will reduce page load time -->
	 <script src="<?php echo base_url()?>/js/jquery-1.8.2.min.js"></script>	
	<script src="<?php echo base_url()?>assets/breakpoints/breakpoints.js"></script>	
	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootbox.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.blockui.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.cookie.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url()?>assets/js/excanvas.js"></script>
	<script src="<?php echo base_url()?>assets/js/respond.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/uniform/jquery.uniform.min.js"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>	
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>	
	<script src="<?php echo base_url()?>assets/js/app.js"></script>	
	<script src="<?php echo base_url()?>js/highcharts.js"></script>	
	<script src="<?php echo base_url()?>js/modules/drilldown.js"></script>
	<script src="<?php echo base_url()?>js/exporting.js"></script>		
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("maps_vector");
			App.init();
		});
	</script>