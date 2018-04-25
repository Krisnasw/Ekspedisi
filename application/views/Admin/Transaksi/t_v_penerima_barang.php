<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Penerima Barang </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Penerima Barang</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>


<div class="row">
    <!-- 
        |
        | Table Truck
        |
     -->
    <div class="col-md-12">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Pencarian Penerima Barang</h3>
        <p />
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Order No</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Tanggal</label>
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
    <!-- 
        |
        | Data Penerima -============================
        |
     -->


    <div class="col-md-12">
            
        <div class="white-box">
            <h3 class="box-title m-b-0">List Nota & Barang</h3>
            <br>
            <div class="table-responsive">


                <table id="mytable2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Nota</th>
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
    
</div>

<!-- ::Konten -->
</div>