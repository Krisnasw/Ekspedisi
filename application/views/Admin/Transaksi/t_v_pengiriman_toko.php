<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Pengiriman Toko </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Pengiriman Toko</li>
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
            <h3 class="box-title m-b-0">Data Rincian Pengiriman Toko</h3>
            <br>
            <div class="table-responsive">

                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nota</th>
                            <th>List Barang</th>
                            <th>Status</th>
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
<script type="text/javascript">
  

  //  if ( $("#radio").prop("checked" , true) == true ) {
        
  // alert('hello');
  //  }

</script>