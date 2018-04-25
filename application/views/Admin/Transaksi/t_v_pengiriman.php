<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Pengiriman Barang </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Pengiriman</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>


<div class="row">
<div class="col-md-12">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Data Pengirim</h3>
        <p class="text-muted m-b-30 font-13"> Isilah data Pengirim dengan benar</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Pilih Truk</label>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option>Pilih Truk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Pilih Tanggal</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
            
            <div class="white-box">
                <h3 class="box-title m-b-0">Pilih Supir</h3>
                <br>
                <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label col-md-3">Pilih Nota</label>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option>Pilih Nota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-3">Quantity</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-3">Quantity Ordered</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" min="0">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br />
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nota</th>
                                <th>Quantity</th>
                                <th>Quantity Ordered</th>
                                <!-- <th>Tarif per KG</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- 
        |
        | Table Truck
        |
     -->
    <div class="col-md-5">
            
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Rincian Truck</h3>
            <br>
            <div class="table-responsive">


                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode Supir</th>
                            <th>Nomor Polisi</th>
                            <th>Nama Supir</th>
                            <th>Pilih Supir</th>
                            <!-- <th>Tarif per KG</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($supir as $val) {
                        ?>
                            <tr>
                                <td><?php echo $val->kode_supir ?></td>
                                <td><?php echo $val->nomor_polisi ?></td>
                                <td><?php echo $val->nama_supir ?></td>
                                <td>    
                                    <input id="radio" type="radio" name="supir" value="<?php echo $val->kode_supir ?>"> 
                                    <label for="radio">Pilih</label>
                                </td>
                            </tr>    
                        <?php
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-7">
            
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Rincian Nota & Barang</h3>
            <br>
            <div class="table-responsive">


                <table id="mytable2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode Supir</th>
                            <th>Nomor Polisi</th>
                            <th>Nama Supir</th>
                            <th>Pilih Supir</th>
                            <!-- <th>Tarif per KG</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($supir as $val) {
                        ?>
                            <tr>
                                <td><?php echo $val->kode_supir ?></td>
                                <td><?php echo $val->nomor_polisi ?></td>
                                <td><?php echo $val->nama_supir ?></td>
                                <td>    
                                    <input id="radio" type="radio" name="supir" value="<?php echo $val->kode_supir ?>"> 
                                    <label for="radio">Pilih</label>    
                                </td>
                            </tr>    
                        <?php
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- 
        |
        | Data Penerima -============================
        |
     -->
    
</div>

<!-- ::Konten -->

   




</div>
<script type="text/javascript">
  

  //  if ( $("#radio").prop("checked" , true) == true ) {
        
  // alert('hello');
  //  }

</script>