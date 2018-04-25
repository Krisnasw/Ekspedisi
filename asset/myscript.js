 /* START =============== DATA TABLES */  
 $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
          ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
/* END =============== DATA TABLES */

/* Start Notification Alert*/
        $('#notifications').slideDown('slow').delay(1500).slideUp('slow');
        $('#notif_id').slideDown('fast').delay(2000).slideUp('slow');
        $('#notif_password').slideDown('fast').delay(2000).slideUp('slow');
/* End Norification Alert*/

/* Start Disabling not number key */
    function validate(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode( key );
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }
/* End Disabling not number key */

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
           });
           if (idtoko2 != 0) {
              $('#penerima_toko').prop('readonly', true);
           } else {
              $('#penerima_toko').prop('readonly', false);
              $("#terimatelp").val('');
              $("#terimapemilik").val('');
              $("#terimaalamat").val('');
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

$(window).on("beforeunload", function() {
    return "Are you sure? You didn't finish the form!";
});


$(function(){

  $('#id_toko').change(function() {
    toko_except();
  });
  
  // $('#saveBTN').click(function() {
  //   showBarang();
  // });

 

  

  function toko_except(){
    var  id_toko  = $('#id_toko').val();
    if (id_toko == 'zero') {
          $('#id_toko2').html('<option value="zero">Manual</option>');
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
    var url = $('#barangForm').attr('action');
    var data= $('#barangForm').serialize();

    //validate  

    var nama   = $('#nambar').val();
    var jenis  = $('#jenisbar').val();
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

    if (jenis == '') {
       $('#jenisbar').parent().addClass('has-error');
    } else {
       $('#jenisbar').parent().removeClass('has-error');
       total += 2;
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

    if (total == '12345') {
        $.ajax({
          type : 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            if (response.success) {
              $('#barangForm')[0].reset();
              showBarang();
              $(window).off("beforeunload");
                return true;
            }else{
              alert('error');
            }
          },
          error: function(){
            alert('not_ready gan');
          }
        });
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
        var i;
        var total_harga  = 0;
        var total_barang = 0;
        for (i = 0 ;i < data.length; i++) {
            html += '<tr>'+ 
                '<td>'+data[i].nama_barang+'</td>'+
                '<td>'+data[i].jumlah_barang+'</td>'+
                '<td>'+data[i].berat_barang+'Kg </td>'+
                '<td>'+data[i].kubik_barang+'M <sup>3</sup>'+'</td>'+
                '<td>'+data[i].type_harga+'</td>'+
                '<td>'+data[i].harga_barang+'</td>'+
            '</tr>';
          var jum_harga    = (data[i].harga_barang);
          var jum_barang   = (data[i].jumlah_barang);
            total_harga += parseInt(jum_harga);
            total_barang += parseInt(jum_barang);
        }
        $('#table_barang').html(html);
        $('#total_harga').text(total_harga);
        $('#total_barang').text();
      },
      // error: function(){
      //   alert('tidak bisa di load'); 
      // }
    })
  }
})
