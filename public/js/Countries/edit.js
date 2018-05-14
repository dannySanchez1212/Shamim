$('.dynamic').change(function () {
	
	if ($(this).val()!='') {

		var select = $(this).attr("id");
		var value = $(this).val();
		var dependent = $(this).data('dependent');
		var _token = $('input[name="_token"]').val();

	  if (dependent=='state') {
	  	$.ajax({
			url:"/Estado",
			method:"POST",
			data:{select:select, value:value, _token:_token, dependent:dependent},
			success:function(result){
				$('#'+dependent).html(result);
			}
		})

	  } else {
         
          var Country = $('#Country').val;
          $.ajax({
			url:"/Estado",
			method:"POST",
			data:{select:select, value:value, _token:_token, dependent:dependent, Country:Country},
			success:function(result){
				$('#'+dependent).html(result);
			}
		}) 

	  }
	  
	 }

});	  