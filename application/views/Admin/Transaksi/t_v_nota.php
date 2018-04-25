	<!-- Breadcumbs -->
	
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Cabang</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Data Nota</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->




                </div> 

                <div class="white-box">
                        <h3><b>Nota Order</b></h3>
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="nav-item active" aria-expanded="false">
                                <a href="#home" class="nav-link" aria-controls="home" id="tab_home" role="tab" data-toggle="tab" aria-expanded="true">
                                <span class="visible-xs"><i class="ti-home"></i></span>
                                <span class="hidden-xs"> List</span>
                            </a>
                            </li>
                            <li role="presentation" class="nav-item">

                                <a href="#profile" class="nav-link" aria-controls="profile" role="tab" id="tab_nota" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="ti-user"></i></span>
                                    <span class="hidden-xs">Detail </span>
                                </a>
                            </li>    
                            </ul> -->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home" aria-expanded="true">
                                    <table id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Nota</th>
                                                <th>Pengirim</th>
                                                <th>Penerima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach($nota->result() as $value){ ?>
                                            <tr> 
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $value->id_nota ?></td>
                                                <td><?php echo $value->nama_toko_pengirim ?></td>
                                                <td><?php echo $value->nama_toko ?></td>
                                                <td>
                                                    <button onclick="detail_nota(<?php echo $value->id_nota ?>)" data-toggle="tooltip" data-title="Lihat Nota" class="btn btn-success"><i class="fa fa-search"></i></button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile" aria-expanded="false">
                                    <div class="white-box printableArea">
                                        <!-- Nota -->
                            <h3><b>NOTA</b> <span class="pull-right" id="id_nota"></span></h3>
                            <hr>
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h4 class="font-bold">Pengirim :</h4>
                                        <p id="nama_pengirim">MSI Indonesia,</p>
                                        <p id="alamat_pengirim">Jl Kusuma Bangsa,</p>
                                        <p id="telp_pengirim">03129217127</p>
                                        Jumlah jenis Barang<p id="jumlah_barang"> </p>
                                </div>
                                <div class="pull-right text-right"> <address>
                                       <h4 class="font-bold">Penerima :</h4>
                                        <p id="nama_penerima"></p>
                                        <p id="alamat_penerima">Jl Kusuma Bangsa,</p>
                                        <p id="telp_penerima">03129217127</p>
                                        <p>
                                            <i class="fa fa-calendar" data-toggle="tooltip" data-title="Tanggal Nota"></i> <?php echo date("Y-m-d H:i:s") ?></p>
                                            
                                        </address> </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th class="center">Jumlah Coli</th>
                                                    <th class="text-center">Total Kilo</th>
                                                    <th class="text-center">Total Kubik</th>
                                                    <th class="text-center">Type Harga</th>
                                                    <th class="text-center">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="value_barang">
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="text-right"><b>Total Jumlah Coli</b></td>
                                                    <td class="text-center" id="jumlah_coli"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>Total Harga</b></td>
                                                    <td class="text-center" id="total_harga"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                       
                                        <p>discount (penerima) :</p><b><p id="discount"></p></b>
                                        <p>Jumlah discount anda :<b id="jumlah_discount"></b></p>
                                        <p></p>
                                        <hr>
                                        <h3><b>Total :</b> <b id="jumlah_harga"></b></h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit" onclick="back_list()"> Kembali </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script type="text/javascript">
       
    function detail_nota(id){
        $("#home").removeClass('active');
        $("#profile").addClass('active');
        
        $.ajax({
            url : "<?php echo base_url('C_Transaksi/Nota/') ?>"+id,
            method : "post",
            dataType: "json",
            async: false,
        }).success(function(response){
            obj = response;
            $("#nama_pengirim").html(obj.nama_pengirim);
            $("#alamat_pengirim").html(obj.alamat_pengirim);
            $("#telp_pengirim").html(obj.telp_pengirim);
            $("#nama_penerima").html(obj.nama_penerima);
            $("#alamat_penerima").html(obj.alamat_penerima);
            $("#telp_penerima").html(obj.telp_penerima);
            $("#id_nota").html(obj.id_nota);
            $("#total_harga").html(obj.total_harga);
            $("#discount").html(obj.disc);
            $("#jumlah_harga").html(obj.fix);
            $("#jumlah_coli").html(obj.jumlah_coli);
            $("#jumlah_barang").html(obj.jumlah_barang);
            $("#jumlah_discount").html(obj.total_disc);
            data_barang_per_nota(id);
        })
    } 

    function back_list(){
        $("#home").addClass('active');
        $("#profile").removeClass('active');

    }

    function data_barang_per_nota(id){
        
        $.ajax({
              type: "ajax",
              url: "<?php echo base_url('C_Transaksi/nota_barang/') ?>"+id,
              async: false,
              dataType: 'json',
              success: function(data){
                var html ='';
                var i;
                var jumlah_barang = 0;
                for ( i = 0; i < data.length ; i++) {
                    html += 
                        '<tr>'+
                            '<td class="text-center">'+data[i].nama_barang+'</td>'+
                            '<td class="text-center">'+data[i].jumlah_barang+'</td>'+
                            '<td class="text-center">'+data[i].berat_barang+'</td>'+
                            '<td class="text-center">'+data[i].kubik_barang+'</td>'+
                            '<td class="text-center">'+data[i].type_harga+'</td>'+
                            '<td class="text-center">'+data[i].harga_barang+'</td>'+
                        '</tr>'
                }
                $("#value_barang").html(html);
              }
        })
    }

     $(document).ready(function () {
            $("#print").click(function () {
              
              window.print(); 
              
            });
        });

</script>

     
