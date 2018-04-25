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
                            <li class="active">Data Karyawan</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->




                </div> 

<div class="col-lg-12 col-sm-6 col-xs-12">
    <div class="white-box">
        <h5 class="title m-b-0"><b align="center"> = Karyawan =</h5></b>
        <br>
        <!-- <p class="text-muted m-b-40">Use default tab with class <code>nav-tabs</code></p> -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item" aria-expanded="false"><a href="#bank" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Data Karyawan</span></a></li>
            <li role="presentation" class="nav-item"><a href="#form" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Input Data Karyawan</span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="bank" aria-expanded="true">
                <div class="col-sm-12">
                    <div>
                        <h3 class="box-title m-b-0">Data Bank </h3>
                        <!-- <p class="text-muted m-b-30">Data dapat di Export menjadi Berikut ini:</p> -->
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Telp</th>
                                        <th>Salary</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                    $number 	=	1;
                                    foreach ($karyawan as $data) { ?>
                                    <tr>
                                    	<td><?php echo $number++; ?> </td>
                                        <td><?php echo $data->nama_karyawan ?></td>
                                        <td>
                                        	<?php 

                                        	echo $data->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan';

                                        	?>
                                        </td>
                                        <td><?php echo $data->nomor_telp ?></td>
                                        <td><?php echo 'Rp . '.number_format($data->gaji).' ,-'; ?></td>
                                        <td>	
                                        	<a class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-title="Hapus" href="javascript:void(0)" onclick="window.location.href='<?php echo base_url("Control_Karyawan/Delete/".$data->id_karyawan) ?>'" ><i class="fa fa-trash"></i></a>
                                        	<a class="btn btn-sm btn-circle btn-primary" data-toggle="modal" href="#data_<?php echo $number ?>" ><i data-toggle="tooltip" data-title="Edit" class="fa fa-pencil"></i></a>
                                        	<a class="btn btn-sm btn-circle btn-warning" data-toggle="tooltip" data-title="Detail Biodata Karyawan" href="javascript:void(0)" onclick="window.location.href='<?php echo base_url("DetailKaryawan/".$data->id_karyawan) ?>'"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>

                                    <!-- :: Modal Edit :: -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="data_<?php echo $number ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		                                <div class="modal-dialog modal-lg">
		                                    <div class="modal-content">
		                                        <div class="modal-header">
		                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                                            <h4 class="modal-title" id="myLargeModalLabel">Update Karyawan</h4> </div>
		                                        <div class="modal-body">
		                                            
		                                        	<!-- Form  -->
		                                          
		                                          	<form class="form-horizontal" method="post" action='<?php echo base_url('Control_Karyawan/Update/').$data->id_karyawan ?>'>
						                                <div class="form-group">
							                                <label class="col-md-12">Nama Karyawan </label>
							                                <div class="col-md-12">
								                                    <input type="text" name="nama_karyawan" class="form-control" required value="<?php echo $data->nama_karyawan?>"> </div>
								                            </div>
								                            <div class="form-group">
								                                <label class="col-md-12" for="example-email">Jenis Kelamin</label>
								                                <div class="col-md-12">
								                                   <select class="form-control" name="jk"> 
								                                   	<?php 
								                                   		if ($data->jenis_kelamin == "L") {
								                                   			?>
								                                   			<option value="L" selected>Laki Laki</option>
								                                   			<?php
								                                   		} else {
								                                   			?>
								                                   			<option value="L">Laki Laki</option>
								                                   			<?php
								                                   		}

								                                   		if ($data->jenis_kelamin == "P") {
								                                   			?>
								                                   			<option value="P" selected>Perempuan</option>
								                                   			<?php
								                                   		} else {
								                                   			?>
								                                   			<option value="P">Perempuan</option>
								                                   			<?php
								                                   		}
								                                   	 ?>
								                                   </select></div>
								                            </div>
								                            <div class="form-group">
								                                <div class="col-md-6">
								                                <label class="col-md-6">Tempat</label>
								                                    <input type="text" value="<?php echo $data->tempat_lahir ?>" class="form-control" name="tempat_lahir"> </div>
								                            
								                            
								                                <div class="col-md-6">
								                                	<label class="col-md-6">Tanggal Lahir</label>
								                                    <input type="date" value="<?php echo $data->tgl_lahir ?>" class="form-control" name="tgl_lahir"> 
								                                </div>
								                            </div> 

								                            <div class="form-group">
							                                <label class="col-md-12">Alamat Karyawan </label>
							                                <div class="col-md-12">
								                                    <input class="form-control" type="text" name="alamat" value="<?php echo $data->alamat_karyawan ?>">
								                            </div>
								                            	

								                            <div class="form-group">
								                                <label class="col-md-12">Nomor Telphone</label>
								                                <div class="col-md-12">
								                                    <input type="text" value="<?php echo $data->nomor_telp ?>" class="form-control" name="no_telp" onkeypress='validate(event)'> </div>
								                            </div>
								                            <div class="form-group">
								                                <label class="col-md-12">Gaji</label>
								                                <div class="col-md-12">
								                                    <input type="text" value="<?php echo $data->gaji ?>"  class="form-control" name="salary" onkeypress='validate(event)'> </div>
								                            </div> 
						                                
						                               
                    								
		                                           	<!-- Form -->
		                                        </div>
		                                        <div class="modal-footer">
		                                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
		                                            <button type="submit" class="btn btn-primary waves-effect text-right">Kirim</button>
		                                        </div>
		                                    </div></form>
		                                    <!-- /.modal-content -->
		                                </div>
		                                <!-- /.modal-dialog -->
		                            </div>
                                    <!-- :: Modals Edit :: -->

                                    <!-- :: Modal Detail :: -->
                                    <!-- :: Modals Detail :: -->

                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="form" aria-expanded="false">
               
                <div class="col-sm-12">
                    <div class="white-box">
                        
                        <h2><p class="text-muted m-b-30 font-13 box-title"> Isilah form Data berikut.</p></h2>
                        <form class="form-horizontal" method="post" action='<?php echo base_url('Control_Karyawan/Save') ?>'>
                            <div class="form-group">
                                <label class="col-md-12">Nama Karyawan </label>
                                <div class="col-md-12">
                                    <input type="text" name="nama_karyawan" class="form-control" required> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="example-email">Jenis Kelamin</label>
                                <div class="col-md-12">
                                   <select class="form-control" name="jk"> 
                                   	<option value="L">Laki Laki</option>
                                   	<option value="P">Perempuan</option>
                                   </select></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                <label class="col-md-6">Tempat</label>
                                    <input type="text" class="form-control" name="tempat_lahir"> </div>
                            
                            
                                <div class="col-md-6">
                                	<label class="col-md-6">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir"> 
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-12">Alamat :</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="alamat"> </div>
                            </div>
                            

                            <hr>

                            <div class="form-group">
                                <label class="col-md-12">Nomor Telphone</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="no_telp" onkeypress='validate(event)'> </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Gaji</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="salary" onkeypress='validate(event)'> </div>
                            </div> 
                            
                            <button type="submit" class="btn btn-success">Kirim</button>
                            <button type="reset" class="btn btn-info">Reset</button>
                        </form>
                    </div>
                </div>

            </div>
           
        </div>
    </div>

                    </div>

     
