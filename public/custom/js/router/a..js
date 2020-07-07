 $('.btn-submit').val(0);
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    

                    if (form.checkValidity() === false) {
                        event.stopPropagation();
                    }else{
                        
                        $('#myBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                        $('#myBtn').attr("disabled", true);
                        var url = forms.attr('action');
                        if (data=='1') {
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
                                        $('#myBtn').attr("disabled", false);
                                        setTimeout(function() {
                                            $('#myBtn').stop().animate({opacity:'100'});
                                            $('#myBtn').html('Save Data');
                                        },500);
                                    }else{
                                        $('.btn-submit').val(0);
                                        $('#myBtn').fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(500).fadeOut(1000).fadeIn(1000);
                                        $('#myBtn').attr("disabled", true).removeClass('btn-success').addClass('btn-danger');
                                        $('.btn-sbm').removeClass('text-right').addClass('text-center');
                                        $('#myBtn').html('<b>FAILED TO CONNECT TO MIKROTIK!</b>');
                                        setTimeout(function () {
                                            $('.btn-sbm').removeClass('text-center').addClass('text-right');
                                            $('#myBtn').attr("disabled", false).removeClass('btn-danger').addClass('btn-success');
                                            $('#myBtn').stop().animate({opacity:'100'});
                                            $('#myBtn').html('Check Conection');
                                        }, 4000);
                                    }
                                },error:function(e){
                                    alert('error');
                                    // location.reload();
                                }
                            });
                        }

                        // alert('asd');
                    }
                    form.classList.add('was-validated');
                }, false);
            });