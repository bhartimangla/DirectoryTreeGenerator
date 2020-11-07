$(function() {

    $('#addModel').on('show.bs.modal', function(e) {
      	var directoryId = $(e.relatedTarget).data('id');
      	$(e.currentTarget).find('input[name="modelId"]').val(directoryId);
      	$('input[name="name"]').css('border-color', '#ced4da');
  	});

  	$('input[name="name"]').on('keypress', function(e) {
        if (e.which == 32){
            console.log('Space Detected');
            return false;
        }
    });

  	$('#submitDirectory').on('click',function() {

	    if (!$('input[name="name"]').val()) {
	      	alert("Name is Required!");
	      	$('input[name="name"]').css('border-color', 'red');
	    } else {
	    	$('input[name="name"]').css('border-color', '#ced4da');
	    }

  	});

  	/* for session expire */
	setTimeout(function() {
	 	$('.alert-dismissable').fadeOut();
	}, 3000);
  	
});