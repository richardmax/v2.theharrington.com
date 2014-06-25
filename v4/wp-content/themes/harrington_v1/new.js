// JavaScript Document
jQuery(document).ready(function($){
	
	// VIEW / HIDE FILTER WITH MULTIPLE SELECT SUPPORT: START -----------------------------------------------------------------------------------------
	$('.filter-dropdown').change(function(){
		
		//alert($(this).val());
		
		var showOnly = $(this).val().join(',');
		var classarray = showOnly.split(",");
		
		$('.filter-class-view').each(function(){
			// only supports ten simultaneoes selections currently!
			if (!$(this).hasClass(classarray[0]) && 
				!$(this).hasClass(classarray[1]) && 
				!$(this).hasClass(classarray[2]) && 
				!$(this).hasClass(classarray[3]) && 
				!$(this).hasClass(classarray[4]) &&
				!$(this).hasClass(classarray[5]) &&
				!$(this).hasClass(classarray[6]) &&
				!$(this).hasClass(classarray[7]) &&
				!$(this).hasClass(classarray[8]) &&
				!$(this).hasClass(classarray[9])) {
					$(this).hide().addClass('hidden');
				} else {
					$(this).show().removeClass('hidden');
				}
		});
	});
	
	// VIEW / HIDE FILTER WITH MULTIPLE SELECT SUPPORT: START -----------------------------------------------------------------------------------------
	$('.sub-filter-dropdown').change(function(){
		
		alert($(this).val());
		
		var showOnly = $(this).val().join(',');
		var classarray = showOnly.split(",");
		
		$('.sub-filter-class-view').each(function(){
			// only supports ten simultaneoes selections currently!
			if (!$(this).hasClass(classarray[0]) && 
				!$(this).hasClass(classarray[1]) && 
				!$(this).hasClass(classarray[2]) && 
				!$(this).hasClass(classarray[3]) && 
				!$(this).hasClass(classarray[4]) &&
				!$(this).hasClass(classarray[5]) &&
				!$(this).hasClass(classarray[6]) &&
				!$(this).hasClass(classarray[7]) &&
				!$(this).hasClass(classarray[8]) &&
				!$(this).hasClass(classarray[9])) {
					$(this).hide().addClass('hidden');
				} else {
					$(this).show().removeClass('hidden');
				}
		});
	});
	
	// VIEW / HIDE FILTER WITH MULTIPLE SELECT SUPPORT: END -----------------------------------------------------------------------------------------
	$('.filter-class-view').each(function(){
			// only supports ten simultaneoes selections currently!
			$(this).hide().addClass('hidden');
	});
});

