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
                            <li class="active">Data Toko</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->




                </div> 

<div class="col-lg-12 col-sm-6 col-xs-12">
    <div class="white-box">
        <h5 class="title m-b-0"><b align="center"> = Toko = </h5></b>
        <br>
        <!-- <p class="text-muted m-b-40">Use default tab with class <code>nav-tabs</code></p> -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item" aria-expanded="false"><a href="#bank" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Data Toko</span></a></li>
            <li role="presentation" class="nav-item"><a href="#form" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Input Data Toko</span></a></li>
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
                                        <th>Nama Toko</th>
                                        <th>Discount</th>
                                        <th>Nama NPWP</th>
                                        <th>Nomor NPWP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                    $number 	=	1;
                                    foreach ($toko as $data) { ?>
                                    <tr>
                                    	<td><?php echo $number++; ?> </td>
                                        <td><?php echo $data->nama_toko ?></td>
                                        <td>
                                        	<?php echo $data->disc.' %'; ?>
                                        </td>
                                        <td><?php echo $data->nama_npwp ?></td>
                                        <td><?php echo $data->npwp ?></td>
                                        <td>	
                                        	<a class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-title="Hapus" href="javascript:void(0)" onclick="window.location.href='<?php echo base_url("Control_Toko/Delete/".$data->id_toko) ?>'" ><i class="fa fa-trash"></i></a>
                                        	<a class="btn btn-sm btn-circle btn-primary" data-toggle="modal" href="#data_<?php echo $number ?>" ><i data-toggle="tooltip" data-title="Edit" class="fa fa-pencil"></i></a>
                                        	<a class="btn btn-sm btn-circle btn-warning" data-toggle="tooltip" data-title="Detail Toko" href="javascript:void(0)" onclick="window.location.href='<?php echo base_url("DetailToko/".$data->id_toko) ?>'"><i class="fa fa-search"></i></a>
                                        </td>
                                    	<div class="modal fade bs-example-modal-lg" tabindex="-1" id="data_<?php echo $number ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myLargeModalLabel">Update Toko</h4> </div>
                        <div class="modal-body">
                            
        	<!-- Form  -->
          
          	<form class="form-horizontal" method="post" action='<?php echo base_url('Control_Toko/Update/').$data->id_toko ?>' id="form1">
                <div class="form-group">
                    <label class="col-md-12">Nama Pemilik Toko </label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $data->owner_toko ?>" name="owner_toko" class="form-control" > </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="example-email">Jenis Toko</label>
                    <div class="col-md-12">
                       <input type="text" name="jenis_toko" value="<?php echo $data->jenis_toko ?>"  class="form-control" > </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12">Nomor Telp Toko</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $data->telp_toko ?>" class="form-control" name="telp_toko" data-mask="999-9999-9999" onkeypress='validate(event)'> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Alamat Toko</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $data->alamat_toko ?>" class="form-control" name="alamat" > </div>
                </div>

                <h3><p>INFORMASI DATA TOKO</p></h3>
                <!-- <hr> -->
                <div class="form-group">
                    <label class="col-md-12">Nama Toko</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="nama_toko" value="<?php echo $data->nama_toko ?>" > </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="example-email">Email Toko</label>
                    <div class="col-md-12">
                       <input type="email" value="<?php echo $data->email_toko ?>"  name="email_toko" class="form-control" > </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Discount Toko</label>
                    <div class="col-md-12">
                        <input type="number" value="<?php echo $data->disc ?>" class="form-control" onkeypress='validate(event)' max='100' min='1' name="disc_toko" > </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Npwp Toko</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $data->npwp ?>" name="npwp_toko" class="form-control" onkeypress='validate(event)' data-mask='99.999.999.9-999.999' > </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Nama Npwp</label>
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $data->nama_npwp ?>" class="form-control" name="nama_npwp_toko" > </div>
                </div>
					<!-- <input type="submit" value="asd" class="btn btn-default"> -->
							
                           	<!-- Form -->
                        </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect text-right">Save</button> 

                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
				<!-- </form> -->
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- :: Modals Edit :: -->

                                    </tr>
                                    <?php } ?>
                                </tbody>
                           	</table>
                                   

                                    <!-- :: Modal Detail :: -->
                                    <!-- :: Modals Detail :: -->
                                   
                        </div>
                    </div>     
                </div>
            </div>

           
                                	


            <div role="tabpanel" class="tab-pane" id="form" aria-expanded="false">
               
                <div class="col-sm-12">
                    <div class="white-box">
                        
                        <h3><p>INFORMASI DATA PEMILIK TOKO</p></h3>
                        <hr>
                        <form class="form-horizontal" method="post" action='<?php echo base_url('Control_Toko/Save') ?>'>
                            <div class="form-group">
                                <label class="col-md-12">Nama Pemilik Toko </label>
                                <div class="col-md-12">
                                    <input type="text" name="owner_toko" class="form-control" required> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="example-email">Jenis Toko</label>
                                <div class="col-md-12">
                                   <input type="text" name="jenis_toko" class="form-control" required> </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12">Nomor Telp Toko</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="telp_toko" data-mask="999-9999-9999" onkeypress='validate(event)'> </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Alamat Toko</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="alamat" > </div>
                            </div>

                            <h3><p>INFORMASI DATA TOKO</p></h3>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-12">Nama Toko</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama_toko" > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="example-email">Email Toko</label>
                                <div class="col-md-12">
                                   <input type="email" name="email_toko" class="form-control" required> </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-md-12">Discount Toko</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control" onkeypress='validate(event)' max='100' min='1' name="disc_toko" > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Npwp Toko</label>
                                <div class="col-md-12">
                                    <input type="text" name="npwp_toko" class="form-control" onkeypress='validate(event)' data-mask='99.999.999.9-999.999' > </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Npwp</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama_npwp_toko" > </div>
                            </div>



                            
                            <button type="submit" class="btn btn-success">Kirim</button>
                            <!-- <button type="reset" class="btn btn-info">Reset</button> -->
                        </form>
                    </div>
                </div>

            </div>
           
        </div>
    </div>

                    </div>

     
