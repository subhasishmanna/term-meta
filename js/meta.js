jQuery(document).ready(function($){
	$( "#startdate" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
	$( "#enddate" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
	quicktags({
				id: 'yourpost', 
				buttons:'em,storng,link'
		});
	quicktags({
				id: 'etc', 
				buttons:'em,storng,link'
		});
		 $('#colorpicker').wpColorPicker();
});