 jQuery(document).ready( function($) {
			$( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy',minDate: 0});
			$( "#datepicker2" ).datepicker({dateFormat: 'dd-mm-yy',minDate: 1});
			$('#obmform').on('submit',function() {
				var arrival = $('#datepicker').val();
				var departure = $('#datepicker2').val();
				//var numberOfNights = $('#numberofnights').val();
				var numberOfGuests = $('#numberofguests').val();
				var day= arrival.slice(0,2);
				var month = arrival.slice(3,5);
				var year = arrival.slice(6,10); 
				var day2= departure.slice(0,2);
				var month2 = departure.slice(3,5);
				var year2 = departure.slice(6,10); 
				var link = "http://www.theharrington.com/v4/book-now/?loadOBMApplication.action?siteId=FINEXHARR3&request_locale=en&chainAction=newAvailabilitySearch&arrival="+day+"%2F"+month+"%2F"+year+"&numberOfPersons="
						+numberOfGuests+
						"&departure="+day2+"%2F"+month2+"%2F"+year2;
						window.location.href=link;
				return false;
			})
		});