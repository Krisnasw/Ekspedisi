<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> Penggajian </h4> </div>
                    <!-- Breadcumbs  -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('Admin') ?>"> Beranda </a></li>
                            <li class="active">Penggajian</li>
                        </ol>
                    </div>
                    <!-- /Breadcumbs  -->
                    <!-- /.col-lg-12 -->
                </div>


<div class="row">

<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="white-box">
        <!-- <p class="text-muted m-b-40">Use default tab with class <code>nav-tabs</code></p> -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item" aria-expanded="false"><a href="#bank" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> List Data Penggajian</span></a></li>
            <li role="presentation" class="nav-item"><a href="#form" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Form Data Penggajian</span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="bank" aria-expanded="true">
                <div class="col-sm-12">
                    <div>
                        <h3 class="box-title m-b-0">Data Penggajian</h3>
                        <!-- <p class="text-muted m-b-30">Data dapat di Export menjadi Berikut ini:</p> -->
                        <div class="table-responsive">
                            
                        </div>
                    </div>     
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="form" aria-expanded="false">
               
                    <div class="col-sm-12">
                            <div class="white-box">
                        <h3 class="box-title m-b-0">Form Data</h3>
                        <br>
                        <div class="col-md-6">
                            <label class="control-label col-md-3">Pilih Cabang : </label>
                            <select class="form-control" name="cabang" id="selectCabang">
                                <?php
                                    foreach ($cabang as $key) {
                                ?>
                                    <option value="<?=$key->id_cabang;?>"><?=$key->nama_cabang;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label col-md-3">Tanggal : </label>
                            <input type="date" class="form-control" name="startDate" id="startDate">
                        </div>
                        <br/>
                        <div style="margin-top: 6%; margin-bottom: 10%;">
                            <input type="hidden" name="form_id" id="form-id">
                            <button type="button" class="btn btn-outline btn-default pull-right" onclick="createFormData();">Proses</button>
                            <button type="cancel" class="btn btn-outline btn-danger pull-right" style="margin-right: 10px;" onclick="cancelPenggajian();">Cancel</button>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="mytable2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Pegawai</th>
                                        <th>Gaji</th>
                                        <th>Bonus</th>
                                        <th>THR</th>
                                        <th>Potongan</th>
                                        <th><button class="btn btn-outline btn-info" data-toggle="modal" data-target="#kasbon-modal">Kasbon</button></th>
                                    </tr>
                                </thead>
                                <tbody id="tableIsi">
                                </tbody>
                            </table>

                            <div style="margin-top: 6%; margin-bottom: 10%;">
                                <button type="button" class="btn btn-outline btn-default pull-right" onclick="postAllGaji();" id="submitGaji" style="display: none;">Submit</button>
                                <button type="cancel" class="btn btn-outline btn-danger pull-right" style="margin-right: 10px; display: none;" onclick="cancelPenggajian();" id="cancelGaji">Cancel</button>
                            </div>

                            <!-- /.modal -->
                            <div id="kasbon-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Kasbon</h4> </div>
                                        <div class="modal-body">
                                            <form method="POST" id="formKasbon">
                                                <div class="form-group">
                                                    <label for="karyawan" class="control-label">Pilih Karyawan:</label>
                                                    <select class="form-control" name="karyawanId" id="selectKaryawan">
                                                        <?php
                                                            foreach ($karyawan as $key) {
                                                        ?>
                                                        <option value="<?=$key->id_karyawan;?>"><?=$key->nama_karyawan;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Kasbon:</label>
                                                    <input type="hidden" name="idKasbon" id="kasbonId">
                                                    <input type="number" class="form-control" readonly name="kasbon" id="kasbonTotal">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Pencicilan:</label>
                                                    <input type="number" class="form-control" name="pencicilan" id="inpCicilan">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info waves-effect waves-light" onclick="postKasbonData();">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                        </div>
                    </div>
                </div>

            </div>
           
        </div>
    </div>

    </div>
    
</div>

<!-- ::Konten -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable2").hide();
        $("#selectCabang").change(function () {
            
            var idCabang = $(this).val();
            $("#mytable2").hide();
            $("table #tableIsi").empty();

        });

        $("#selectKaryawan").change(function () {

            var idEmployee = $(this).val();
            
            $.ajax({
                type: "POST",
                url: "<?=base_url('C_Penggajian/getKasbonData');?>",
                data: { idEmployee : idEmployee },
                dataType: "JSON",
                success: function (data) {
                    if (!$.trim(data) || data == "") {
                        alert('Tidak Ada Respon');
                    } else {
                        $("#kasbonTotal").val(data.total_kasbon);
                        $("#kasbonId").val(data.id_kasbon);
                    }
                },
                fail: function () {
                    console.log("Failed !");
                    alert("Something wen't wrong");
                }
            });

        });
    });

    function changeBonus(val, id) {
        var formId = $("#form-id").val();
        $.ajax({ 
            url: "<?=base_url('C_Penggajian/changeBonus');?>",
            data: { bonus: val, formid: formId, idEmployee: id },
            type: 'POST'
        }).done(function(responseData) {
            console.log('Done: ', responseData);
        }).fail(function() {
            console.log('Failed');
        });
    }

    function changeThr(val, id) {
        var formId = $("#form-id").val();
        $.ajax({ 
            url: "<?=base_url('C_Penggajian/changeThr');?>",
            data: { thr: val, formid: formId, idEmployee: id },
            type: 'POST'
        }).done(function(responseData) {
            console.log('Done: ', responseData);
        }).fail(function() {
            console.log('Failed');
        });
    }

    function changePotongan(val, id) {
        var formId = $("#form-id").val();
        $.ajax({ 
            url: "<?=base_url('C_Penggajian/changePotongan');?>",
            data: { potongan: val, formid: formId, idEmployee: id },
            type: 'POST'
        }).done(function(responseData) {
            console.log('Done: ', responseData);
        }).fail(function() {
            console.log('Failed');
        });
    }

    function postAllGaji() {
        var formId = $("#form-id").val();
        var idEmployee = $("input[name='idEmployees[]']").map(function(){return $(this).val();}).get();
        var bonus = $("input[name='bonus[]']").map(function(){return $(this).val();}).get();
        var thr = $("input[name='thr[]']").map(function(){return $(this).val();}).get();
        var potongan = $("input[name='potongan[]']").map(function(){return $(this).val();}).get();

        $.ajax({
            type: 'POST',
            url: "<?=base_url('C_Penggajian/postAllGaji');?>",
            data: { formId : formId, idEmployee : idEmployee, bonus : bonus, thr : thr, potongan : potongan },
            dataType: "JSON"
        })
        .done(function (data) {
            if (data.status == 'success') {
                alert(data.message);
                window.location.reload();
            } else {
                alert(data.message);
                window.location.reload();
            }
        })
        .fail(function () {
            alert('Ada Yang Salah, Silahkan Coba Lagi Nanti');
            window.location.reload();
        })
    }

    function postKasbonData() {

        var idKaryawan = $("#selectKaryawan").val();
        var kasbonId = $("#kasbonId").val();
        var kasbonTotal = $("#kasbonTotal").val();
        var inpCicilan = $("#inpCicilan").val();

        $.ajax({
            url:        "<?=base_url('C_Penggajian/postCicilanKasbon');?>",
            method:     "POST",
            data:       { karyawanId : idKaryawan, kasbon : kasbonTotal, idKasbon : kasbonId, pencicilan : inpCicilan },
            dataType: "JSON"
        })
        .done(function(response) {
            if (response.status == 'success') {
                alert(response.message);
                window.location.reload();
            } else {
                if (response.message == 'Form Tidak Lengkap') {
                    alert(response.message);
                } else {
                    alert(response.message);
                    window.location.reload();
                }
            }
        })
        .fail(function() {
            alert('Ada Yang Salah, Silahkan Coba Lagi Nanti');
        })
    }
 
    function cancelPenggajian() {
        var idForm = $("#form-id").val();
        if (idForm.length === 0 ) {
            alert('Terjadi Kesalahan');
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('C_Penggajian/setDeletedForm');?>",
                data: { formId : idForm },
                dataType: "JSON",
                success: function (data) {
                    if (data.status == 'success') {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert(data.message);
                        window.location.reload();
                    }
                },
                fail: function () {
                    console.log("Failed!");
                    alert("Something wen't wrong");
                }
            });
        }
    }

    function createFormData() {

        $("table #tableIsi").empty();
        
        var date = new Date($('#startDate').val());
        day = date.getDate();
        month = date.getMonth() + 1;
        year = date.getFullYear();
        
        $.ajax({
            type: "POST",
            url: "<?=base_url('C_Penggajian/createFormData');?>",
            data: { cabang : $("#selectCabang").val(), dateNow : [day, month, year].join('-') },
            dataType: "JSON",
            success: function (data) {
                $("#mytable2").show();
                $("#submitGaji").show();
                $("#cancelGaji").show();
                
                if (!$.trim(data)) {
                    $("#mytable2").hide();
                    $("table #tableIsi").empty();
                    alert('Tidak Ada Data');
                }

                if (data.status == 'error') {
                    $("#mytable2").hide();
                    $("table #tableIsi").empty();
                    alert(data.message);
                }

                $.each(data, function (key, value) {
                    $("#form-id").val(data[key].form_id);
                    $("table #tableIsi").append("<tr><td><input id='idEmployees"+data[key].id_karyawan+"' attr='"+data[key].id_karyawan+"' type='hidden' name='idEmployees[]' value='"+data[key].id_karyawan+"' />"+data[key].nama_karyawan+"</td>"
                        +"<td>"+data[key].gaji+"</td>"
                        +"<td><input id='bonus"+data[key].id_karyawan+"' attr='"+data[key].id_karyawan+"' onchange='changeBonus(this.value,"+data[key].id_karyawan+");' type='text' class='form-control' name='bonus[]' value='"+data[key].bonus+"' /></td>"
                        +"<td><input id='thr"+data[key].id_karyawan+"' attr='"+data[key].id_karyawan+"' onchange='changeThr(this.value,"+data[key].id_karyawan+");' type='text' class='form-control' name='thr[]' value='"+data[key].thr+"' /></td>"
                        +"<td><input id='potongan"+data[key].id_karyawan+"' attr='"+data[key].id_karyawan+"' onchange='changePotongan(this.value,"+data[key].id_karyawan+");' type='text' class='form-control' name='potongan[]' value='"+data[key].potongan+"' /></td>"
                        +"<td>"+data[key].total_kasbon+"</td>"
                        +"</tr>");
                });
            },
            fail: function () {
                console.log("Failed!");
                alert("Something wen't wrong");
            }
        });

    }
</script>