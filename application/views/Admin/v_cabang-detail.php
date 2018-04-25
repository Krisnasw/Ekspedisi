<!-- Breadcumbs -->
	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master cabang</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li>Data Cabang</li>
                            <li class="active">Detail Cabang</li>
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
            <h3 class="box-title">Detail cabang</h3>
            
            <!-- Nav tabs -->
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link pull-left" aria-controls="home1" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Data Cabang</span></a></li>
                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link pull-right" aria-controls="profile1" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Data Penanggung Jawab Cabang</span></a></li>
        
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home1">
                    
                    <?php foreach($cabang as $data){ ?>
                        <hr>
                        <h3 align="center">Detail cabang</h3>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-6">Nama cabang</label>
                            <label class="col-md-6"><?php echo $data->nama_cabang ?></label></div>

                        <div class="form-group">
                            <label class="col-md-6">Kode cabang</label>
                            <label class="col-md-6"><?php echo $data->kode_cabang ?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Alamat cabang</label>
                            <label class="col-md-6">
                             <?php echo $data->alamat ?>
                            <label></div>

                        <div class="form-group">
                            <label class="col-md-6">Nomor Telphone</label>
                            <label class="col-md-6">
                             <?php echo $data->telp_cabang ?>
                            <label></div>

                          
                    <div class="clearfix"></div>
                </div> 

                
            <?php } ?>
 
                
            <?php 

            if ($karyawan->num_rows() == 0) {
              ?>
              <div role="tabpanel" class="tab-pane fade" id="profile1">
                    
                         <h3>Belum ada Manager di Cabang ini</h3>
                    <div class="clearfix"></div>
                </div>
              <?php
            } else {



            foreach($karyawan->result() as $zz){ ?>                   
                <div role="tabpanel" class="tab-pane fade" id="profile1">
                         <hr>
                        <h3 align="center">Nama Manager / Karyawan</h3>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-6">Nama Karyawan</label>
                            <label class="col-md-6"><?php echo $zz->nama_karyawan ?></label></div>

                        <div class="form-group">
                            <label class="col-md-6">Jenis Kelamin</label>
                            <label class="col-md-6">
                                <?php echo $zz->jenis_kelamin == 'L'? 'Laki Laki' : 'Perempuan'; ?>
                            </label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Alamat Lengkap</label>
                            <label class="col-md-6"><?php echo $zz->alamat_karyawan ?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Tempat Tanggal Lahir</label>
                            <label class="col-md-6"><?php echo $zz->tempat_lahir.", ".date("d-m-Y" , strtotime($zz->tgl_lahir))?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Nomor Telphone</label>
                            <label class="col-md-6"><?php echo $zz->nomor_telp ?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Gaji</label>
                            <label class="col-md-6"><?php echo 'Rp '.number_format($zz->gaji) . ',-' ?></label></div>

                    <div class="clearfix"></div>
                </div>
                <?php }} ?>
                
            </div>
            <hr>
            <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('Cabang')?>'">Kembali</button>
        </div>
    </div>
 </div>