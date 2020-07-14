        $('.preloader').fadeOut();

    var forms = $('.router-add');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        event.preventDefault();

            if (form.checkValidity() === false) {
                event.stopPropagation();
            }else{
                var data = $('.btn-submit').val();

                if (data!=0) {
                    $('.btn-submit').val(0);
                    $('#myBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                    var url = forms.attr('action');
                    if (data==1) {
                         $.ajax({
                                url: url,
                                type: 'POST',
                                dataType: 'html',
                                data: forms.serialize(),
                                beforeSend: function() {
                                    // $(".preloader").fadeOut();
                                },
                                success: function(result) {
                                    if(result=='success'){
                                        $('#myBtn').fadeOut(500).fadeIn(100);
                                        $('.btn-submit').val('2');
                                       
                                        setTimeout(function() {
                                            $('#router_ip').prop("readonly", true);
                                            $('#router_port').prop("readonly", true);
                                            $('#username').prop("readonly", true);
                                            $('#password').prop("readonly", true);
                                            $('#myBtn').stop().animate({opacity:'100'});
                                            $('#myBtn').html('Save Data');
                                        },500);
                                    }else{
                                        $('#myBtn').fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(1000);
                                        $('#myBtn').removeClass('btn-success').addClass('btn-danger');
                                        $('.btn-sbm').removeClass('text-right').addClass('text-center');
                                        $('#myBtn').html('<b>FAILED TO CONNECT TO MIKROTIK!</b>');
                                        setTimeout(function () {
                                            $('.btn-submit').val(1);
                                            $('.btn-sbm').removeClass('text-center').addClass('text-right');
                                            $('#myBtn').removeClass('btn-danger').addClass('btn-success');
                                            $('#myBtn').stop().animate({opacity:'100'});
                                            $('#myBtn').html('Check Conection');
                                        }, 4000);
                                    }
                                },error:function(e){
                                    alert('error');
                                    location.reload();
                                }
                            });
                    }else if(data==2){
                        $.ajax({
                                url: base_url+'/router/save',
                                type: 'POST',
                                dataType: 'html',
                                data: forms.serialize(),
                                beforeSend: function() {
                                    // $(".preloader").fadeOut();
                                },
                                success: function(result) {
                                    if(result=='success'){
                                        $('#myBtn').fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(1000);
                                        $('#myBtn').removeClass('btn-success').addClass('btn-info');
                                        $('.btn-sbm').removeClass('text-right').addClass('text-center');
                                        $('#myBtn').html('<b>SUCCESS TO ADD DATA ROUTER!</b>');
                                        setTimeout(function () {
                                            $('#router_ip').val('').prop("readonly", false);
                                            $('#router_port').val('').prop("readonly", false);
                                            $('#username').val('').prop("readonly", false);
                                            $('#password').val('').prop("readonly", false);
                                            $('#router_name').val('').prop("readonly", false);
                                            $('.btn-submit').val(1);
                                            $('.btn-sbm').removeClass('text-center').addClass('text-right');
                                            $('#myBtn').removeClass('btn-info').addClass('btn-success');
                                            $('#myBtn').stop().animate({opacity:'100'});
                                            $('#myBtn').html('Check Conection');
                                        }, 4000);



                                       $('.table-responsive').fadeOut(2000);
                                      setTimeout(function() {
                                           $('.table-responsive').load(base_url+'/router/load');
                                      },2000);
                                       $('.table-responsive').fadeIn(2000);
                                    }else{
                                        alert('error');
                                        // location.reload();
                                    }
                                },error:function(e){
                                    alert('error');
                                    // location.reload();
                                }
                            });
                    }
                }
                
            }
            form.classList.add('was-validated');
        }, false);
    });




$('.table-responsive').load(base_url+'/router/load');


        $("#model-error-icon").click(function () {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        });
