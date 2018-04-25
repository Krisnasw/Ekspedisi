<!-- Breadcumbs -->
	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Toko</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li>Data Toko</li>
                            <li class="active">Detail Toko</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->




          </div> 



<div class="row">
    <div class="col-md-3"></div>
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Detail Toko</h3>
            
            <!-- Nav tabs -->
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link pull-left" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Data Pemilik Toko</span></a></li>
                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link pull-right" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Data Toko</span></a></li>
        
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home1">
                    
                    <?php foreach($toko as $data){ ?>
                        <hr>
                        <h3 align="center">Detail Pemilik Toko</h3>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-6">Nama Pemilik Toko</label>
                            <label class="col-md-6"><?php echo $data->owner_toko ?></label></div>

                        <div class="form-group">
                            <label class="col-md-6">Jenis Toko</label>
                            <label class="col-md-6">
                             <?php echo $data->jenis_toko ?>
                            <label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Alamat Toko</label>
                            <label class="col-md-6">
                             <?php echo $data->alamat_toko ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Email Toko</label>
                            <label class="col-md-6">
                             <?php echo $data->email_toko ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Telp Toko</label>
                            <label class="col-md-6">
                             <?php echo $data->telp_toko ?>
                            <label></div>

                         
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile1">
                        <hr>
                        <h3 align="center">Detail Toko</h3>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-6">Nama Toko</label>
                            <label class="col-md-6">
                             <?php echo $data->nama_toko ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Nama NPWP</label>
                            <label class="col-md-6">
                             <?php echo $data->nama_npwp ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Nomor NPWP</label>
                            <label class="col-md-6">
                            <?php echo $data->npwp ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Discount Toko</label>
                            <label class="col-md-6">
                            <?php echo $data->disc.' %' ?>
                            <label></div>

                    <div class="clearfix"></div>
                    <?php } ?>
                </div>
                
                
            </div>
            <hr>
            <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('Toko')?>'">Kembali</button>
        </div>
    </div>
 </div>