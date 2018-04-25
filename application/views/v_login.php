<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('asset/') ?>/plugins/images/favicon.png">
    <title>System Information Expedition</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/') ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="<?php echo base_url('/')?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('/') ?>plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url('/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url('/') ?>plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('asset/') ?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/') ?>css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>asset/ckeditor/ckeditor.js" ></script>
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box m-t-40">
                <form class="form-horizontal form-material m-t-40" id="loginform" action="<?php echo base_url('Auth/do_login') ?>" method="post">
                    
                    <div class="form-group m-t-0">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password"> </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                   
                    
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url('/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('asset/')?>bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url('asset/')?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('/') ?>plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('asset/')?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('asset/')?>js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url('/') ?>plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url('/') ?>plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url('/') ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="<?php echo base_url('/') ?>plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url('/') ?>plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('asset/')?>js/custom.min.js"></script>
    <script src="<?php echo base_url('asset/')?>js/dashboard1.js"></script>
    <!-- DAtatable -->
    <script src="<?php echo base_url('/')?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- Mask Data  -->
    <script src="<?php echo base_url('asset/')?>js/mask.js"></script>
</body>

</html>