<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Pembayaran </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Pembayaran</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>


<div class="row">

    <div class="col-md-12">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Data Pembayaran</h3>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Pilih Toko</label>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option>Toko 1</option>
                                    </select>
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

    <div class="col-md-12">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Nota</h3>
        <p class="text-muted m-b-30 font-13"> Isilah data Pengirim dengan benar</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilih Nota</label>
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Pilih Nota</option>
                                </select>
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
            <h3 class="box-title m-b-0">List Nota</h3>
            <br>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Nota</th>
                            <th>Tanggal Nota</th>
                            <th>Nominal</th>
                            <!-- <th>Tarif per KG</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>1-01-2018</td>
                        <td>1.000.000</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="white-box">
        <h3 class="box-title m-b-0">Form Cara Bayar</h3>
        <p class="text-muted m-b-30 font-13"> Isilah data Pengirim dengan benar</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <form class="form-horizontal">
                <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilih Cara Bayar</label>
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Cash</option>
                                    <option>Transfer</option>
                                    <option>Giro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="nominal">
                            <label class="control-label col-md-3">Nominal</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" id="rekening">
                            <label class="control-label col-md-3">No. Rekening</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" id="nominal">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Tgl Jatuh Tempo</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Nomor Giro</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control">
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
            <h3 class="box-title m-b-0">Cara Bayar</h3>
            <br>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Nota</th>
                            <th>Tanggal Nota</th>
                            <th>Nominal</th>
                            <!-- <th>Tarif per KG</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>1-01-2018</td>
                        <td>1.000.000</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ::Konten -->

</div>
<script type="text/javascript">
  

  //  if ( $("#radio").prop("checked" , true) == true ) {
        
  // alert('hello');
  //  }

</script>