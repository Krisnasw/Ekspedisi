<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Transaksi Order</h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Order</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>

<!-- /Breadcumbs -->
<!-- <?php 
        $string         =   '1234567890';
        $kode           =   '';
        for ($i=0; $i<5; $i++) { 
            $pos        = rand(0 , strlen($string) -1);
            $kode      .= $string{$pos};
        }
?> -->


<!-- ::Konten  -->

    <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box col-md-12">
                            <div class="col-md-6">
                                <h3 class="box-title m-b-0 col-sm-6">Pengisian Pengirim</h3>
                            <p class="text-muted m-b-30 font-13">Harap mengisi data dengan Benar</p>
                              
                            <!-- Form pengirim -->
                                <form id="data_semua_pengiriman">
                                <div class="form-group">
                                    <label for="nama_pengirim" class="col-sm-3 control-label">Nama Toko</label>
                                    <div class="col-sm-9">
                                       <select class="form-control" name="toko_pengirim" onChange="get()" id='id_toko'>
                                        <?php 

                                            if ($nama_toko->num_rows() == 0) {
                                               echo "<option  value='0'> Manual </option>";
                                            } else {

                                                echo "<option value='0'> Manual </option>";    

                                                foreach ($nama_toko->result() as $key) {
                                                    
                                                    echo "<option value='".$key->id_toko."'>".$key->nama_toko."</option>";
                                                }

                                            }  
                                         ?>
                                       </select>
                                   </div>
                                </div>
                                <!-- hidden --> <input type="hidden" name="toko_pengirim_auto" id='nama_pengirim_hidden'>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="manual_toko" name="toko_pengirim_manual" placeholder="Nama toko" ></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telp Toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" onkeypress='validate(event)' name="telp_pengirim"  class="form-control" id="telp" placeholder="0821xxxx"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Alamat toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="alamat_pengirim" id="alamat" placeholder="Alamat Lengkap"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4" class="col-md-3 control-label">Discount Pengirim(%)</label>
                                    <div class="col-md-3">
                                        <input type="number" name="disc_pengirim" min="1" max="100" class="form-control" id="disc"> </div>
                                    <label for="inputPassword4" class="col-md-3 control-label">Discount Penerima(%)</label>
                                    <div class="col-md-3">
                                        <input type="number" name="disc_penerima" min="1" max="100" class="form-control" id="terimadisc"> </div>
                                </div>
                            
                            </div>
                            
                            <!-- /.Form pengirim -->

                            <!-- Form Penerima -->
                            <div class="col-md-6">
                            <h3 class="box-title m-b-0 col-sm-6">Pengisian Penerima</h3>
                            <p class="text-muted m-b-30 font-13">Harap mengisi data dengan Benar</p>
                            
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Toko</label>
                                    <div class="col-sm-9">
                                       <select class="form-control" onChange="ambil()" id='id_toko2' name="toko_penerima">
                                            <!-- something jquery will be adden here -->
                                            <option>Penerima</option>
                                       </select>
                                   </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="toko_penerima_manual" class="form-control" id="penerima_toko" placeholder="Nama Toko Penerima"></div>
                                </div>
                                <!-- Hidden nama toko --> <input type="hidden" name="toko_penerima_auto" id='nama_penerima_hidden'>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Telp Toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" onkeypress='validate(event)' name="telp_penerima" class="form-control" id="terimatelp" placeholder="0821xxxx"></div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Alamat toko</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="terimaalamat" name="alamat_penerima" placeholder="Alamat Lengkap"> </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Pilih Perjalanan</label>
                                    <div class="col-sm-6">
                                        <div class="col-md-6">
                                            
                                        <select class="form-control" name="asal" id='asal'>
                                            <option value='0'>Asal</option>
                                            <?php 

                                            foreach($tarif->result() as $asal){
                                                echo "<option value='".$asal->kota_asal."'>".$asal->kota_asal."</option>";
                                            }

                                             ?>
                                        </select>

                                        </div>
                                        
                                        <div class="col-md-6">
                                            
                                        <select class="form-control" name="tujuan" id='tujuan' onChange="get_harga()">
                                            <option value="0">Tujuan</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3">
                                            <label>Kubik:
                                                <label id="kubik"></label>  
                                             </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Kilo :
                                                <label id="kilo"></label>
                                                </label>
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <hr>
                                <div class="form-group">
                                    <!-- <label for="inputPassword3" class="col-sm-3 control-label">Alamat toko</label> -->
                                    <div class="col-sm-9">
                                        <button class="btn btn-success" type="button" onclick="Btnaddbarang()"><i class="fa fa-plus"></i> Tambah Barang</button></div>
                                </div>

                                
                            
                            </div>
                            <!-- Form /Penerima -->
                            </form>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                     <div class="col-sm-12">
            
        <div class="white-box" id="kontenbarang" style="display:none;">
            <div class="box-title">
                Data barang dalam Order.
            </div>
            <form class="form-horizontal" id='barangForm' action='<?php echo base_url('C_Transaksi/Save_Barang') ?>'>
                <div class="form-group">
                    <div class="col-md-4">
                        <input readonly='' class="form-control" id="kode_nota" class="mustignore" name="nota"> 
                    </div>
                    <div class="col-md-4"><input type="text" name="nama_barang" class="form-control" id="nambar" placeholder="Nama Barang"></div>
                    <div class="col-md-4"><input type="number" name='berat_barang' max='40' min='2' class="form-control" id="beratbar" placeholder="Berat Barang (Kg)"> </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4"><input type="number" name='kubik_barang' min="2" max='40' class="form-control" id="kubikbar" placeholder="Kubik Barang (M&sup3;)"></div>
                    <div class="col-md-4"><input type="number" name='jumlah_bar' min="1" max="100" class="form-control" id="jumlahbar" placeholder="Jumlah Barang (Coli)"></div>
                    <div class="col-md-4">
                        <button type="reset" class="btn btn-warning col-md-5">Reset</button>
                        <div class="col-md-2"></div>
                        <button type="button" id="saveBTN" class="btn btn-success col-md-5" > Kirim</button>
                    </div>
                    <!--  -->
                    <input type="hidden" id='hidden_kubik' value='' name="tarif_kubik">
                    <input type="hidden" id='hidden_kilo' value='' name="tarif_kilo">
                    <!-- <input type="hidden" id='nota' value='<?php echo $kode ?>' name="nota"> -->
                </div>
            </form>


            <h3 class="box-title m-b-0">Data Barang</h3>
            <br>
            <div class="table-responsive">

                <table  class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Coli</th>
                            <th>Jumlah Kubik</th>
                            <th>Jumlah Kg</th>
                            <th>Type Harga</th>
                            <th>Tarif </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table_barang">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Jumlah Barang</th>
                            <th id="total_barang"></th>
                            <th></th>
                            <th></th>
                            <th>Jumlah Tarif:</th>
                            <th id="total_harga"></th>
                            <!-- <th>Aksi</th> --><th></th>
                        </tr>
                </tfoot>
                </table>
                
        </div>
        <hr>
       <div class="row">
           
           <div class="col-md-12" align="right">
               <button class="btn btn-danger" onclick="reset_all_form()">Reset Semua</button>
               <div class="col-md-4"></div>
               <button class="btn btn-success" id="buat_nota">Kirim</button>
           </div><!-- 
           <div class="col-md-6">
               <button class="btn btn-success"> ASD</button>
           </div> -->
       </div>
    </div>
</div>

</div>

<div id="return-delete" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>>Hapus Barang</b></h5>
        </button>
      </div>
      <div class="modal-body">
        Data Barang anda akan terhapus. Lanjutkan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="delete_barang">Delete</button>
      </div>
    </div>
  </div>
</div>

<div id="return-delete-all" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Reset Semua Form Input .</b></h5>
        
          
        </button>
      </div>
      <div class="modal-body">
        Data Barang anda , Beserta Formulir pengisian <br>
        Pengirim , penerima dan lainnya akan di Hapus ,Lanjutkan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" onClick="refresh_reset()">Delete</button>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
/* v_t_Transaksi  file. : Nama pengirim : Start */

 function get(){
         var idtoko = $("#id_toko").val();
         $.ajax({
              url:"<?php echo base_url('C_Transaksi/ajax_nama/') ?>",
              method:"GET",
              data:"id_toko="+idtoko
         }).success(function (data) {
              var json = data,
              obj = JSON.parse(json);
              $("#telp").val(obj.telp);
              $("#pemilik").val(obj.pemilik);
              $("#alamat").val(obj.alamat);
              $("#disc").val(obj.disc);
              $('#nama_pengirim_hidden').val(obj.nama_toko);
         });
         if (idtoko != 0) {
            $('#manual_toko').prop('readonly', true);
         } else {
            $('#manual_toko').prop('readonly', false);
            $("#telp").val('');
            $("#pemilik").val('');
            $("#alamat").val('');
            $("#disc").val('');
         }

  }

function ambil(){
           var idtoko2 = $("#id_toko2").val();
           var idtoko  = $("#id_toko").val();
           $.ajax({
                url:"<?php echo base_url('C_Transaksi/ajax_nama/') ?>",
                method:"GET",
                data:"id_toko="+idtoko2+'&id_toko_except='+id_toko,
           }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $("#terimatelp").val(obj.telp);
                $("#terimapemilik").val(obj.pemilik);
                $("#terimaalamat").val(obj.alamat);
                $("#terimadisc").val(obj.disc);
                $('#nama_penerima_hidden').val(obj.nama_toko);
           });
           if (idtoko2 != 0) {
              $('#penerima_toko').prop('readonly', true);
           } else {
              $('#penerima_toko').prop('readonly', false);
              $("#terimatelp").val('');
              $("#terimapemilik").val('');
              $("#terimaalamat").val('');
              $("#terimadisc").val('');
           }
        }

$(document).ready(function() {
  $("#asal").change(function() {
    var kota_asal   = $("#asal").val();
    $.ajax({
      url: '<?php echo base_url("C_Transaksi/tujuan") ?>',
      data: "asal="+kota_asal,
      success: function(response){
        $('#tujuan').html(response);
        // alert('hello');
      }
    });
  })
});

function get_harga(){
     var tujuan = $("#tujuan").val();
     var asal   = $("#asal").val();
     $.ajax({
          url:"<?php echo base_url('C_Transaksi/cari_harga') ?>",
          method:"GET",
          data:"kota_asal="+asal+"&kota_tujuan="+tujuan,
     }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          document.getElementById('kubik').innerHTML = obj.tarif_kubik ;
          document.getElementById('kilo').innerHTML = obj.tarif_kilo ;
          $('#hidden_kubik').val(obj.tarif_kubik);
          $('#hidden_kilo').val(obj.tarif_kilo);
     });
     if (tujuan == 0) {
           $("#kubik").empty();
           $("#kilo").empty();
          // alert('hello');
     }
  }



$(function(){

  $('#id_toko').change(function() {
    toko_except();
  });
  
  // $('#saveBTN').click(function() {
  //   showBarang();
  // });
  function toko_except(){
    var  id_toko  = $('#id_toko').val();
    if (id_toko == '0') {
          $('#id_toko2').html('<option value="0">Manual</option>');
    }
    $.ajax({
      type: 'ajax',
      url: '<?php echo base_url("C_Transaksi/get_nama_except/") ?>'+id_toko,
      async: false,
      dataType: 'json',
      success: function(data){
        var html='';
        var i;
        for(i = 0 ; i < data.length ; i++){
             html+= 
             '<option value='+data[i].id_toko+'>'+data[i].nama_toko+'</option>';
        }
        html += '<option value="0"> Manual </option>';
        $('#id_toko2').html(html);
        // $('#id_toko2').html('<option value="0"> Manual </option>');
      },
    })
  }

  $('#saveBTN').click(function(event) {
    var kubik = $('#kubik').html();
    var kilo  = $('#kilo').html();
    var url = $('#barangForm').attr('action');
    var data= $('#barangForm').serialize();

    //validate  

    var nama   = $('#nambar').val();
    // var jenis  = $('#jenisbar').val();
    var berat  = $('#beratbar').val();
    var kubik  = $('#kubikbar').val();
    var jumlah = $('#jumlahbar').val();
    var total  = '';
    
    if (nama == '') {
      $('#nambar').parent().addClass('has-error');
    } else { 
      $('#nambar').parent().removeClass('has-error');
      total += 1;
    }


    if (berat == '') {
      $('#beratbar').parent().addClass('has-error');
    } else {
      $('#beratbar').parent().removeClass('has-error');
      total += 3;
    }

    if (kubik == '') {
        $('#kubikbar').parent().addClass('has-error');
    } else {
        $('#kubikbar').parent().removeClass('has-error');
        total += 4;
    }

    if (jumlah == '') {
        $('#jumlahbar').parent().addClass('has-error');
    } else {
        $('#jumlahbar').parent().removeClass('has-error');
        total += 5;
    }

    if (total == '1345' && kubik != '' && kilo != '') {
        $.ajax({
          type : 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            if (response.success) {
              $('#beratbar').val('');
              $('#nambar').val('');
              $('#kubikbar').val('');
              $('#jumlahbar').val('');
              showBarang();
              
            }else{
              alert('error');
            }
          },
          error: function(){
            alert('not_ready gan');
          }
        });
    } else {
        alert('Pilih asal dan Tujuan');
    }
  });

  function showBarang(){
    var id_nota   = $('#kode_nota').val();
    var kubik     = $('#kubik').html();
    var kilo      = $('#kilo').html();

    $.ajax({
      type: 'ajax',
      url: '<?php echo base_url("C_Transaksi/showBarang/") ?>'+id_nota,
      async: false,
      dataType: 'json',
      success: function(data){
        var html='';
        var select='';
        var i;
        var total_harga  = 0;
        var total_barang = 0;
        for (i = 0 ;i < data.length; i++) {

            if (data[i].type_harga == 'Kubik') {
                select ="<select name='type' onChange='ganti_harga("+data[i].id+")' >"+
                        "<option selected>Kubik</option>"+
                        "<option>Kilo</option>"+
                        "</select>";
            } else if (data[i].type_harga == 'Kilo'){
                select ="<select name='type' onChange='ganti_harga("+data[i].id+")' >"+
                        "<option>Kubik</option>"+
                        "<option selected>Kilo</option>"+
                        "</select>";
            }
            html += 
            '<tr id="'+data[i].id+'">'+ 
                '<td>'+data[i].nama_barang+'</td>'+
                '<td class="jumlah">'+data[i].jumlah_barang+'</td>'+
                '<td class="berat">'+data[i].berat_barang+'</td>'+
                '<td class="kubik">'+data[i].kubik_barang+'</td>'+
                '<td>'+select+'</td>'+
                '<td id="tarif_coli">'+data[i].harga_barang+'</td>'+
                '<td> <button onClick="hapus_barang('+data[i].id+')" id="hapus_barang" class="btn btn-danger">Hapus</button> </td>'+
            '</tr>';
            var jum_harga    =  (data[i].harga_barang);
            var jum_barang   =  (data[i].jumlah_barang);
            total_harga      += parseInt(jum_harga);
            total_barang     += parseInt(jum_barang);
        }
        $('#table_barang').html(html);
        $('#total_harga').text(total_harga);
        $('#total_barang').text(total_barang);
      },
      // error: function(){
      //   alert('tidak bisa di load'); 
      // }
    })
  }
});

function ganti_harga(id){
    total_berat =   0;
    total_kubik =   0;  
    kubik       =   $('#kubik').html();
    kilo        =   $('#kilo').html();
    value_berat =   $('#'+id).find('.berat').text();
    value_kubik =   $('#'+id).find('.kubik').text();
    total_tarif =   0;
    harga_now   =   0;
    fix_harga   =   0;
    
    if ($('#'+id).find('select[name=type]').val() == 'Kilo' ) {

        total_berat += value_berat * kilo;
        $('#'+id).find('#tarif_coli').html(total_berat);

    } else if ($('#'+id).find('select[name=type]').val() == 'Kubik'){

        total_kubik += value_kubik * kubik ;
        $('#'+id).find('#tarif_coli').html(total_kubik);
    }

    $('#table_barang').find("tr").each(function(index) {
        total_tarif += $('#tarif_coli').html();
        // harga_now   =   parseInt(total_tarif);
        if (!isNaN(total_tarif) && total_tarif.length !== 0) {
             harga_now = parseInt(total_tarif);
              
            $("#total_harga").html(harga_now);
        }
    });


}

$("#buat_nota").click( function() {

    var row    =   $('#table_barang tr').length;

    if (row == 0) {

        alert ('tidak ada data');


    } else {

        if (confirm('Apakah anda yakin mengirim Barang tersebut ?')) {
            
            var data    = $("#data_semua_pengiriman").serialize();
            var nota    = $('#kode_nota').val();
            var url     = "<?php echo base_url('C_Transaksi/buat_nota/') ?>"+nota;

             $.ajax({
                  type : "POST",
                  url  : url,
                  data : data,
                  dataType : "json",
                  success:function(data){
                       window.location.href='<?php echo base_url("Order-Nota") ?>';
                  }
                });

        } 


    }
});

function hapus_barang(id){
    $("#return-delete").modal('show');
    $("#delete_barang").attr('onClick', "delete_barang("+id+")");
}






function delete_barang(id){
    // id_nota   = $('#kode_nota').val();
    $.ajax({
        url: '<?php echo base_url("C_Transaksi/delete_barang") ?>',
        type: 'GET',
        data: "id="+id,
        dataType: "json",
        success: function(response){
            if (response.success) {
                $("#return-delete").modal('hide');
                Result_hapus();
            } else {
                alert('error');
            }
        }
    });
}

function delete_all_barang(id){
    // id_nota   = $('#kode_nota').val();
    $.ajax({
        url: '<?php echo base_url("C_Transaksi/delete_all_barang") ?>',
        type: 'GET',
        data: "id_nota="+id,
        dataType: "json",
        success: function(response){
            if (response.success) {
                $("#return-delete").modal('hide');
                Result_hapus();
            } else {
                alert('Eror , data tidak ada atau 0');
            }
        }
    });
}



function Result_hapus(){
   
    var id_nota   = $('#kode_nota').val();
    var kubik     = $('#kubik').html();
    var kilo      = $('#kilo').html();

    $.ajax({
      type: 'ajax',
      url: '<?php echo base_url("C_Transaksi/showBarang/") ?>'+id_nota,
      async: false,
      dataType: 'json',
      success: function(data){
        var html='';
        var select='';
        var i;
        var total_harga  = 0;
        var total_barang = 0;
        for (i = 0 ;i < data.length; i++) {

            if (data[i].type_harga == 'Kubik') {
                select ="<select name='type' onChange='ganti_harga("+data[i].id+")' >"+
                        "<option selected>Kubik</option>"+
                        "<option>Kilo</option>"+
                        "</select>";
            } else if (data[i].type_harga == 'Kilo'){
                select ="<select name='type' onChange='ganti_harga("+data[i].id+")' >"+
                        "<option>Kubik</option>"+
                        "<option selected>Kilo</option>"+
                        "</select>";
            }
            html += 
            '<tr id="'+data[i].id+'">'+ 
                '<td>'+data[i].nama_barang+'</td>'+
                '<td class="jumlah">'+data[i].jumlah_barang+'</td>'+
                '<td class="berat">'+data[i].berat_barang+'</td>'+
                '<td class="kubik">'+data[i].kubik_barang+'</td>'+
                '<td>'+select+'</td>'+
                '<td id="tarif_coli">'+data[i].harga_barang+'</td>'+
                '<td> <button onClick="hapus_barang('+data[i].id+')" id="hapus_barang" class="btn btn-danger">Hapus</button> </td>'+
            '</tr>';
            var jum_harga    =  (data[i].harga_barang);
            var jum_barang   =  (data[i].jumlah_barang);
            total_harga      += parseInt(jum_harga);
            total_barang     += parseInt(jum_barang);
        }
        $('#table_barang').html(html);
        $('#total_harga').text(total_harga);
        $('#total_barang').text(total_barang);
      },
      // error: function(){
      //   alert('tidak bisa di load'); 
      // }
    })
}

function reset_all_form(){

    $("#return-delete-all").modal("show");
}

function refresh_reset(){
    var id = $("#kode_nota").val();
    var tes = $("#table_barang tr").length
    if (tes > 0) {
        delete_all_barang(id);
    }
    $("#id_toko").val('0');
    $("#manual_toko").prop('readonly',false);
    $("#telp").val('');
    $("#alamat").val('');
    $("#disc").val('');
    $("#terimadisc").val('');
    $("#id_toko2").val('0');
    $("#penerima_toko").prop('readonly',false);
    $("#terimatelp").val('');
    $("#terimaalamat").val('');
    $("#asal").val('0');
    $("#tujuan").val('0');
    $("#kubik").html('');
    $("#kilo").html('');

    $("#return-delete-all").modal("hide");
}

// window.onbeforeunload = function() {
//     var id = $("#kode_nota").val();
//     delete_all_barang(id);

// }
function Btnaddbarang(){
    // alert('hello');
    $("#kontenbarang").css('display','');

    $.ajax({
          url:"<?php echo base_url('C_Transaksi/cari_id_nota') ?>",
          method:"GET",
          // data: 
     }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          $("#kode_nota").attr('value', obj.kode_nota);
     });
}




</script>
 
