
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>/assets/images/favicon.png">
    <title>Login - Pancanemix</title>
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url()?>/assets/images/background/login-register.jpg) no-repeat center center; background-size: cover;">
             <div class="auth-box p-4 bg-white rounded">
                <div id="loginform">
                    <div class="logo">
                        <h3 class="box-title mb-3">Sign In</h3>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div id="notif"></div>
                            <?php echo form_open('auth/validation','class="form-horizontal mt-3 form-material" id="formLogin"') ?>

                                <div class="form-group mb-3">
                                    <div class="">
                                        <input class="form-control" name="username" type="text"  placeholder="Username"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="">
                                        <input class="form-control" name="password" type="password"  placeholder="Password"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <div class="checkbox checkbox-info pt-0">
                                            <input id="checkbox-signup" name="remember" type="checkbox" class="material-inputs chk-col-indigo">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div> 
                                       
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4">
                                    <div class="col-xs-12">
                                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                        <div class="social mb-3">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grsoup mb-0 mt-4 text-center">
                                    &copy; Copyright 2020, Pancanemix
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <script src="<?php echo base_url()?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
    var base_url = '<?php echo base_url()?>';
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
     $("#notif").fadeOut("1");
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 

    $('#formLogin').submit(function(e) {
        e.preventDefault();
        $(".preloader").fadeIn();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: form.serialize(),
            beforeSend: function() {
                $(".preloader").fadeOut();
            },
            success: function(result) {
                // alert(result.data.csrf_code);
                $("input[name='csrf_token']").val(result.data.csrf_token);
                $("#notif").html(result.data.load).fadeIn(2000).delay(1000).fadeOut("slow");
                $("input[name='password']").val('');
                if (result.data.msg=='success login') {
                    setTimeout(function () {
                       window.location.href = base_url+result.data.redir;
                    }, 3000);
                }
            },error:function(e){
                alert('error');
            }
        });
        
    });
    </script>
</body>

</html>