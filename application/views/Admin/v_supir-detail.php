<!-- Breadcumbs -->
	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Karyawan</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li>Data Supir</li>
                            <li class="active">Detail Data Supir</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->




          </div> 

<div class="row">
	<div class="col-md-3"></div>
 <div class="col-md-6">
        <div class="white-box">
            <h3 class=" m-b-0">Biodata Supir</h3>
            <p class="text-muted m-b-30 font-13"> Berikut biodata Supir lengkap</p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form class="form-horizontal">
                    	<?php foreach($supir as $data){ ?>
                        <div class="form-group">
                            <label class="col-md-6">Nama Lengkap Karyawan</label>
                            <label class="col-md-6"><?php echo $data->nama_supir ?></label></div>

                        
                        <div class="form-group">
                            <label class="col-md-6">Alamat Lengkap</label>
                            <label class="col-md-6"><?php echo $data->alamat_supir ?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Tempat Tanggal Lahir</label>
                            <label class="col-md-6"><?php echo $data->tempat_lahir_supir.", ".date("d-m-Y" , strtotime($data->tgl_lahir_supir)); ?></label></div>
                        
                        <div class="form-group">
                            <label class="col-md-6">Usia</label>
                            <label class="col-md-6"><?php echo $data->usia.' Tahun'; ?></label></div>

                        <div class="form-group">
                            <label class="col-md-6">Nomor Telphone</label>
                            <label class="col-md-6"><?php echo $data->nomor_telp ?></label></div>
                        
                        
                        <!-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"></button> -->
                        <button type="button" onclick="window.history.back()" class="btn btn-inverse waves-effect waves-light">Kembali</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- div -->
</div>	