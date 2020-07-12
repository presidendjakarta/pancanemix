$('#data_address').load(base_url+'/get/address');
$('#data_profile_ppp').load(base_url+'/get/ppp_profile');
$('#data_pppoe_server').load(base_url+'/get/ppp_pppoe_server');
$('#data_pppoe_secret').load(base_url+'/get/ppp_pppoe_secret');
$('#data_customers_users').load(base_url+'/get/customers');











// MODAL AJAX()

$('.panca-mod').click(function(e) {
	var url 	= $(this).data('url');
	var size 	= $(this).data('size');
	var title 	= $(this).data('title');
	var button 	= $(this).data('button');
	$('.preloader').css('background-color', 'black').css('opacity', 0.7);
	$('.preloader').fadeIn();
	$.get(url, function(data) {
		$('.preloader').fadeOut();
		$('#customModal .modal-dialog').attr('class','modal-dialog '+size);
		$('#customModal .modal-title').html(title);
		$('#customModal .modal-body').html(data);
		$('#customModal .btn-action').text(button);
		$('#customModal').modal('show');
	});

	// alert(url);
	
});

$('#customModal .btn-action').click(function(e) {
	$('.invalid-feedback').remove();
	var _s	 	= $('#customModal');
	var form 	= $('#customModal form');
	var data 	= form.serialize();
	var url 	= form.attr('action');
	$('.preloader').fadeIn();
	// alert(url);
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'JSON',
		data:data,
        beforeSend: function() {
            $(".preloader").fadeOut();
        },
        success: function(result) {
        	$("input[name='csrf_token']").val(result.data.csrf_token);
        	if (result.data.msg=='err_field') {
        		_s.find('[name="'+result.data.field+'"]').addClass('is-invalid');
        		_s.find('[name="'+result.data.field+'"]').after('<div class="invalid-feedback">*' + result.data.err + '</div>');
        	}
        	if (result.data.msg=='success') {
        		$('#customModal').modal('hide');
        		$('.preloader').fadeIn();
        		$.ajax({
				     type: "GET",
				     url: base_url+'/get/ppp_profile?success=true',
				     success: function(response){
           				$(".preloader").fadeOut();
				        $('#data_profile_ppp').html(response);
				     }
				});
        	}
        	

        	

        },error:function(e){
            alert('error');
        }
    });
	
});