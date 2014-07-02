// JavaScript Document
jQuery(document).ready(function($){
	
	var nothingSelectedText = 'No options selected';
	var viewArray = [];
	var showOnly = [];
	var classarray = [];

    $('.filter-dropdown').multiselect({
		
		//buttonClass: 'btn-primary btn-lg span3',
		includeSelectAllOption: true,
		selectAllValue: 'multiselect-all',
		//includeSelectAllDivider: true,
		includeSelectAllIfMoreThan: 4,
		selectAllText: 'All Options',
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		filterPlaceholder: 'Type Search Term here',
		maxHeight: 500,
		buttonWidth: '188px',
		nonSelectedText: nothingSelectedText,
		numberDisplayed: 3,

      	onChange: function(element, checked) {
      		
			//alert(element.val());
			
			// Find and remove item from an array
			var i = viewArray.indexOf(element.val());
			if(!checked) {
				viewArray.splice(i, 1);
			}else{
				viewArray.push(element.val());
			}

			showOnly = viewArray.join();
			//alert("showonly: " + showOnly);
		
      	}
    });

	$('.filter-dropdown').bind('change', function() {

		classarray = $(this).val();
		
		//alert("classarray: " + classarray); 

		if(classarray == undefined){
			
			//alert("I AM NULL");
			$(".dropdown-toggle").html(nothingSelectedText + ' <b class="caret"></b>');
			$(".dropdown-toggle").attr('title',nothingSelectedText);
			
			$('.filter-class-view').each(function(){
				$(this).show().removeClass('hidden');
			});

		}
		
		$('.filter-class-view').each(function(){
			// only supports 20 simultaneoes selections currently!
			if (!$(this).hasClass(classarray[0]) && 
				!$(this).hasClass(classarray[1]) && 
				!$(this).hasClass(classarray[2]) && 
				!$(this).hasClass(classarray[3]) && 
				!$(this).hasClass(classarray[4]) &&
				!$(this).hasClass(classarray[5]) &&
				!$(this).hasClass(classarray[6]) &&
				!$(this).hasClass(classarray[7]) &&
				!$(this).hasClass(classarray[8]) &&
				!$(this).hasClass(classarray[9]) &&
				!$(this).hasClass(classarray[10]) &&
				!$(this).hasClass(classarray[11]) &&
				!$(this).hasClass(classarray[12]) &&
				!$(this).hasClass(classarray[13]) &&
				!$(this).hasClass(classarray[14]) &&
				!$(this).hasClass(classarray[15]) &&
				!$(this).hasClass(classarray[16]) &&
				!$(this).hasClass(classarray[17]) &&
				!$(this).hasClass(classarray[18]) &&
				!$(this).hasClass(classarray[19]) &&
				!$(this).hasClass(classarray[20])) {
					$(this).hide().addClass('hidden');
				} else {
					$(this).show().removeClass('hidden');
				}
			});		

		});

});