<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Laporan Nota Tagihan </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Laporan Nota Tagihan</li>
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
            <h3 class="box-title m-b-0">List Toko Per Periode</h3>
            <br>
            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Discount</th>
                                <th>Nama NPWP</th>
                                <th>Nomor NPWP</th>
                                <th>Aksi</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($supir as $val) {
                        ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>    
                        <?php
                            }
                         ?>
                    </tbody>
                </table>
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
                            <th>No</th>
                            <th>Kode Nota</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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