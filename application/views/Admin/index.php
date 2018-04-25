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
                              
    <!-- color CSS -->
    <link href="<?php echo base_url('asset/') ?>css/colors/blue.css" id="theme" rel="stylesheet">
    <style type="text/css">
     #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        bottom: 0px;
        margin-bottom: 22px;
        margin-right: 15px;
        min-width: 300px; 
        max-width: 800px;  
    }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<script src="<?php echo base_url('/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>

<body>
    <!-- Preloader -->
    
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
            
                        
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown"> 
                        
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    
                    
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>         
        <!-- Left navbar-header -->
        <?php $this->load->view('Admin/core_navbar') ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        
                
                <?php echo $konten; ?>
                <?php if ($this->session->flashdata('konten')) { ?>
                    <div id="notifications" class="btn waves-effect waves-light btn-square btn-info"><?php echo $this->session->flashdata('konten'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('konten_err')) { ?>
                    <div id="notifications" class="alert alert-danger"><?php echo $this->session->flashdata('konten_err'); ?></div>
                <?php } ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    
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
    <script src="<?php echo base_url('asset/')?>js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
        <?php include "myscript.js" ?>
    </script>

    
</body>

</html>