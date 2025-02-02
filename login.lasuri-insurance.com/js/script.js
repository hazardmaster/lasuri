/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
		 dateFormat: 'yy-mm-dd',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true, //this option for allowing user to select from year range
		minDate: new Date(16-09-20),
		maxDate: new Date(1609-29),
        
    });
  }

);
 