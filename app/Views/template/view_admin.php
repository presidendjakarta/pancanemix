
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>/assets/images/favicon.png">
    <title><?php echo (isset($title))?"$title - ":'' ?>Pancanemix</title>

    <link href="<?php echo base_url()?>/dist/css/style.min.css" rel="stylesheet">
    <?php 
        if (isset($css)) {
            echo get_css($css);
        }

     ?>
    <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> -->
    <!-- <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img src="<?php echo base_url()?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url()?>/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <img src="<?php echo base_url()?>/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url()?>/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                     <?php echo $this->include('template/spare/_menuNav') ?> 
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
             <?php 
                if ($sess['akses']==='superman') {
                     echo $this->include('template/spare/_menuAdmin');
                }elseif ($sess['akses']==='users') {
                     echo $this->include('template/spare/_menuUsers');
                }else{
                     echo $this->include('template/spare/_menuCustomer');
                }
             ?>
        </aside>
        <div class="page-wrapper">
            <?php echo $this->include('template/spare/_conBreadCum') ?> 
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                     <?php echo $this->include('template/pages/'.$page) ?> 
                    </div>
                </div>
            </div>
            <footer class="footer">
                © 2020 Pancanemix By : Pancanesia Digital
            </footer>
        </div>
    </div>
    <script type="text/javascript"> var base_url = '<?php echo base_url()?>'; </script>
    <script src="<?php echo base_url()?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/dist/js/app.min.js"></script>
    <script src="<?php echo base_url()?>/dist/js/app.init.dark.js"></script>
    <script src="<?php echo base_url()?>/dist/js/app-style-switcher.js"></script>
    <script src="<?php echo base_url()?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="<?php echo base_url()?>/dist/js/waves.js"></script>
    <script src="<?php echo base_url()?>/dist/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url()?>/dist/js/custom.min.js"></script>
    <!-- TARUH JS DI BAWAH SINI -->

    <?php 
        if (isset($js)) {
            echo get_js($js);
        }

     ?>

</body>

</html>