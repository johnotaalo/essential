$(function(){
    $('#datepicker').datepicker({
		endDate: "-18y",
	    autoclose: true
    });

    $('#datatable').dataTable({
		stateSave: true,
		scrollY: '350px',
        scrollCollapse: true
    });

})