

			
    $('#myBtn').click(function(event) {
    	var forms = $('.router-add');

        
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                 event.preventDefault();

                if (form.checkValidity() === false) {
                    event.stopPropagation();
                }else{
                	var data = $('.btn-submit').val();
                	$('#myBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                	$('#myBtn').attr("disabled", true);
                    
                	setTimeout(function () {
                        $('#myBtn').fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(1000);
                       var result = 'fail';
	                	if (result=='fail') {
	                		$('#myBtn').attr("disabled", true).removeClass('btn-success').addClass('btn-danger');
                            $('.btn-sbm').removeClass('text-right').addClass('text-center');
	                		$('#myBtn').html('<b>FAILED TO CONNECT TO MIKROTIK!</b>');
                            setTimeout(function () {
                                $('.btn-sbm').removeClass('text-center').addClass('text-right');
                                $('#myBtn').attr("disabled", false).removeClass('btn-danger').addClass('btn-success');
                                $('#myBtn').html('Check Conection');
                            }, 4000);

	                	}
	                	if (result=='success') {
	                		$('.btn-submit').val('2');
	                		$('#myBtn').attr("disabled", false);
	                		$('#myBtn').html('Save Data');
	                	}
                    }, 1000);
                	

                	// alert('asd');
                }
                form.classList.add('was-validated');
            }, false);
        });


    });
