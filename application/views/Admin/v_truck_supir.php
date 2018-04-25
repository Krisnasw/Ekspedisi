<!-- Breadcumbs -->
	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Truck</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Data Truck & Supir</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->



                </div> 

<div class="col-lg-12 col-sm-6 col-xs-12">
        <div class="white-box">
            <h5 class="title m-b-0"><b align="center"> = Truck & Supir =</h5></b>
            <br>
            <!-- <p class="text-muted m-b-40">Use default tab with class <code>nav-tabs</code></p> -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item" aria-expanded="false"><a href="#truck" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Data Truck dan Supir</span></a></li>
                <li role="presentation" class="nav-item"><a href="#form" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Tambahkan Data Truck & Supir </span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="truck" aria-expanded="true">
                    <div class="col-sm-12">
                        <div>
                            <h3 class="box-title m-b-0">Data Tarif </h3>
                            <!-- <p class="text-muted m-b-30">Data dapat di Export menjadi Berikut ini:</p> -->
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Nopol Truck</th>
                                            <th>Nama Supir</th>
                                            <th>Tanggal KIR</th>
                                            <th>Tanggal Pajak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $number 	=	1;
                                        foreach ($truck as $data) { ?>
                                        <tr>
                                        	<td><?php echo $number++; ?> </td>
                                            <td><?php echo $data->nomor_polisi; ?></td>
                                        	<td><?php echo $data->nama_supir ?> </td>
                                            <td><?php echo $data->tanggal_kir ?></td>
                                            <td><?php echo $data->tanggal_pajak ?></td>
                                            <td>
                                            	<a class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-title="Hapus" href="javascript:void(0)" onclick="window.location.href='<?php echo base_url("Control_Truck/Delete/".$data->kode_supir) ?>'" ><i class="fa fa-trash"></i></a>
                                            	<a class="btn btn-sm btn-circle btn-primary" data-toggle="modal" href="#data_<?php echo $number ?>" ><i data-toggle="tooltip" data-title="Edit" class="fa fa-pencil"></i></a>
                                            	<button id="testing" onclick="lihat()" type="button" class="btn btn-sm btn-circle btn-warning"><i class="fa fa-search"></i></button>
                                            </td>
                                        </tr>

                                        <!-- :: Modal :: -->
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" id="data_<?php echo $number ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
				                                <div class="modal-dialog modal-lg">
				                                    <div class="modal-content">
				                                        <div class="modal-header">
				                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                                            <h4 class="modal-title" id="myLargeModalLabel">Update Nama Tarif</h4> </div>
				                                        <div class="modal-body">
				                                            
				                                        	<!-- Form  -->
				                                          
				                                          	<form class="form-horizontal" method="post" action='<?php echo base_url('Control_Truck/Update/').$data->id_truck ?>'>
								                                <div class="form-group">
								                                    <label class="col-md-12">Nomor Polisi Truck</label>
								                                    <div class="col-md-12">
								                                        <input type="text" class="form-control" required name="nopol" value="<?php echo $data->nomor_polisi ?>"> </div>
								                                </div>
								                                <div class="form-group">
								                                    <label class="col-md-12" for="example-email">Tanggal Terakhir KIR</label>
								                                    <div class="col-md-12">
								                                        <input type="date" class="form-control" required name="tgl_kir" value="<?php echo $data->tanggal_kir ?>"></div>
								                                </div>
								                                <div class="form-group">
								                                    <label class="col-md-12" for="example-email">Tanggal Pajak</label>
								                                    <div class="col-md-12">
								                                        <input type="date" class="form-control" required name="tgl_pajak" value="<?php echo $data->tanggal_pajak ?>"></div>
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
                                        <!-- :: Modals :: -->

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
                            <form class="form-horizontal" method="post" action='<?php echo base_url('Control_Truck/Save') ?>'>
                                <div class="form-group">
                                    <label class="col-md-12">Nomor Polisi Truck</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" required name="nopol" placeholder="L 2812 SW ..."> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email">Tanggal Terakhir KIR</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" required name="tgl_kir"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email">Tanggal Pajak</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" required name="tgl_pajak"></div>
                                </div>

                                <h3>Data Supir</h3>
                                <hr>
                                
                                <div class="form-group">
                                    <div class="col-md-4">	
                                    	<label for='input-nama'> Nama Lengkap Supir : </label>
                                    </div>
                                    <div class="col-md-8">                                    	
                                    	<input id="input-nama" type="text" class="form-control" name="supir" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">	
                                    	<label for='input-ktp'> Nomor KTP Supir : </label>
                                    </div>
                                    <div class="col-md-8">                                    	
                                    	<input id="input-ktp" type="text" class="form-control" name="no_ktp" placeholder="8216829112xx.....">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">	
                                    	<label for='input-alamat'> Alamat Lengkap Supir : </label>
                                    </div>
                                    <div class="col-md-8">                                    	
                                    	 <input type="text" class="form-control" name="alamat" id="input-alamat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">	
                                    	<label for='input-tgl-masuk'> Tanggal Masuk : </label>
                                    </div>
                                    <div class="col-md-8">                                    	
                                    	 <input type="date" class="form-control" name="tgl_masuk" id='input-tgl-masuk'>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    	<div class="col-md-6">
                                    		<label>No SIM B:</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="text" class="form-control" name="sim_b">
                                    	</div>
                                    </div>
                                	<div class="col-md-6">
                                    	<div class="col-md-6">
                                    		<label>No SIM C:</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="text" class="form-control" name="sim_c"> 
                                    	</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    	<div class="col-md-6">
                                    		<label>No Telp:</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="text" onkeypress="validate(event)" class="form-control" name="no_telp" placeholder="082721xxx...">
                                    	</div>
                                    </div>
                                	<div class="col-md-6">
                                    	<div class="col-md-6">
                                    		<label>No Telp Alternatif:</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="text" onkeypress="validate(event)" class="form-control" name="no_telp_alt" placeholder="082721xxx...">
                                    	</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                    	<div class="col-md-6">
                                    		 <label>Tempat Lahir</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="text" class="form-control" name="tempat_lahir">
                                    	</div>
                                    </div>
                                	<div class="col-md-6">
                                    	<div class="col-md-6">
                                    		<label>Tgl Lahir</label>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<input type="date" class="form-control" name="tgl_lahir"> 
                                    	</div>
                                    </div>

                                </div>
                                
                                
                                <div class="form-group">
	                              

	                              <!--   <div class="col-md-4">
	                                	<label class="col-md-6">No Sim B</label>
	                                     
	                                </div>

	                                 <div class="col-md-4">
	                                	<label class="col-md-6">No Sim C</label>
	                                    
	                                </div> -->

	                            </div>


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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal/ -->

<script type="text/javascript">
	function lihat(){
		$("#myModal").modal('show');
	}
</script>

<!-- not ready -->