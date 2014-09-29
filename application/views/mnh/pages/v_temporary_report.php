<?php
$mfName = $this -> session -> userdata('fName');
$mfacilityMFL = $this -> session -> userdata('facilityMFL');
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<head>
		
		<?php $this->load->view('segments/meta'); ?>
		<!--main style-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/data_table.css" media="screen" />
		
		
		
		
		<!-- Attach JavaScript files -->
		<!--script src="http://code.jquery.com/jquery-latest.min.js" charset="utf-8"></script-->
		
		<script src="<?php echo base_url()?>js/js_libraries.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/style-table.js"></script>
		<script src="<?php echo base_url()?>js/jquery.datatable.min.js"></script>
		
		
		<script>
		$().ready(function(){
			/**
			 * variables
			 */
			var form_id='';
			var link_id='';
			var linkIdUrl='';
			var linkSub='';
			var linkDomain='';
			var visit_site = ''; 
			var devices='';
			
				
			    //start of close_opened_form click event
				$("#close_opened_form").click(function() {

				$(".form-container").load('<?php echo base_url() . 'c_front/formviewer'; ?>',function(){

					//delegate events
					loadGlobalScript();

					});
					});/*end of close_opened_form click event

					/*----------------------------------------------------------------------------------------------------------------*/

					/*start of loadGlobalJS*/
					var onload_queue = [];
					var dom_loaded = false;

					function loadGlobalJS(src, callback) {
					var script = document.createElement('script');
					script.type = "text/javascript";
					script.async = true;
					script.src = src;
					script.onload = script.onreadystatechange = function() {
					if (dom_loaded)
					callback();
					else
					onload_queue.push(callback);
					// clean up for IE and Opera
					script.onload = null;
					script.onreadystatechange = null;
					};
					var head = document.getElementsByTagName('head')[0];
					head.appendChild(script);
					}/*end of loadGlobalJS*/

					function domLoaded() {
					dom_loaded = true;
					var len = onload_queue.length;
					for (var i = 0; i < len; i++) {
					onload_queue[i]();
					}
					onload_queue = null;
					};/*end of domLoaded*/

					/*-----------------------------------------------------------------------------------------------------------*/

					//check box/checked radio function was here

					domLoaded();

					/*----------------------------------------------------------------------------------------------------------------*/

					/*reset form event*/
					/*start of reset_current_form click event*/
					$("#reset_current_form").click(function() {
					$(form_id).resetForm();

					});/*end of reset_current_form click event*/

					/*----------------------------------------------------------------------------------------------------------------*/
					var loaded=false;
					function loadGlobalScript(){
					loaded=true;

					var scripts=['<?php echo base_url();?>js/js_ajax_load.js'];

						for(i=0;i<scripts.length;i++){
						loadGlobalJS(scripts[i],function(){});
						}
						form_id='#'+$(".form-container").find('form').attr('id');

						}
						/*----------------------------------------------------------------------------------------------------------------*/
						
						

				
				
				//load 1st section of the assessment on page load
				$(".form-container").load('<?php echo base_url() . 'c_analytics/get_facility_list'; ?>',function(){
					       
							loadGlobalScript();
		
				
						
						});
			
			//initialize data table			
			$('#facility_report').dataTable( {
			"bProcessing": false,
			"bServerSide": false,
			"aaSorting": [[ 4, "desc" ]],
			
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
		 
								
					
			}); /*close document ready*/
				  	
				  	
					/*---------------------end form wizard functions----------------------------------------------------------------*/
						
		</script>
		
		<style type="text/css">
		.ui-autocomplete-loading {
        		background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
        		border-color: #ffffff;
        		color:#FF0000;
    		}
    	
		</style>
		
	</head>
	<body id="top">

<div id="network">
	<?php $this->load->view('segments/top-admin'); ?>
</div>

<div id="site">
	<div class="center-wrapper">

		<!--logo and main nav-->
		<?php $this->load->view('segments/nav-report'); ?>

		<div class="main form-container ui-widget" >
             <?php echo $summary; ?>
			

		</div>

		<!--footer-->
		<?php $this->load->view('segments/footer'); ?>

	</div>
</div>

</body>
		</html>
   