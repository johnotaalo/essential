/*
 * Parent Custom JS File
 */
$(document).ready(function(){
	runLinks();
	
	
	
	
	function runLinks(){	
	$('.level1').hide();
	$('.level2').hide();
	$('.tile button').hide();
	/**
	 * HomePage Links
	 * 
	 * if County = > picked then show County Dropdown
	 */
	var selectClicked;
	var selectValue;
	$('#mnh-link').click(function(){
		$('#mnh-link').addClass('active');
		$('#ch-link').removeClass('active');
		$('#mnh-level1').show();
		$('#mnh-level1').val(1);
		$('#mnh-btn').show();
		$('#ch-btn').hide();
		$('#ch-level1').hide();
		$('#ch-level2').hide();
	});
	$('#ch-link').click(function(){
		$('#ch-link').addClass('active');
		$('#mnh-link').removeClass('active');
		$('#ch-level1').show();
		$('#ch-level1').val(1);
		$('#mnh-level1').hide();
		$('#mnh-level2').hide();
		$('#ch-btn').show();
		$('#mnh-btn').hide();
	});
	$('.level1').click(function(){
		selectClicked = $(this).attr('id');
		selectValue = $('#'+selectClicked).attr('value');
		//alert(selectValue);
		if(selectValue==2){
			switch(selectClicked){
				case 'mnh-level1':
					$('#mnh-level2').show();
				break;
				case 'ch-level1' :
			   		$('#ch-level2').show();
				break;
			}
		}
		else{
			$('#mnh-level2').hide();
			$('#ch-level2').hide();
		}
	});
	
	}
});
